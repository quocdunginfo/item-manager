<?php
/*
Plugin Name: item-manager
*/
define('QD_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
define('QD_FILE', __FILE__);
require_once(QD_PLUGIN_DIR . 'included/define.php');
require_once(QD_PLUGIN_DIR . 'db-init.php');
//load active record
require_once(QD_PLUGIN_DIR . 'active-record-startup.php');
//register short code
require_once(QD_PLUGIN_DIR . 'shortcode.php');
//register admin menu
require_once(QD_PLUGIN_DIR . 'register-admin-menu.php');
