<?php
/*
Plugin Name: item-manager
*/
define('QD_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
define('QD_HELPER_DIR', QD_PLUGIN_DIR.'helpers/');
define('QD_FILE', __FILE__);
require_once(QD_PLUGIN_DIR . 'included/define.php');
require_once(QD_PLUGIN_DIR . 'db-init.php');
//loading helper
require_once(QD_HELPER_DIR . 'index.php');
//load active record
require_once(QD_PLUGIN_DIR . 'active-record-startup.php');
//register short code
require_once(QD_PLUGIN_DIR . 'shortcode.php');
//register js, css
require_once(QD_PLUGIN_DIR . 'register-js-css.php');
//build plugin menu
require_once(QD_PLUGIN_DIR . 'register-admin-menu.php');
//rigister admin menu nav
require_once(QD_PLUGIN_DIR . 'menu-nav-provider.php');
