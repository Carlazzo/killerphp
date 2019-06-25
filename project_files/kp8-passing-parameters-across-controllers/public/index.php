<?php
define('APPLICATION_PATH', realpath('../'));

$paths = array(
	APPLICATION_PATH,
	get_include_path()
);
set_include_path(implode(PATH_SEPARATOR, $paths));

function __autoload($className)
{
	$filename = str_replace('\\', '/' , $className) . '.php';
	require_once $filename;
}
/////
use \com\killerphp\controllers as Controllers;
session_start();


$uri = strtolower($_SERVER['REQUEST_URI']);

list($pfx, $controllerName,$actionName) = preg_split('/[\/\\\]/',$uri);


switch($controllerName)
{
	case "":
	case "index":
		$controllerName = "index";
		$controller = new Controllers\IndexController($controllerName,$actionName);
		break;
	case "test":
		$controller = new Controllers\TestController($controllerName,$actionName);
		break;
}

$controller->dispatch();