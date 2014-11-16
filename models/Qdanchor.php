<?php
class Qdanchor extends ActiveRecord\Model
{
	static $belongs_to = array(
        array('profile', 'class_name' => 'Qdprofile', 'foreign_key' => 'profile_id')
    );
	
	# explicit table name since our table is not "books" 
    static $table_name = 'wp_qd_qdanchor';
  
    # explicit pk since our pk is not "id" 
    static $primary_key = 'id';
	
	static $before_update = array('on_before_update'); # new records only
	
	public function on_before_update()
	{
		//$this->date_modified = $dt = new DateTime();
	}
    
    static $before_create = array('on_before_create'); # new records only
	
	public function on_before_create()
	{
		//$this->date_create = $dt = new DateTime();
	}
}

