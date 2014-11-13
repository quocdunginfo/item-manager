<?php
$view_arg = array();
//var_dump($_POST);
if(isset($_POST['submit']))
{
    //update or add
    $re = Option::qd_addOrUpdate($_POST['default_avatar_key'], $_POST['default_avatar_value']);
    
    $view_arg['msg'] = 'Cập nhật thành công!';
    $view_arg['obj'] = Option::find_by_key($_POST['default_avatar_key']);
}
else
{
    $view_arg['obj'] = Option::qd_requestByKey(Option::$QD_DEFAULT_AVATAR);
}

//load view
require_once(QD_VIEWS . 'option.php');