<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validate Form
$form = new LoginForm();

if (!$form->validate($name, $email, $password)) {
  return view('users/login', [
    'title' => 'Login',
    'errors' => $form->getErrors()
  ]);
}

// Check if email already exists
$user = $db->query('select * from users where email = :email', [
  ':email' => $email
])->find();

if (!empty($user) && $user['name'] === $name && password_verify($password, $user['password'])) {
  login([
    'id' => $user['id'],
    'name' => $name,
    'email' => $email,
  ]);
} else {
  return view('users/login', [
    'title' => 'Login',
    'errors' => ['User does not exist!']
  ]);
  exit();
}