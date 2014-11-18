<?php
class Qdabstract extends ActiveRecord\Model
{
    public function qd_findIndexIn($list_obj)
    {
        if($this->id>0)
        {
            for($i=0;$i<count($list_obj);$i++)
            {
                if($list_obj[$i]->id===$this->id)
                {
                    return $i;
                }
            }
        }
        return -1;
    }    
}