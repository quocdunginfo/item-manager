<?php
class Qdskill extends ActiveRecord\Model
{
	// order belongs to a person
	static $belongs_to = array(
		array('avatar', 'class_name' => 'Qdattachment', 'foreign_key' => 'id')
	);
    // order belongs to a person
	static $has_many = array(
        array('profiles', 'class_name' => 'Qdprofile', 'through' => 'profile_skills'),
        array('profile_skills', 'class_name' => 'Qdprofile_skill')
    );
	
	# explicit table name since our table is not "books" 
    static $table_name = 'wp_qd_skill';
  
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
    public static function toJSON($qdskill_list)
    {
        $tmp = array();
        $count = 0;
        foreach($qdskill_list as $item)
        {
            $tmp[$count] = array();
            $tmp[$count]['id'] = $item->id;
            $tmp[$count]['title'] = $item->title;
            
            $count++;
            
        }
        return json_encode($tmp);
    }
    public static function toJSON2($qdskill_list)
    {
        $tmp = array();
        $count = 0;
        foreach($qdskill_list as $item)
        {
            $tmp[$count] = array();
            $tmp[$count]['id'] = $item->id;
            $tmp[$count]['title'] = $item->title.' - '.$item->percent.'%';
            
            $count++;
            
        }
        return json_encode($tmp);
    } 
}

