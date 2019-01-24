<?php

Route::group(['module' => 'Reviews', 'middleware' => ['web'], 'namespace' => 'App\Modules\Reviews\Controllers'], function() {

    Route::resource('Reviews', 'ReviewsController');
    Route::post('/userReport/{terrain_id}','WebController@hundleUserReport')->name('hundleUserReport');
});
