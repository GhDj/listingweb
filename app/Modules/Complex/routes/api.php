<?php

Route::group(['module' => 'Complex', 'middleware' => ['api'], 'namespace' => 'App\Modules\Complex\Controllers'], function() {

    Route::resource('Complex', 'ComplexController');

});
