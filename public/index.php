<?php

use Core\Session;

session_start();

// App init
require __DIR__ . '/../app/Core/init.php';
require __DIR__ . '/../app/Core/bootstrap.php';

// Debug
DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

// Routing
$router->route($uri, $method);

// Clear flashed session data
Session::removeFlash();