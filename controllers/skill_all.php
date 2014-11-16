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
        $tmp->save();
        $view_arg['obj'] = $tmp;   
        $view_arg['msg'] = 'Thêm thành công!';
    }
}
else
{
    $page = isset($_GET['page'])?$_GET['page']:1;
    $view_arg['page'] = $page;
}
$view_arg['list_obj'] = Qdskill::all();
//load view
require_once(QD_VIEWS . 'skill_all.php');