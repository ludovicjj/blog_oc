<?php
session_start();

require('master/Autoloader.php');
master\Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'index';
}

switch ($p) {
    case 'index':
        $controller = new master\controller\HomeController();
        $controller->index();
        break;
    case 'posts':
        $controller = new master\controller\PostsController();
        $controller->posts();
        break;
    default:
        $controller = new master\controller\HomeController();
        $controller->index();
}
