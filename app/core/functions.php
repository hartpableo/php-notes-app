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

function abort($status_code = 404) {
  http_response_code($status_code);
  require_once base_path("../views/status_codes/{$status_code}.view.php");
  die;
}

function base_path($path = '') {
  return __DIR__ . ($path ? DIRECTORY_SEPARATOR . $path : '');
}