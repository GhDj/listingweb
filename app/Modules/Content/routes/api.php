<?php

Route::group(['module' => 'Content', 'middleware' => ['api'], 'namespace' => 'App\Modules\Content\Controllers'], function() {

    Route::resource('Content', 'ContentController');

});
