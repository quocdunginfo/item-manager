<?php
//view arg
$view_arg = array();

$view_arg['list_obj'] = Qdpost::all();
//load view
require_once(QD_VIEWS . 'server_paging.php');