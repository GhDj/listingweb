<?php

Route::group(['module' => 'Infrastructures', 'middleware' => ['web'], 'namespace' => 'App\Modules\Infrastructures\Controllers'], function() {

    Route::resource('Infrastructures', 'InfrastructuresController');

});
