<?php
use Core\Container;
use Core\Database;
$container = new Container();
$container->bind('Core\Database', function () {
  $config = require(base_path('config/config.php'));
  return new Database($config);
});