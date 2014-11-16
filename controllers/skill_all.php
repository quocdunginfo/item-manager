<?php
//view arg
$view_arg = array();
if(isset($_POST['submit']))
{
    if($_POST['id']>0)
    {
        $tmp = Qdskill::find($_POST['id']);
        if($tmp!=null)
        {
            $tmp->title = $_POST['title'];
            $tmp->percent = $_POST['percent'];
            $tmp->desc = $_POST['desc'];
            $tmp->avatar = $_POST['avatar'];
            $tmp->qdprofile_id = $_POST['qdprofile_id'];
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
        $tmp = new Qdskill();
        $tmp->title = $_POST['title'];
        $tmp->percent = $_POST['percent'];
        $tmp->desc = $_POST['desc'];
        $tmp->avatar = $_POST['avatar'];
        $tmp->qdprofile_id = $_POST['qdprofile_id'];
        $tmp->save();
        $view_arg['obj'] = $tmp;   
        $view_arg['msg'] = 'Thêm thành công!';
        $view_arg['page'] = 1;
    }
}
else
{
    $view_arg['obj'] = Qdskill::first();
    $page = isset($_GET['page'])?$_GET['page']:1;
    $view_arg['page'] = $page;
}
$view_arg['list_obj'] = Qdskill::all();
if($view_arg['obj']!=null)
{
    $view_arg['obj_index'] = $view_arg['obj']->qd_findIndexIn($view_arg['list_obj']);
}
else
{
    $view_arg['obj_index'] = 0;
}
$view_arg['list_profile'] = Qdprofile::all();
//load view
require_once(QD_VIEWS . 'skill_all.php');