<?php

use AHT\Dispatcher;

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT . 'vendor/autoload.php');
include(ROOT . 'Config/core.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>

?>