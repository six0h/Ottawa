Ottawa
======

Love Ottawa Facebook Campaign


Make sure to add a config.php file in the base directory with the following values:

<?php

define("BASE_PATH",	'INSERT PATH HERE');
define("SITE_PATH",	BASE_PATH . 'facebook/');
define("CLASS_PATH",	BASE_PATH . 'classes/');
define("ADMIN_PATH",	BASE_PATH . 'admin/');

define("DB_NAME",	'');
define("DB_USER",	'');
define("DB_PASS",	'');

require_once(BASE_PATH . 'common.php');

$site = array(
	'name' => 'NAME WILL SHOW UP IN ADMIN PANEL');

?>
