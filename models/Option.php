<?php
class Option extends ActiveRecord\Model
{
	public static $QD_DEFAULT_AVATAR = 'default_avatar_id';
    # explicit table name since our table is not "books" 
    static $table_name = 'wp_qd_option';
  
    # explicit pk since our pk is not "id" 
    static $primary_key = 'id';
	
	//static $before_update = array('on_before_update'); # new records only
	
	//public function on_before_update()
//	{
//		$this->date_modified = $dt = new DateTime();
//	}
    
    //static $before_create = array('on_before_create'); # new records only
//	
//	public function on_before_create()
//	{
//		$this->date_create = $dt = new DateTime();
//	}
	
    //public function set_lop($lop) {
//		$this->lop_id = $lop->id;
//    }

    public static function qd_addOrUpdate($key, $value)
    {
        $tmp = Option::find_by_key($key);
        if($tmp!==null)
        {
            $tmp->value = $value;
        }
        else
        {
            $tmp = new Option();
            $tmp->key = $key;
            $tmp->value = $value;
        }
        return $tmp->save();
    }
    public static function qd_requestByKey($key)
    {
        $tmp = Option::find_by_key($key);
        if($tmp!==null)
        {
            //
        }
        else
        {
            $tmp = new Option();
            $tmp->key = $key;
        }
        return $tmp;
    }
    public static function qd_getDefaultAvatarLink()
    {
        return wp_get_attachment_url(Option::find_by_key(Option::$QD_DEFAULT_AVATAR)->value);
    }
}

