<?php

Route::group(['module' => 'General', 'middleware' => ['web'], 'namespace' => 'App\Modules\General\Controllers'], function() {

    Route::resource('General', 'GeneralController');


    Route::get('/index', 'WebController@showHome')->name('showHome');

    Route::get('/index/sports/{sportId}', 'WebController@getTerrainsBySport');

});
