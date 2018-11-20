<?php

Route::group(['module' => 'Notification', 'middleware' => ['api'], 'namespace' => 'App\Modules\Notification\Controllers'], function() {

    Route::resource('Notification', 'NotificationController');

});
