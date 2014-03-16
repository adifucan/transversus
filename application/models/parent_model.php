<?php

    if (!defined('BASEPATH'))
	exit('No direct script access allowed');

    //Класс содержит вспомогательные методы для всех моделей
    //Используется наследование, а не композиция просто потому, 
    //что так удобней, хоть это и не правильно семантически
    class Parent_model extends CI_Model
    {
	function __construct()
	{            
	    parent::__construct();
	}
	
	private function get($sql, $binds = NULL)
	{    	    
	    if (!is_array($binds) && $binds !== NULL)
		$binds = array($binds);
		
	    $query = $this->db->query($sql, $binds);
	    return $query->result();
	}

	protected function run($sql, $binds = NULL)
	{
	    if (!is_array($binds) && $binds !== NULL)
		$binds = array($binds);
	    
	    return $this->db->query($sql, $binds);
	}

	protected function get_as_array($sql, $binds = NULL)
	{
	    $data = $this->get($sql, $binds);
	    if (count($data) === 0)
		return NULL;

	    $result = array();
	    for ($i = 0; $i < count($data); $i++)
		array_push($result, get_object_vars($data[$i]));

	    return $result;
	}

	private function get_row($sql, $binds = NULL)
	{
	    $data = $this->get($sql, $binds);
	    if (count($data) === 0)
		return NULL;

	    return $data[0];
	}

	protected function get_value($sql, $binds = NULL)
	{
	    $data = $this->get_row_as_array($sql, $binds);
	    if ($data === NULL)
		return NULL;
	    
            $keys = array_keys($data);
	    return $data[$keys[0]];
	}

	protected function get_row_as_array($sql, $binds = NULL)
	{
	    $data = $this->get_row($sql, $binds);
	    if ($data === NULL)
		return NULL;

	    return get_object_vars($data);
	}       

    }