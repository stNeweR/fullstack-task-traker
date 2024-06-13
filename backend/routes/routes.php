<?php

use App\Http\UserController;
use Core\Router\Router;

Router::get('/', [UserController::class, 'test']);
Router::get('/new', [UserController::class, 'test2']);