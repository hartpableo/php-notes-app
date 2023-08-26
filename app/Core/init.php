<?php

// Class Autoloader
spl_autoload_register(function ($className) {
  $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
  $filePath = base_path("app/{$classPath}.php");

  if (file_exists($filePath)) {
    require_once $filePath;
  }
});

require_once 'config.php';
require_once 'Response.php';
require_once 'Validator.php';
require_once 'functions.php';
require_once 'Router.php';
require_once '../app/routes.php';