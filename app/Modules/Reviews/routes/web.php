<?php

Route::group(['module' => 'Reviews', 'middleware' => ['web'], 'namespace' => 'App\Modules\Reviews\Controllers'], function() {

    Route::resource('Reviews', 'WebController');
    Route::post('/userReport/{terrain_id}','WebController@hundleUserReport')->name('hundleUserReport');
    Route::post('/userReview/{terrain_id}','WebController@hundleUserReviews')->name('hundleUserReviews');
    Route::get('/index/userWichlist/{type}/{id}','WebController@hundleUserWichlist')->name('hundleUserWichlist');


});
