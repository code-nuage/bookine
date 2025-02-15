<?php

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\{User, Auth};

$controllers = [
    User::class,
    Auth::class,
];

$router = new Router();
$router->registerControllers($controllers);
$router->run();