<?php

/*** Configuration ***/

ini_set('display_errors', 'on');
error_reporting(E_ALL);

$root = $_SERVER['DOCUMENT_ROOT'];
$host = $_SERVER['HTTP_HOST'];

define('HOST', 'http://'.$host.'/P4OC/site/');
define('ROOT', $root.'/P4OC/site/');

define('CONTROLLERFRONT', ROOT.'controller/frontend/');
define('CONTROLLERBACK', ROOT.'controller/backend/');
define('VIEWFRONT', ROOT.'view/frontend/');
define('VIEWBACK', ROOT.'view/backend/');
define('MODEL', ROOT.'model/');
define('CLASSES', ROOT.'classes/');

define('ASSETS', HOST.'assets/css/');