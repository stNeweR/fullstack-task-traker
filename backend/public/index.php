<?php
define('APP_PATH', __DIR__);

require_once APP_PATH. '/../vendor/autoload.php';

use Kernel\App;

$app = new App;
$app->run();