<?php
class Qdprofile_skill extends ActiveRecord\Model
{
	// order belongs to a person
	static $belongs_to = array(
		array('profile', 'class_name' => 'Qdprofile'),
        array('skill', 'class_name' => 'Qdskill'),
	);
	
	# explicit table name since our table is not "books" 
    static $table_name = 'wp_qd_profile_skill';
  
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
    public static function qd_create($profile, $skill)
    {
        $tmp = new Qdprofile_skill();
        $tmp->qdprofile_id = $profile->id;
        $tmp->qdskill_id = $skill->id;
        return $tmp;
    }
}

