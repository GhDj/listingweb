<?php

Route::group(['module' => 'Infrastructures', 'middleware' => ['web'], 'namespace' => 'App\Modules\Infrastructures\Controllers'], function() {

    Route::resource('Infrastructures', 'InfrastructuresController');

    Route::get('/search','WebController@showSearchPage')->name('showSearchPage');

    Route::get('/search/stade','WebController@showTerrainDetails')->name('showTerrainDetails');

});
