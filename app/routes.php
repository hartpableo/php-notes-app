<?php

use Core\Router;

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

/**
 * Routes
 */
$router->get('/', 'Notes/index');
$router->get('/note', 'Notes/show');
$router->get('/notes/create', 'Notes/create');
$router->post('/notes/create', 'Notes/create');
$router->delete('/note/delete', 'Notes/destroy');