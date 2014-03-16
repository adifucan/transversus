<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class VERTEX_Controller extends CI_Controller
    {

        function __construct()
        {
         parent::__construct();	    

         $this->load->model('Parent_Model');                    

         /*$this->lang->line('name');*/
     }

    protected function get_page($page, $params)
         {
             return $this->parser->parse($page, $params, TRUE);
         }	        

    protected function view_header($title, $description)
        {
            $data = array(
                'title' => $title,
                'description' => $description,
                'home_selected' => (($title !== 'Контакты') ? 'active' : ''),
                'contact_selected' => (($title === 'Контакты') ? 'active' : '')
                );
            echo $this->parser->parse('site/header/header', $data, TRUE);
        }
            //if you want to show RSS FEED here, uncomment funtions compare_RSSI_terms & view_footer below
    protected function view_footer()
        {
            echo $this->parser->parse('site/footer/footer', array(), TRUE);
        }	

    protected function view_page($page, $title, $description, $params = NULL)
    {
        $this->view_header($title, $description);        
        echo $this->parser->parse($page, $params === NULL ? array() : $params, TRUE);
        $this->view_footer();	    
    }

    public function page404() 
    {            
       echo $this->view_page('site/pages/404','404', array());
       exit;
   }
}

