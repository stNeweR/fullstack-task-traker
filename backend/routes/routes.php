<?php

use App\Http\Controllers\UserController;
use Kernel\Router\Route;

return [
    Route::get('/', [UserController::class, 'test']),
    Route::get('/new', [UserController::class, 'test2']),
];
