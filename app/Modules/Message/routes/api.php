<?php

Route::group(['module' => 'Message', 'middleware' => ['api'], 'namespace' => 'App\Modules\Message\Controllers'], function() {

    Route::resource('Message', 'ApiController');

});
