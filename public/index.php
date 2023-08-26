<?php

session_start();

// App init
require __DIR__ . '/../app/Core/init.php';

// Debug
DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

// Routing
$router->route($uri, $method);