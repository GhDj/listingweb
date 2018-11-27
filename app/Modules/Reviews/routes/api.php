<?php

Route::group(['module' => 'Reviews', 'middleware' => ['api'], 'namespace' => 'App\Modules\Reviews\Controllers'], function() {

    Route::resource('Reviews', 'ReviewsController');
    Route::post('/api/wishlist/all/{userId}', 'ApiController@getWishlist');
    Route::post('/api/wishlist/add/{userId}', 'ApiController@handleAddToWishlist');
    Route::post('/api/wishlist/delete/{userId}', 'ApiController@handleDeleteFromWishlist');

});
