<?php

// Class Autoloader
spl_autoload_register(function ($className) {
  $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
  $filePath = base_path("{$classPath}.php");

  if (file_exists($filePath)) {
      require_once $filePath;
  }
});

require 'config.php';
require 'functions.php';
require 'Router.php';
require '../app/routes.php';