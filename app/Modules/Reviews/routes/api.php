<?php

Route::group(['module' => 'Reviews', 'middleware' => ['api'], 'namespace' => 'App\Modules\Reviews\Controllers'], function() {

    Route::resource('Reviews', 'ReviewsController');

});
