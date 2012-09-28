<?php

require_once(BASE_PATH . 'functions.php');

require_once(CLASS_PATH . 'MongoSessionHandler.php');
MongoSessionHandler::register(DB_NAME, 'sessions');
$session = MongoSessionHandler::getInstance();
require_once(CLASS_PATH . 'mongo.class.php');
require_once(CLASS_PATH . 'user.class.php');

?>
