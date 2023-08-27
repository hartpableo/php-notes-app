<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validate Form
$form = new LoginForm();

if ($form->validateFields($name, $email, $password)) {

  // Validate User
  if ((new Authenticator())->attempt($name, $email, $password)) {
    redirect();
  }

  // If auth fails, redirect to login page with error
  $form->addError('auth_error', 'User does not exist!');

}

return view('users/login', [
  'title' => 'Login',
  'errors' => $form->getErrors()
]);