<?php
add_action( 'admin_menu', 'qd_register_custom_menu_page' );
//add_filter( 'query_vars', 'qd_add_custom_query_var' );
//function qd_add_custom_query_var( $vars ){
//  $vars[] = "hocsinh_id";
//  return $vars;
//}
function qd_register_custom_menu_page(){
    add_menu_page( 'QD PLUGIN', 'QD PLUGIN', 'manage_options', 'qd_main_page', 'qd_custom_menu_page');
    //sub
    add_submenu_page( 'qd_main_page', 'Thông tin học sinh', 'Thông tin học sinh', 'manage_options', 'qd_sub_page_1', 'qd_fn_sub_page_1' );  
    add_submenu_page( 'qd_main_page', 'Xem danh sách học sinh', 'Xem danh sách học sinh', 'manage_options', 'qd_sub_page_2', 'qd_fn_sub_page_2' );
    add_submenu_page( 'qd_main_page', 'Xem danh sách lớp', 'Xem danh sách lớp', 'manage_options', 'qd_sub_page_3', 'qd_fn_sub_page_3' );
    
    add_submenu_page( 'qd_main_page', 'Test', 'Test', 'manage_options', 'qd_sub_page_4', 'qd_fn_sub_page_4' );
}

function qd_custom_menu_page(){
    echo 'Ứng dụng quản lý học sinh - lớp SGU';
}
function qd_fn_sub_page_1()
{
    //call controller
    require_once(QD_CONTROLLERS.'quanlyhocsinh.php');
}
function qd_fn_sub_page_2()
{
    //call controller
    require_once(QD_CONTROLLERS.'quanlyhocsinh_all.php');
}
function qd_fn_sub_page_3()
{
    //call controller
    require_once(QD_CONTROLLERS.'quanlylop_all.php');
}
function qd_fn_sub_page_4()
{
    //call controller
    require_once(QD_CONTROLLERS.'test.php');
}