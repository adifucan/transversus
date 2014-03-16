<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Pages_Controller extends VERTEX_Controller
    {
        
        public function view($page = "home")
        {
            $pages = array(
                'contact' => 'Контакты'
            );            
            
            if (!in_array($page, array_keys($pages)))
            {
                 show_404();
                 die();
            }
            
            $this->view_page('site/' . $page, $pages[$page], '');
        }

    }

    