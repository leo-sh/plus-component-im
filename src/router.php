<?php
use function Zhiyi\Component\ZhiyiPlus\PlusComponentIm\base_path as component_base_path;

Route::middleware('web')
    ->namespace('Zhiyi\\Component\\ZhiyiPlus\\PlusComponentIm\\Controllers')
    ->group(component_base_path('/routes/web.php'));
Route::prefix('api/v1')
    ->namespace('Zhiyi\\Component\\ZhiyiPlus\\PlusComponentIm\\Controllers')
    ->group(component_base_path('/routes/api.php'));