<?php

    if (!defined('BASEPATH'))
	exit('No direct script access allowed');

    class Parser_controller extends VERTEX_Controller
    {
        private $blogUrl = "http://habrahabr.ru/hub/php/";
        
        function __construct()
	{
	    parent::__construct();	  
            $this->load->model('Articles_Model'); 
            $this->load->library('ClassSimpleImage');
            $this->load->library('simple_html_dom_node');
            //$this->load->add_package_path(APPPATH.'third_party/simple_html_dom_node');
        }

        //функции перевода смс в транслит
        // $str - текст сообщения в кириллице
        public function sms_translit($str) 
        {
            $translit = array(
                "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
                "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
                "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
                "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
                "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
                "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
                "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
                "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
                "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
                "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
                "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
                "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
                "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"
            );
            return strtr($str,$translit);
        }
        
        private function getTitle($div)
        {
            $titles = $div->find('h1.title');
            return $titles[0]->innertext;
        }
        
        private function getUrl($div)
        {
            $urls =  $div->find('a.post_title');
            return $urls[0]->href;
        }

        private function getDate($div)
        {
            $dates = $div->find('div.published');                                                                                                                                                                                                                                                                                                                                                                                                                                           
            return $dates[0]->innertext;
        }

        private function getKeywords($div)
        {
            
        }
        
        private function getText($url)
        {
            $localhtml = file_get_html($url);
            $texts = $localhtml->find('div.content');
            //$date = $texts[0]->innertext;

            return $texts[0]->innertext;
        }
        
        public function index()
        { 
            $html = file_get_html($this->blogUrl);

            $data = array();
            foreach($html->find('div.post') as $div)
            {
                $title = $this->getTitle($div);
                echo $title."<br/>";
                $url = $this->getUrl($div);
                echo $url."<br/>";
                //echo $text."<br/><hr/>";
                //$date = $this->getDate($div);
                //echo $date;
                


                $url = end(explode('/', $url));   
                die();
                                /*            
                $alreadyExists = (!($this->Articles_Model->check_if_article_is_unique_url($url, -1))) ? 'true' : 'false';                
                */
                $data = array('title' => $title, 'url' => $url, 'text' => $text);
                //$data[count($data)] = array('title' => $title, 'url' => $url, 'excerpt' => $excerpt, 'alreadyExists' => $alreadyExists, 'image' => $image);
                /*
                if ($alreadyExists === 'false')
                {                    
                    $articleId = $this->Articles_Model->create_article();
                    $this->Articles_Model->update_article($articleId, $title, $url, $text, $excerpt, $image, 1);
                }
                */
            }
            $this->view_page('site/parser', 'parser', $data);
        }
        
    }
       
