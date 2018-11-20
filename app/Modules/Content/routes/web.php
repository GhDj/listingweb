<?php

Route::group(['module' => 'Content', 'middleware' => ['web'], 'namespace' => 'App\Modules\Content\Controllers'], function() {

    Route::resource('Content', 'ContentController');

});
