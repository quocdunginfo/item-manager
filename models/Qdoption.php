<?php
class Qdoption extends ActiveRecord\Model
{
	public static $QD_DEFAULT_AVATAR = 'default_avatar_id';
    public static $QD_DEFAULT_PROFILE = 'default_profile_id';
    # explicit table name since our table is not "books" 
    static $table_name = 'wp_qd_option';
  
    # explicit pk since our pk is not "id" 
    static $primary_key = 'id';


    public static function qd_addOrUpdate($key, $value)
    {
        $tmp = Qdoption::find_by_key($key);
        if($tmp!==null)
        {
            $tmp->value = $value;
        }
        else
        {
            $tmp = new Qdoption();
            $tmp->key = $key;
            $tmp->value = $value;
        }
        return $tmp->save();
    }
    public static function qd_getValueByKey($key)
    {
        $tmp = Qdoption::find_by_key($key);
        if($tmp!=null)
        {
            return $tmp->value;
        }
    }
    public static function qd_requestByKey($key)
    {
        $tmp = Qdoption::find_by_key($key);
        if($tmp!==null)
        {
            //
        }
        else
        {
            $tmp = new Qdoption();
            $tmp->key = $key;
        }
        return $tmp;
    }
    public static function qd_getDefaultAvatarLink()
    {
        return '';//wp_get_attachment_url(Option::find_by_key(Option::$QD_DEFAULT_AVATAR)->value);
    }
}

