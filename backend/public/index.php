<?php

// header("Access-Control-Allow-Orgin: *");
// header("Access-Control-Allow-Methods: *");
// header("Content-Type: application/json");

define('APP_PATH', __DIR__);

require_once APP_PATH. '/../vendor/autoload.php';

use Kernel\App;

$app = new App;
$app->run();