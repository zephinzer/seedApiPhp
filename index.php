<?php namespace zephinzer\Todos;



session_start();
date_default_timezone_set('Asia/Singapore');
require_once "vendor/autoload.php";
require_once "bootstrap-requires.php";
require_once "bootstrap-routing.php";
\Slim\Slim::registerAutoLoader();
$nyajtodos = new \Slim\Slim(\zephinzer\Bootstrap\SlimConfig::get());
$nyajtodos->setName('nyajTodos');
configureRouting($nyajtodos);
$nyajtodos->run();

?>