<?php

error_reporting(0);
ob_start();
session_start();

require __DIR__ . '/vendor/autoload.php';

use App\Controller\MainController;
use App\Service\Factory;

$factory = new Factory();

$router = $factory->getRouter();

$controller = new MainController($factory);
$controller->createByRoute($router->parseRouteToArray($_SERVER['REQUEST_URI']));


