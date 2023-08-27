<?php

namespace Http\Forms;

use Core\Validator;
use Http\Forms\Form;

class LoginForm extends Form
{
  public function validateFields($name, $email, $password)
  {
    if (!Validator::string($name, 2, INF)) $this->errors['name_error'] = 'Name is invalid!';
    if (!Validator::email($email)) $this->errors['email_error'] = 'Email is invalid!';
    if (!Validator::string($password, 7, 255)) $this->errors['password_error'] = 'Password is invalid!';

    return empty($this->errors);
  }
}