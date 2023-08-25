<?php
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $errors = [];

  if (strlen(trim($_POST['body'])) === 0) $errors['body_missing'] = 'A body is required!';

  if (strlen($_POST['body']) > 1025) $errors['body_length_limit'] = 'Your body has exceeded the character limit!';

  if (empty($errors)) {
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
      'body' => $_POST['body'],
      'user_id' => 4,
    ]);
  }

}

require base_path('../views/notes/create.view.php');