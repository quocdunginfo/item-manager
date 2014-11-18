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
            $tmp->repository = $_POST['repository'];
            $tmp->blog = $_POST['blog'];
            $tmp->slogan = $_POST['slogan'];
            $tmp->address = $_POST['address'];
            $tmp->email = $_POST['email'];
            $tmp->phone = $_POST['phone'];
            $tmp->fullname = $_POST['fullname'];
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
        $tmp->repository = $_POST['repository'];
        $tmp->blog = $_POST['blog'];
        $tmp->slogan = $_POST['slogan'];
        $tmp->address = $_POST['address'];
        $tmp->email = $_POST['email'];
        $tmp->phone = $_POST['phone'];
        $tmp->fullname = $_POST['fullname'];
        
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
$view_arg['list_obj'] = Qdprofile::all();
$view_arg['list_skill'] = Qdskill::all();
//load view
require_once(QD_VIEWS . 'profile_all.php');