<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('admin/dashboard','WebController@showAdminDashboard')->name('showAdminDashboard');
    Route::get('user/activation/{email}/{activationCode}', 'WebController@handleUserActivation');

    Route::post('user/register', 'WebController@handleUserRegister')->name('handleUserRegister');
    Route::post('user/login', 'WebController@handleUserLogin')->name('handleUserLogin');
    Route::get('user/dashboard','WebController@showUserDashboard')->name('showUserDashboard');
    Route::get('user/profile','WebController@showUserProfile')->name('showUserProfile');
    Route::get('user/message','WebController@showUserMessage')->name('showUserMessage');
    Route::get('user/password','WebController@showUserPassword')->name('showUserPassword');
    Route::get('user/listing','WebController@showUserListing')->name('showUserListing');
    Route::get('user/addTerrain','WebController@showUserAddTerrain')->name('showUserListing');

});
