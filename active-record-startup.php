<?php
require_once QD_PLUGIN_DIR . 'plugin/php-activerecord/ActiveRecord.php';

$connections = array(
   'development' => 'mysql://'.DB_USER.':'.DB_PASSWORD.'@'.DB_HOST.'/'.DB_NAME,
   'production' => 'mysql://'.DB_USER.':'.DB_PASSWORD.'@'.DB_HOST.'/'.DB_NAME.'?charset=utf8'
);
 
# must issue a "use" statement in your closure if passing variables
ActiveRecord\Config::initialize(function($cfg) use ($connections)
{
  $model_dir = QD_PLUGIN_DIR.'models';
  $cfg->set_model_directory($model_dir);
  $cfg->set_connections($connections);

  # default connection is now production
  $cfg->set_default_connection('production');
});