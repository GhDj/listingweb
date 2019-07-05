<?php

Route::group(['module' => 'Reviews', 'middleware' => ['api'], 'namespace' => 'App\Modules\Reviews\Controllers'], function() {

    Route::resource('Reviews', 'ApiController');
    Route::post('/api/wishlist/all/{userId}', 'ApiController@getWishlist');
    Route::post('/api/wishlist/add/{userId}', 'ApiController@handleAddToWishlist');
    Route::post('/api/wishlist/delete/{userId}', 'ApiController@handleDeleteFromWishlist');
    Route::post('/api/review/add/{userId}', 'ApiController@handleAddReview');
    Route::post('/api/review/all/{userId}', 'ApiController@getReviews'); 
    Route::post('/api/review/delete', 'ApiController@handleDeleteReview');
    Route::post('/api/report/add/{userId}', 'ApiController@handleAddReport');
    Route::post('/api/reports/all/{userId}', 'ApiController@getReports');
    Route::post('/api/report/delete', 'ApiController@handleDeleteReport');
    Route::post('/api/ads/all', 'ApiController@getAds');
});
