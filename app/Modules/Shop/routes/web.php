<?php

Route::group(['module' => 'Shop', 'middleware' => ['web'], 'namespace' => 'App\Modules\Shop\Controllers'], function() {

    Route::resource('Shop', 'ShopController');

});
