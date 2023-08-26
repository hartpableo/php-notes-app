<?php

use Core\Router;

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

/**
 * ==================
 * ===== Routes =====
 * ==================
 */

//  Notes
$router->get('/', 'Notes/index');
$router->get('/note', 'Notes/show')->only('auth');
$router->get('/notes/create', 'Notes/create')->only('auth');
$router->post('/notes/create', 'Notes/store')->only('auth');
$router->delete('/note/delete', 'Notes/destroy')->only('auth');
$router->get('/note/edit', 'Notes/edit')->only('auth');
$router->patch('/note/edit', 'Notes/update')->only('auth');

// Users
$router->get('/user/register', 'Users/register')->only('guest');
$router->post('/user/register', 'Users/store')->only('guest');