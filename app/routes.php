<?php

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

/**
 * Routes
 */
$router->get('/', 'Posts/index');
$router->get('/note', 'Posts/show');