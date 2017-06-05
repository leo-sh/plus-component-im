<?php

use Illuminate\Support\Facades\Route;

// Created IM APIs.
Route::prefix('/api/v1/im')
    ->middleware('api')
    ->namespace('Zhiyi\\Component\\ZhiyiPlus\\PlusComponentIm\\Controllers')
    ->group(__DIR__.'/routes/api.php');

// Created IM manage routes.
Route::prefix('im/admin')
    ->middleware('web')
    ->namespace('Zhiyi\\Component\\ZhiyiPlus\\PlusComponentIm\\AdminControllers')
    ->group(__DIR__.'/routes/admin.php');
