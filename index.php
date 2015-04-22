<?php namespace zephinzer\Application;

session_start();
date_default_timezone_set('Asia/Singapore');
require_once "vendor/autoload.php";
require_once "bootstrap-requires.php";
\Slim\Slim::registerAutoLoader();
$nyajtodos = new \Slim\Slim(\zephinzer\Bootstrap\SlimConfig::get());
$nyajtodos->setName('nyajTodos');
configureRouting($nyajtodos);
$nyajtodos->run();

?>