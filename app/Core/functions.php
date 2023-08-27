<?php

use Core\Response;

function show($stuff) {
  echo "<pre>";
  print_r($stuff);
  echo "</pre>";
  die();
}

function dd($stuff) {
  echo "<pre>";
  var_dump($stuff);
  echo "</pre>";
  die();
}

function esc($str) {
  return htmlspecialchars($str);
}

function abort($status_code = Response::NOT_FOUND) {
  http_response_code($status_code);
  view("status_codes/{$status_code}");
  die();
}

function authorize($condition, $status_code = Response::FORBIDDEN) {
  if ($condition) abort($status_code);
}

function base_path($path = '') {
  return BASE_PATH . ($path ? DIRECTORY_SEPARATOR . $path : '');
}

function urlIs($value) {
  return $_SERVER['REQUEST_URI'] === $value;
}

function view($path, $attributes = []) {
  extract($attributes);
  return require base_path("app/views/{$path}.view.php");
}

function get_template_part($template_part) {
  view("partials/{$template_part}");
}

function assetPath($path_to_file) {
  return ROOT . "/assets/{$path_to_file}";
}

function auth() {
  return $_SESSION['user'] ?? false;
}

function redirect($path, $message = '') {
  $_SESSION['message'] = $message;
  header("location: {$path}");
  exit();
}

function getCurrentUserID() {
  return $_SESSION['user']['id'] ?? null;
}

function login($user = [], $redirect_to = '/') {
  $_SESSION['user'] = $user;
  session_regenerate_id(true);

  redirect($redirect_to);
  exit();
}

function logout($redirect_to = '/') {
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

  redirect($redirect_to);
  exit();
}