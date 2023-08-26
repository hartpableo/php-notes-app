<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!Validator::string($name, 2, INF)) $errors['name_error'] = 'Name is invalid!';
if (!Validator::email($email)) $errors['email_error'] = 'Email is invalid!';
if (!Validator::string($password, 7, 255)) $errors['password_error'] = 'Password is invalid!';

if (!empty($errors)) {
  return view('users/register', [
    'title' => 'Register',
    'errors' => $errors
  ]);
}

// Check if email already exists
$user = $db->query('select * from users where email = :email', [
  ':email' => $email
])->find();

if ($user) {
  header('location; /');
  exit();
} else {
  // Register
  $db->query('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)', [
    'name' => $name,
    'email' => $email,
    'password' => $password
  ]);

  // Start session
  $_SESSION['user'] = [
    'name' => $name,
    'email' => $email,
  ];

  // Redirect authenticated user
  header("location: /");
  exit();
}