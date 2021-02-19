<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

$url = isset($_GET['url']) ? $_GET['url'] : "/";

require(ROOT . 'vendor/autoload.php');
require(ROOT . 'Config/db.php');

use App\Controllers\tasksController;

// require(ROOT . 'router.php');
// require(ROOT . 'request.php');
// require(ROOT . 'dispatcher.php');

// $dispatch = new Dispatcher();
// $dispatch->dispatch();
switch ($url) {
    case "/":
        $ctl = new tasksController;
        $ctl->index();
        break;

    case "tasks/create":
        $ctl = new tasksController;
        $ctl->create();
        break;

    case "tasks/add":
        $ctl = new tasksController;
        $ctl->add();
        break;

    case "tasks/edit":
        $ctl = new tasksController;
        $ctl->edit();
        break;

    case "tasks/update":
        $ctl = new tasksController;
        $ctl->update();
        break;

    case "tasks/delete":
        $ctl = new tasksController;
        $ctl->delete();
        break;

    default:
        echo "Đường dẫn không xác định";
        break;
}

?>