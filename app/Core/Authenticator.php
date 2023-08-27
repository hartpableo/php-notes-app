<?php

namespace Core;

use Core\App;
use Core\Database;

class Authenticator 
{
  public function attempt($name, $email, $password) 
  {
    $user = App::resolve(Database::class)->query('select * from users where email = :email', [
      ':email' => $email
    ])->find();

    if ($user && $user['name'] === $name && password_verify($password, $user['password'])) {

      $this->login([
        'id' => $user['id'],
        'name' => $name,
        'email' => $email,
      ]);

      return true;

    }
  }

  public function login($user = []) {
    $_SESSION['user'] = $user;
    session_regenerate_id(true);

    exit();
  }
  
  public function logout() {
    session_unset();
    session_destroy();
  
    $params = session_get_cookie_params();
    setcookie(
      'PHPSESSID', 
      '', 
      time() - 3600, 
      $params['path'], 
      $params['domain'], 
      $params['secure'], 
      $params['httponly']
    );

    exit();
  }
}