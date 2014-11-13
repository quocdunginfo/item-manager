<?php
class Hocsinh extends ActiveRecord\Model
{
	// order belongs to a person
	static $belongs_to = array(
		array('lop', 'class_name' => 'Lop', 'foreign_key' => 'id')
	);
	
	# explicit table name since our table is not "books" 
    static $table_name = 'wp_qd_hocsinh';
  
    # explicit pk since our pk is not "id" 
    static $primary_key = 'id';
	
	static $before_update = array('on_before_update'); # new records only
	
	public function on_before_update()
	{
		$this->date_modified = $dt = new DateTime();
	}
    
    static $before_create = array('on_before_create'); # new records only
	
	public function on_before_create()
	{
		$this->date_create = $dt = new DateTime();
	}
	
    public function set_lop($lop) {
		$this->lop_id = $lop->id;
    }
    
    public function qd_getAvatarLink()
    {
        if($this->avatar!==null)
        {
            return wp_get_attachment_url($this->avatar);
        }
        else
        {
            return Option::qd_getDefaultAvatarLink();
        }
    }
}

