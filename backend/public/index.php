<?php 
define('APP_PATH', __DIR__);

require_once APP_PATH. '/../vendor/autoload.php';

use Core\App;

$app = new App;
$app->run();