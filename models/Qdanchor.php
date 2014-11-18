<?php
class Qdanchor extends Qdabstract
{
	static $belongs_to = array(
        array('profile', 'class_name' => 'Qdprofile')
    );
	
	# explicit table name since our table is not "books" 
    static $table_name = 'wp_qd_anchor';
  
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
    public function toJSON($list_obj)
    {
        $tmp = array();
        $count = 0;
        foreach($list_obj as $item)
        {
            $tmp[$count] = array();
            $tmp[$count]['id'] = $item->id;
            $tmp[$count]['title'] = $item->title;
            $tmp[$count]['desc'] = $item->desc;
            $tmp[$count]['location'] = $item->location;
            $tmp[$count]['position'] = $item->position;
            $tmp[$count]['date_from'] = qd_datetime_to_js($item->date_from);
            $tmp[$count]['date_to'] = qd_datetime_to_js($item->date_to);
            $tmp[$count]['qdprofile_id'] = $item->qdprofile_id;
            $tmp[$count]['_qdprofile_nickname'] = $item->profile->nickname;
            
            
            //$tmp[$count]['skills_JSON'] = addslashes(Qdskill::toJSON2($item->skills));
            $count++;
            
        }
        return json_encode($tmp);
    }
    public static function toJSON2($list_obj)
    {
        $tmp = array();
        $count = 0;
        foreach($list_obj as $item)
        {
            $tmp[$count] = array();
            $tmp[$count]['id'] = $item->id;
            $tmp[$count]['title'] = $item->title;
            
            $count++;
            
        }
        return json_encode($tmp);
    }
}

