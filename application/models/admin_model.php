<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');
    
    class Admin_Model extends Parent_Model
    {
        function __construct()
        {
            parent::__construct();
        }
        
        public function check_login($user, $pass)
        {
            return $this->get_value('select count(*) from admins where user = ? and pass = ?', array($user, $pass)) > 0;
        }
    }
    
 