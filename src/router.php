<?php

use Illuminate\Support\Facades\Route;
use function Zhiyi\Component\ZhiyiPlus\PlusComponentIm\base_path as component_base_path;

// Created IM APIs.
Route::prefix('/api/v1/im')
    ->middleware('api')
    ->namespace('Zhiyi\\Component\\ZhiyiPlus\\PlusComponentIm\\Controllers')
    ->group(component_base_path('routes/api.php'));

