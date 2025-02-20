<?php

require 'vendor/autoload.php';

use App\Router;
use App\Controllers\{User,Loan,Book};

$controllers = [
    User::class,
    Loan::class,
    Book::class
];

$router = new Router();
$router->registerControllers($controllers);
$router->run();