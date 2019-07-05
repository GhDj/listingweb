<?php

Route::group(['module' => 'Message', 'middleware' => ['web'], 'namespace' => 'App\Modules\Message\Controllers'], function() {

    Route::resource('Message', 'WebController');

});
