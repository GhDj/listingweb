<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('admin/dashboard','UserController@showAdminDashboard')->name('showAdminDashboard');

});
