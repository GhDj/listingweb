<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('admin/dashboard','WebController@showAdminDashboard')->name('showAdminDashboard');
    Route::get('user/activation/{email}/{activationCode}', 'WebController@handleUserActivation');

    Route::post('user/register', 'WebController@handleUserRegister')->name('handleUserRegister');
    Route::post('user/login', 'WebController@handleUserLogin')->name('handleUserLogin');
});
