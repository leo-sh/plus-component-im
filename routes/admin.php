<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@show')->name('im:admin');
Route::patch('/', 'HomeController@update')
    ->middleware('auth:web')
    ->name('im.manage.request');

Route::get('/helps', 'HelperController@show')
    ->name('im:admin-helper');
