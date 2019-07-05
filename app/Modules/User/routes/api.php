<?php

Route::group(['module' => 'User', 'middleware' => ['api'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::resource('User', 'ApiController');
    Route::post('/api/user/register', 'ApiController@handleUserRegister');
    Route::post('/api/user/login', 'ApiController@handleUserLogin');
    Route::post('/api/user/profile/update/{id}', 'ApiController@handleUpdateUserProfile');
    Route::post('/api/user/profile/show/{id}', 'ApiController@showUser');

});
