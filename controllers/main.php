<?php
$view_arg = array();

if(isset($_POST['submit']))
{
    Qdoption::qd_addOrUpdate(Qdoption::$QD_DEFAULT_PROFILE, $_POST['default_profile_id']);
    $view_arg['msg'] = 'C?p nh?t thành công!';
}

$view_arg['list_profile'] = Qdprofile::all();
$view_arg['default_profile_id'] = Qdoption::qd_getValueByKey(Qdoption::$QD_DEFAULT_PROFILE);
//load view
require_once(QD_VIEWS . 'main.php');