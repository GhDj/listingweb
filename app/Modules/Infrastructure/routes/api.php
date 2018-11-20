<?php

Route::group(['module' => 'Infrastructures', 'middleware' => ['api'], 'namespace' => 'App\Modules\Infrastructures\Controllers'], function() {

    Route::resource('Infrastructures', 'InfrastructuresController');

});
