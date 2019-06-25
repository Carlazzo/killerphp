<?php

define('APPLICATION_PATH' , realpath('../'));
$paths = array(
    APPLICATION_PATH ,
    get_include_path()
	);
set_include_path(implode(PATH_SEPARATOR, $paths));

function __autoload($className) {
	$fileName = str_replace('\\', '/', $className) . '.php'; 
//	echo "now loading: $fileName";
    require_once $fileName;
}


use \com\killerphp\models as Models;


$user = new Models\User();
$user->setAddress("Eiffel Tower");
echo $user->getAddress();

?>
