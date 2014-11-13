<?php
/**
 * Proper way to enqueue scripts and styles
 */
add_action( 'admin_enqueue_scripts', 'qd_theme_name_scripts' );
function qd_theme_name_scripts() {
    //css
    wp_enqueue_style( 'style-name', plugins_url('plugin/jqwidgets/styles/jqx.darkblue.css', QD_FILE) );
    //js
	wp_enqueue_script( 'script-name', plugins_url('plugin/jqwidgets/jqxcore.js', QD_FILE), array(), '1.0.0', true );
    wp_enqueue_script( 'script-name-1', plugins_url('plugin/jqwidgets/jqxbuttons.js', QD_FILE), array(), '1.0.0', true );
    
    if (isset($_GET['page']) && $_GET['page'] == 'qd_sub_page_1')
    {
        
    }
}