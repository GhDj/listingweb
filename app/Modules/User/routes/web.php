<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('admin/dashboard','WebController@showAdminDashboard')->name('showAdminDashboard');
    Route::get('user/activation/{email}/{activationCode}', 'WebController@handleUserActivation');


});
