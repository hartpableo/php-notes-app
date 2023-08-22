<?php

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

/**
 * Routes
 */

// Pages
$router->get('/', 'HomeController');

// Posts
$router->get('/posts', 'Posts/index');