<?php

$db = new Database();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (!Validator::string($_POST['body'], 1, 1000)) $errors['body'] = 'A body of no more than 1000 characters is required!';

  if (empty($errors)) {
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
      'body' => $_POST['body'],
      'user_id' => 4,
    ]);
  }

}

view('notes/create', [
  'title' => 'Create Note'
]);