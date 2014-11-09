<?php
$view_arg = array();
$view_arg['obj'] = Hocsinh::all();

//load view
require_once(QD_VIEWS . 'quanlyhocsinh_all.php');