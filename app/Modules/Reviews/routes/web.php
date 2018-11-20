<?php

Route::group(['module' => 'Reviews', 'middleware' => ['web'], 'namespace' => 'App\Modules\Reviews\Controllers'], function() {

    Route::resource('Reviews', 'ReviewsController');

});
