<?php

    if (!defined('BASEPATH'))
	exit('No direct script access allowed');

    class Blog_controller extends VERTEX_Controller
    {
        function __construct()
	{
	    parent::__construct();	  
            $this->load->model('Articles_Model'); 
        }

        private function generate_pages($page, $page_count)
        {            
            if ($page_count < 2)  
                return array();
            
            $result = array();
            
            if ($page > 1)
               $result[count($result)] = array('text' => '&laquo;', 'url' => '/blog', 'active' => '');

            if ($page - 2 > 1)
               $result[count($result)] = array('text' => '...', 'url' => '#', 'active' => '');
            
            for ($i = max($page - 2, 1); $i <= min($page + 2, $page_count); $i++) 
               $result[count($result)] = array('text' => $i,'url' => "/blog/$i", 'active' => ($i == $page ? 'active' : ''));

            if ($page + 2 < $page_count)
               $result[count($result)] = array('text' => '...','url' => '#', 'active' => '');             
            
            if ($page != $page_count)
               $result[count($result)] = array('text' => '&raquo;', 'url' => "/blog/$page_count", 'active' => '');
            
            return $result;
        }

        public function index($page = 1)
        {
            $from = ($page - 1) * 5; 
            $count = 5;
            //$articles = $this->Articles_Model->get_all_articles_inverse($from, $count);
            $articles = $this->Articles_Model->get_all_articles_with_categories_inverse($from, $count);
            
            //convert MySQL datetime to d/m/Y H:i:s
            for ($i = 0; $i < count($articles); $i++)
            {
                $articles[$i]['publish_date'] = date("j F, Y в H:i:s", strtotime($articles[$i]['publish_date']));
                $articles[$i]['category_url'] = strtolower($articles[$i]['category_name']);
            }

            $articles_count = $this->Articles_Model->get_all_articles_count();
           
            $page_count = floor(($articles_count - 1) / 5) + 1;
            
            if (!is_array($articles))
                $articles = array();
            
            for ($i = 0; $i < count($articles); $i++)
            {
                $text = $articles[$i]['text'];
                $pos = strpos($text, '===');
                
                if ($pos === FALSE)
                    continue;
                
                $text = substr($text, 0, $pos);
                $articles[$i]['text'] = $text;                
            }  
           
            $pages = $this->generate_pages($page, $page_count);

            $categories = $this->Articles_Model->get_all_categories();

            for ($i = 0; $i < count($categories); $i++)
                $categories[$i]['category_url'] = strtolower($categories[$i]['category_name']);

            $params = array(
                'articles' => $articles,
                'pages' => $pages,
                'categories' => $categories
            );  
              
            $this->view_page('site/articles', 'My Blog Title', 'My Blog Description', $params);
        }
        
        public function article($url)
        {
            //$article = $this->Articles_Model->get_article_by_url($url);
            $article = $this->Articles_Model->get_article_by_url_with_category($url);
            $article[0]['text'] = str_replace('===', '', $article[0]['text']);
            $article[0]['category_url'] = strtolower($article[0]['category_name']);


            $categories = $this->Articles_Model->get_all_categories();

            for ($i = 0; $i < count($categories); $i++)
                $categories[$i]['category_url'] = strtolower($categories[$i]['category_name']);

            $params = array(
                'article' => $article,
                'categories' => $categories
                );

            $this->view_page('site/article', $article[0]['title'], '', $params);
        }

        public function category($category_name)
        {
            $articles = $this->Articles_Model->get_articles_by_category($category_name);
            $category = $articles[0]['category_name'];

            for ($i = 0; $i < count($articles); $i++)
            {
                $articles[$i]['category_url'] = strtolower($articles[$i]['category_name']);

                $text = $articles[$i]['text'];
                $pos = strpos($text, '===');

                if ($pos === FALSE)
                    continue;

                $text = substr($text, 0, $pos);
                $articles[$i]['text'] = $text;
            }

            $categories = $this->Articles_Model->get_all_categories();

            for ($i = 0; $i < count($categories); $i++)
                $categories[$i]['category_url'] = strtolower($categories[$i]['category_name']);

            $params = array(
                'articles' => $articles,
                'category' => $category,
                'categories' => $categories
                );

            $this->view_page('site/category', 'Статьи Категории '.$category_name, '', $params);
        }
        
    }

?>
