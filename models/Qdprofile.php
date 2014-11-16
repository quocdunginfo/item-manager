<?php
class Qdprofile extends ActiveRecord\Model
{
	static $has_many = array(
        //array('anchors', 'class_name' => 'Qdanchor', 'through' => 'profile_anchors'),
//        array('profile_anchors', 'class_name' => 'Qdprofile_anchor'),
//        
//        array('links', 'class_name' => 'Qdlink', 'through' => 'profile_links'),
//        array('profile_links', 'class_name' => 'Qdprofile_link'),
//        
//        array('attachments', 'class_name' => 'Qdattachment', 'through' => 'profile_attachments'),
//        array('profile_attachments', 'class_name' => 'Qdprofile_attachment'),
        
        array('skills', 'class_name' => 'Qdskill', 'through' => 'profile_skills'),
        array('profile_skills', 'class_name' => 'Qdprofile_skill'),
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
    public static function toJSON($qdprofile_list)
    {
        $tmp = array();
        $count = 0;
        foreach($qdprofile_list as $item)
        {
            $tmp[$count] = array();
            $tmp[$count]['id'] = $item->id;
            $tmp[$count]['nickname'] = $item->nickname;
            $tmp[$count]['skills_JSON'] = addslashes(Qdskill::toJSON2($item->skills));
            $count++;
            
        }
        return json_encode($tmp);
    }
    
    
    /**
     * Qdprofile::qd_addSkill()
     * skill->id>0,
     * auto save
     * @param mixed $skill
     * @return
     */
    public function qd_addSkill($skill)
    {
        foreach($this->skills as $item)
        {
            if($item->id===$skill->id)
            {
                return false;
            }
        }
        $tmp = Qdprofile_skill::qd_create($this,$skill);
        $tmp->save();
    }
}

