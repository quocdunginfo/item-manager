<?php
class Lop extends ActiveRecord\Model
{
	static $has_many = array(
     array('hocsinhs','class_name' => 'Hocsinh')
    );
    static $belongs_to = array(
     array('parent', 'class_name' => 'Lop', 'foreign_key' => 'id')
    );
	# explicit table name since our table is not "books" 
    static $table_name = 'wp_qd_lop';
  
    # explicit pk since our pk is not "id" 
    static $primary_key = 'id';
    public function set_parent($parent)
    {
        $this->parent_id = $parent->id;
    }
}

