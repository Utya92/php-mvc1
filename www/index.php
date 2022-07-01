<?php

//Front Controller


// 1 общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2 подключение фаила
define('ROOT', dirname(__FILE__)); // __FILE__ return строку полного пути к проекту
require_once(ROOT . '/components/Router.php'); // ROOT относительный путь корневой директории
require_once(ROOT . "/components/Db.php");

// 3 соеденение с бд


// 4 вызов router
$router = new Router();
$router->run();

