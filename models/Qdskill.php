<?php
class Qdskill extends Qdabstract
{
	// order belongs to a person
	static $belongs_to = array(
		array('profile', 'class_name' => 'Qdprofile')
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
            $tmp[$count]['desc'] = $item->desc;
            $tmp[$count]['percent'] = $item->percent;
            $tmp[$count]['avatar'] = $item->avatar;
            $tmp[$count]['_avatar_link'] = $item->qd_getAvatarLink();
            $tmp[$count]['qdprofile_id'] = $item->qdprofile_id;
            $tmp[$count]['_qdprofile_nickname'] = $item->profile->nickname;
            
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
    public function qd_getAvatarLink()
    {
        if($this->avatar>0)
        {
            return wp_get_attachment_url($this->avatar);
        }
        return '';
    }
}

