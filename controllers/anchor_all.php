<?php
//view arg
$view_arg = array();
if(isset($_POST['submit']))
{
    if($_POST['id']>0)
    {
        $tmp = Qdanchor::find($_POST['id']);
        if($tmp!=null)
        {
            $tmp->title = $_POST['title'];
            $tmp->position = $_POST['position'];
            $tmp->desc = $_POST['desc'];
            $tmp->date_from = qd_js_to_datetime($_POST['date_from']);
            $tmp->date_to = qd_js_to_datetime($_POST['date_to']);
            $tmp->location = $_POST['location'];
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
        $tmp = new Qdanchor();
        $tmp->title = $_POST['title'];
        $tmp->position = $_POST['position'];
        $tmp->desc = $_POST['desc'];
        $tmp->date_from = qd_js_to_datetime($_POST['date_from']);
        $tmp->date_to = qd_js_to_datetime($_POST['date_to']);
        $tmp->location = $_POST['location'];
        $tmp->qdprofile_id = $_POST['qdprofile_id'];
        $tmp->save();
        $view_arg['obj'] = $tmp;   
        $view_arg['msg'] = 'Thêm thành công!';
        $view_arg['page'] = 1;
    }
}
else
{
    $view_arg['obj'] = Qdanchor::first();
    $page = isset($_GET['page'])?$_GET['page']:1;
    $view_arg['page'] = $page;
}
$view_arg['list_obj'] = Qdanchor::all();
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
require_once(QD_VIEWS . 'anchor_all.php');