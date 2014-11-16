<?php
//view arg
$view_arg = array();

if(isset($_POST['submit']))
{
    if($_POST['id']>0)
    {
        $tmp = Qdprofile::find($_POST['id']);
        if($tmp!=null)
        {
            $tmp->nickname = $_POST['nickname'];
            $tmp->save();
            $view_arg['page'] = $_POST['page'];
            $view_arg['msg'] = 'Cập nhật thành công!';
            $view_arg['obj'] = $tmp;
        }
        else
        {
            $view_arg['msg'] = 'ERROR!';
        }
    }
    else
    {
        $tmp = new Qdprofile();
        $tmp->nickname = $_POST['nickname'];
        $tmp->save();
        $view_arg['obj'] = $tmp;   
        $view_arg['msg'] = 'Thêm thành công!';
    }
    
}
else if(isset($_POST['submit2']))
{
    //neu add skill
    if($_POST['skill_id']>0)
    {
        if($_POST['id']>0)
        {
            $tmp = Qdprofile::find($_POST['id']);
            $tmp->qd_addSkill(Qdskill::find($_POST['skill_id']));
            $view_arg['obj'] = $tmp;   
            $view_arg['msg'] = 'Gán skill thành công!';
        }
        else
        {
            $view_arg['msg'] = 'ERROR!';
        }
    }
    else
    {
        $view_arg['msg'] = 'ERROR!';
    }
}
else
{
    $page = isset($_GET['page'])?$_GET['page']:1;
    $view_arg['page'] = $page;
}
$view_arg['list_obj'] = Qdprofile::all();
$view_arg['list_skill'] = Qdskill::all();
//load view
require_once(QD_VIEWS . 'profile_all.php');