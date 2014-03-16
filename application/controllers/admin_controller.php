<?php

    if (!defined('BASEPATH'))
	exit('No direct script access allowed');

    class Admin_controller extends VERTEX_Controller
    {
        private $is_admin;
        
        function __construct()
	{
	    parent::__construct();	  
            $this->load->model('Articles_Model'); 
            $this->load->model('Admin_Model'); 
            
	    $this->is_admin = $this->session->userdata('is_admin');            
            if ($this->is_admin !== 'admin' && (uri_string() !== 'admin/auth') && (uri_string() !== 'admin/login'))
               redirect(base_url('/admin/auth'), 'location', 303);                
        }
        
        protected function view_header($title)
        {
            $top_menu = array(
                array('r_title' => 'Blog', 'href' => '/admin/blog', 'selected' => ''),
                array('r_title' => 'Categories', 'href' => '/admin/categories', 'selected' => '')
                );

            $page = uri_string();

            if ($page === 'admin/blog')
                $top_menu[0]['selected'] = 'font-weight: bold';
            if ($page === 'admin/categories')
                $top_menu[1]['selected'] = 'font-weight: bold';
            
            $log_off = '';
            if ($this->is_admin)
                $log_off = $this->parser->parse('admin/logoff', array(), TRUE);
            echo $this->parser->parse('admin/header', array('title' => $title, 'logoff' => $log_off, 'top_menu' => $top_menu), TRUE);
        }
        
        protected function view_footer()
        {
            echo $this->parser->parse('admin/footer', array(), TRUE);
        }	
        
        public function auth()
        {
            $this->view_page('admin/auth', 'please do auth', '');
        }

        public function login()
	{            
            $login = $this->input->post('login', TRUE);
            $password = $this->input->post('pass', TRUE);
            
            $user = $this->Admin_Model->check_login($login, md5($password));
            if ($user === FALSE)
	    {		
                redirect(base_url('/admin/auth'), 'location', 303);                		
	    }
            else 
            {
                $this->session->set_userdata('is_admin', 'admin');		
                redirect(base_url('/admin'), 'location', 303);                		
            }
	}
	
	public function logoff()
	{
	    $this->session->unset_userdata('is_admin');
	    redirect('/admin/auth', 'redirect', 303);
	}

        public  function index()
        {
            redirect("/admin/blog", 'refresh');
        }

        public function blog()
        {
            $articles = $this->Articles_Model->get_all_articles();
            if (!is_array($articles))
                $articles = array();

            for ($i = 0; $i < count($articles); $i++)
                $articles[$i]['text'] = substr($articles[$i]['text'], 0, 255);
            
            $params = array(
                'articles' => $articles
            );
              
            $this->view_page('admin/articles', 'Articles', '', $params);        
        }

        public function categories()
        {
            $categories = $this->Articles_Model->get_all_categories();
            if (!is_array($categories))
                $categories = array();

            $params = array(
                'categories' => $categories
                );
            $this->view_page('admin/categories', 'Categories', '', $params);
        }
       
        public function edit_article($id)
        {
            //get info about article with categories
            $article = $this->Articles_Model->get_article_with_category($id);

            //delete Article ['category_id'] & ['category_name'] because we have work with $article['categories'] from Categories
            $categoryId = $article['category_id'];
            unset($article['category_id']);
            unset($article['category_name']);
            $categories = $this->Articles_Model->get_all_categories();
            $article['categories'] = $categories;

            //check if category is already selected
            for ($i = 0; $i < count($article['categories']); $i++)
                $article['categories'][$i]['selected'] = $categoryId === $article['categories'][$i]['category_id'] ? 'selected' : '';
            
            //check if article is published or not
            $article['published'] = $article['is_published'] == '1' ? 'checked' : '';
            $article['unpublished'] = $article['is_published'] != '1' ? 'checked' : '';
            
            $this->view_page('admin/edit_article', "View article $id", '', $article);
        }

        public function edit_category($category_id)
        {
            $category = $this->Articles_Model->get_category($category_id);

            $this->view_page('admin/edit_category', 'View category $category_id', '', $category);
        }
        
        public function create_article()
        {
            $id = $this->Articles_Model->create_article();
            redirect("/admin/article/$id");            
        }

        public function create_category()
        {
            $category_id = $this->Articles_Model->create_category();
            redirect("/admin/category/$category_id");
        }

        public function delete_article($id)
        {
            $this->Articles_Model->delete_article($id);
            redirect("/admin/blog", "refresh");
        }

        public function delete_category($category_id)
        {
            $this->Articles_Model->delete_category($category_id);
            redirect("/admin/categories", "refresh");
        }
        
        public function update_article($id)
        {
            $config['upload_path'] = './static/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width']  = '2048';
            $config['max_height']  = '2048';
            $this->load->library('upload', $config);
            $this->load->library('ClassSimpleImage', $config);


            $title = $this->input->post('title');  
            $url = $this->input->post('url');  
            $keywords = $this->input->post('keywords');  
            $description = $this->input->post('description');  
            $text = $this->input->post('text', FALSE);  
            $is_published = $this->input->post('is_published');  
            $category = $this->input->post('category');

            $error = '';

            if (!$this->Articles_Model->check_if_article_is_unique_url($url, $id))
                $error .= 'URL is not unique<br/>';

            if (strlen($title) >= 256)
                $error .= 'Title length is greater than 256<br/>'; 

            if (strlen($url) >= 128)
                $error .= 'URL length is greater than 128<br/>'; 

            if (strlen($keywords) >= 256)
                $error .= 'Keywords length is greater than 128<br/>';     

            if (strlen($description) >= 256)
                $error .= 'Description length is greater than 128<br/>'; 

            if ($category === 0)
                $error .= 'Category is not selected<br/>'; 

            $res = !$this->upload->do_upload('image');
            $data = $this->upload->data();            
            $img_upload = $data['file_name'] != '';
            
            if (!$res && $img_upload)
                $error .= $this->upload->display_errors();            
            
            if (!empty($error))
                die('Error: '.$error);
            
            //create thumbnail
            if ($img_upload) 
            {
                $thumb = new ClassSimpleImage();
                $thumb->load($data['full_path']);
                $thumb->cutAndResize(240, 160);
                $thumb->save('./static/uploads/thumb_'.$data['file_name']);       
            }      
            
            $this->Articles_Model->update_article($id, $title, $url, $keywords, $description, $text, $img_upload ? '/static/uploads/thumb_'.$data['file_name'] : '', $is_published, $category);
            redirect("/admin/article/$id", 'refresh');
        }

        public function update_category($category_id)
        {
            $category_name = $this->input->post('categoryName');

            $this->Articles_Model->update_category($category_id, $category_name);
            redirect("/admin/categories", 'refresh');
        }
    }
