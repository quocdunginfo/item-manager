<?php
/**
 * Proper way to enqueue scripts and styles
 */
add_action( 'admin_enqueue_scripts', 'qd_theme_name_scripts' );
function qd_theme_name_scripts() {
    //css
    //wp_enqueue_style( 'style-name', plugins_url('plugin/jqwidgets/styles/jqx.darkblue.css', QD_FILE) );
    //js
	//wp_enqueue_script( 'script-name', plugins_url('plugin/jqwidgets/jqxcore.js', QD_FILE), array(), '1.0.0', true );
    //wp_enqueue_script( 'script-name-1', plugins_url('plugin/jqwidgets/jqxbuttons.js', QD_FILE), array(), '1.0.0', true );
    
    if (true || isset($_GET['page']) && $_GET['page'] == 'qd_sub_page_1')
    {
        //css
        wp_enqueue_style( 'style-name', plugins_url('plugin/jqwidgets/styles/jqx.base.css', QD_FILE) );
        //js
        wp_enqueue_script( 'script-name-0', 'https://code.jquery.com/jquery-1.11.1.js', array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-1', plugins_url('plugin/jqwidgets/jqxcore.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-1-1', plugins_url('plugin/jqwidgets/jqxdata.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-2', plugins_url('plugin/jqwidgets/jqxbuttons.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-3', plugins_url('plugin/jqwidgets/jqxscrollbar.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-4', plugins_url('plugin/jqwidgets/jqxmenu.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-5', plugins_url('plugin/jqwidgets/jqxcheckbox.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-6', plugins_url('plugin/jqwidgets/jqxlistbox.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-7', plugins_url('plugin/jqwidgets/jqxdropdownlist.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-8', plugins_url('plugin/jqwidgets/jqxgrid.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-9', plugins_url('plugin/jqwidgets/jqxgrid.sort.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-10', plugins_url('plugin/jqwidgets/jqxgrid.pager.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-11', plugins_url('plugin/jqwidgets/jqxgrid.selection.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-111', plugins_url('plugin/jqwidgets/jqxgrid.columnsresize.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-12', plugins_url('plugin/jqwidgets/jqxgrid.edit.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-13', plugins_url('plugin/jqwidgets/jqxnotification.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-16', plugins_url('plugin/jqwidgets/jqxcombobox.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-17', plugins_url('plugin/jqwidgets/jqxdatetimeinput.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-18', plugins_url('plugin/jqwidgets/jqxcalendar.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-19', plugins_url('plugin/jqwidgets/jqxtooltip.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-20', plugins_url('plugin/jqwidgets/globalization/globalize.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-21', plugins_url('plugin/jqwidgets/jqxwindow.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-22', plugins_url('plugin/jqwidgets/jqxscrollbar.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-23', plugins_url('plugin/jqwidgets/jqxpanel.js', QD_FILE), array(), '1.0.0', true );
        wp_enqueue_script( 'script-name-24', plugins_url('plugin/jqwidgets/jqxtabs.js', QD_FILE), array(), '1.0.0', true );
        
    }
}