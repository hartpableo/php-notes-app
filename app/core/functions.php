<?php

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
  require_once base_path("../views/status_codes/{$status_code}.view.php");
  die;
}

function authorize($condition, $status_code = Response::FORBIDDEN) {
  if ($condition === true) abort($status_code);
}

function base_path($path = '') {
  return __DIR__ . ($path ? DIRECTORY_SEPARATOR . $path : '');
}

function urlIs($value) {
  return $_SERVER['REQUEST_URI'] === $value;
}

function get_template_part($template_part) {
  switch ($template_part) {
    case 'header':
      require base_path('../views/template-parts/header.php');
      break;
    
    case 'footer':
      require base_path('../views/template-parts/footer.php');
      break;
    
    default:
      echo "The template part '{$template_part}' is missing.";
      break;
  }
}