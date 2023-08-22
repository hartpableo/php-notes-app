<?php

session_start();

// App init
require '../app/core/init.php';

// Debug
DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

// Routing
$router->route($uri, $method);

$db = new Database();

$id = $_GET['id'];
$query = 'select * from posts where id = :id';

$posts = $db->query($query, [':id' => $id])->fetchAll();
show($posts);