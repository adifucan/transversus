<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');
    
    class Articles_Model extends Parent_Model
    {
        function __construct()
        {
            parent::__construct();
        }
        
        public function get_all_articles()
        {            
            return $this->get_as_array("select * from articles");        
        }

        public function get_all_categories()
        {
            return $this->get_as_array("select * from categories");
        }
        
        public function get_all_articles_inverse($from, $count)
        {
            return $this->get_as_array("select * from articles where is_published = 1 order by id desc limit $from, $count");
        }

        public function get_all_articles_with_categories_inverse($from, $count)
        {
            return $this->get_as_array("select a.*, c.category_name 
                from articles a JOIN categories c ON a.category_id = c.category_id
                WHERE is_published = 1 order by id desc limit $from, $count");
        }
        
        public function get_all_articles_count()
        {
            return $this->get_value('select count(*) from articles where is_published = 1;');
        }
        
        public function get_article($id)
        {
            return $this->get_row_as_array("select * from articles where id = ?", $id);
        }

        public function get_article_with_category($id)
        {
            return $this->get_row_as_array("select a.*, c.category_name from articles a
                LEFT JOIN categories c ON a.category_id = c.category_id WHERE id = ?", $id);
        }

        public function get_category($category_id)
        {
            return $this->get_row_as_array("select * from categories where category_id = ?", $category_id);
        }
        
        public function get_article_by_url($url)
        {
            return $this->get_row_as_array("select * from articles where url = ?", $url);
        }  

        public function get_article_by_url_with_category($url)
        {
            return $this->get_as_array("select a.*, c.category_name 
                from articles a JOIN categories c ON a.category_id = c.category_id
                WHERE url = ?", $url);
        }    

        public function get_articles_by_category($category_name)
        {
            return $this->get_as_array("SELECT a.id, a.publish_date, a.title, a.url, a.keywords, 
            a.description, a.text, a.image_url, a.is_published, a.category_id, c.category_name FROM articles AS a
            JOIN categories AS c ON a.category_id = c.category_id WHERE category_name = ?", $category_name);
        }  
        
        public function create_article()
        {
            $this->run('insert into articles values()');
            return $this->get_value('select max(id) from articles');
        }

        public function create_category()
        {
            $this->run('insert into categories values()');
            return $this->get_value('select max(category_id) from categories');
        }
        
        public function update_article($id, $title, $url, $keywords, $description, $text, $thumb, $is_published, $category)
        {
            $sql = 'update articles set
                        publish_date = NOW(),
                        title = ?,
                        url = ?, 
                        keywords = ?,
                        description = ?,                        
                        text = ?,
                        image_url = ?,
                        is_published = ?,
                        category_id = ?
                    where id = ?';
            
            $this->run($sql, array($title, $url, $keywords, $description, $text, $thumb, $is_published, $category, $id));
        }

        public function update_category($category_id, $category_name)
        {
            $sql = "update categories set 
            category_name = ?
            where category_id = ?";

            $this->run($sql, array($category_name, $category_id));
        }

        public function delete_article($id)
        {
            $sql = "delete FROM articles WHERE id = ?";
            $this->run($sql, $id);
        }

        public function delete_category($category_id)
        {
            $sql = "delete from categories where category_id = ?";
            $this->run($sql, $category_id);
        }

        public function check_if_article_is_unique_url($url, $id)
        {
            return $this->get_value("select count(*) from articles where url = ? and id != ?", array($url, $id)) != 1;
        }
    }
	
