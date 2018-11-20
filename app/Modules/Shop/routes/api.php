<?php

Route::group(['module' => 'Shop', 'middleware' => ['api'], 'namespace' => 'App\Modules\Shop\Controllers'], function() {

    Route::resource('Shop', 'ShopController');

});
