<?php

if (!defined($_SERVER['IS_DDEV_PROJECT']) || $_SERVER['IS_DDEV_PROJECT'] == 'false') {
  define('DEBUG', false);
  define('DBNAME', 'db');
  define('DBHOST', 'db');
  define('DBUSER', 'db');
  define('DBPASS', 'db');

  // define('ROOT', 'https://live-domain.com');
} else {
  require 'config.ddev.php';
};

define('BASE_PATH', realpath(__DIR__ . '/../../'));

define('APP_NAME', 'PHP Notes App | OOP');
define('APP_DESC', 'A basic custom PHP notes app following the MVC framework.');