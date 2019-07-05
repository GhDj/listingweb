<?php

Route::group(['module' => 'Notification', 'middleware' => ['web'], 'namespace' => 'App\Modules\Notification\Controllers'], function() {

    Route::resource('Notification', 'WebController');

});
