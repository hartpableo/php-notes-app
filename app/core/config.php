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

define('APP_NAME', 'PHP Framework');
define('APP_DESC', 'A basic custom PHP framework following MVC.');