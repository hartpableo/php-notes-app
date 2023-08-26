<?php

use Core\Database;
use Core\Response;

$db = new Database;

$current_user_id = 4;

$id = $_POST['id'];
$method = $_POST['_method'];

$note = $db->query('select * from notes where id = :id', [
  ':id' => $id,
])->findOrFail();

authorize($note['user_id'] !== $current_user_id, Response::FORBIDDEN);

$db->query('delete from notes where id = :id', [
  ':id' => $id
]);

header('location: /');
exit();