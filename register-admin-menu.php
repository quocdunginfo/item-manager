<?php
add_action( 'admin_menu', 'qd_register_custom_menu_page' );
function qd_register_custom_menu_page(){
    add_menu_page( 'QD PLUGIN', 'QD PLUGIN', 'manage_options', 'qd_main_page', 'qd_custom_menu_page');
    //sub
    add_submenu_page( 'qd_main_page', 'Quản lý profile', 'Quản lý profile', 'manage_options', 'qd_sub_page_1', 'qd_fn_sub_page_1' );
    add_submenu_page( 'qd_main_page', 'Quản lý skills', 'Quản lý skills', 'manage_options', 'qd_sub_page_2', 'qd_fn_sub_page_2' );  
}

function qd_custom_menu_page(){
    echo 'Ứng dụng quản lý profile cá nhân';
}
function qd_fn_sub_page_1()
{
    //call controller
    require_once(QD_CONTROLLERS.'profile_all.php');
}
function qd_fn_sub_page_2()
{
    //call controller
    require_once(QD_CONTROLLERS.'skill_all.php');
}