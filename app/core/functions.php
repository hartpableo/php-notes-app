<?php

function show($stuff) {
  echo "<pre>";
  print_r($stuff);
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