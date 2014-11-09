<?php
$view_arg = array();
//handling data and pass arg to view
//var_dump($_POST);
$hocsinh_id = $_GET['hocsinh_id'];
if(isset($_POST['submit']))
{
    //update
    $tmp = Hocsinh::find($_POST['id']);
    $tmp->name = $_POST['hoten'];
    $tmp->lop->name = $_POST['lop'];
    $tmp->lop->save();
    $tmp->save();
    $view_arg['msg'] = 'Cập nhật thành công!';
    $view_arg['obj'] = $tmp;
}
else
{
    $view_arg['obj'] = Hocsinh::find($hocsinh_id);
}

//load view
require_once(QD_VIEWS . 'quanlyhocsinh.php');