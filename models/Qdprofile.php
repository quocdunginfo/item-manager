<?php
class Qdprofile extends ActiveRecord\Model
{
	static $has_many = array(
        array('skills', 'class_name' => 'Qdskill'),
        array('anchors', 'class_name' => 'Qdanchor')
    );
	# explicit table name since our table is not "books" 
    static $table_name = 'wp_qd_profile';
  
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
    public function qd_getBigSkills()
    {
        return Qdskill::all(array('conditions'=>array('qdprofile_id = ? AND isbigskill = ?',$this->id,1)));
    }
    public static function toJSON($qdprofile_list)
    {
        $tmp = array();
        $count = 0;
        foreach($qdprofile_list as $item)
        {
            $tmp[$count] = array();
            $tmp[$count]['id'] = $item->id;
            $tmp[$count]['nickname'] = $item->nickname;
            $count++;
            
        }
        return json_encode($tmp);
    }
    public static function toJSON2($qdprofile_list)
    {
        $tmp = array();
        $count = 0;
        foreach($qdprofile_list as $item)
        {
            $tmp[$count] = array();
            $tmp[$count]['id'] = $item->id;
            $tmp[$count]['nickname'] = $item->nickname;
            $tmp[$count]['fullname'] = $item->fullname;
            $tmp[$count]['slogan'] = $item->slogan;
            $tmp[$count]['email'] = $item->email;
            $tmp[$count]['phone'] = $item->phone;
            $tmp[$count]['address'] = $item->address;
            $tmp[$count]['repository'] = $item->repository;
            $tmp[$count]['blog'] = $item->blog;
            
            
            $tmp[$count]['_skills_JSON'] = addslashes(Qdskill::toJSON2($item->skills));
            $tmp[$count]['_anchors_JSON'] = addslashes(Qdanchor::toJSON2($item->anchors));
            $count++;
            
        }
        return json_encode($tmp);
    }
    
}

