<?php

Route::group(['module' => 'Infrastructures', 'middleware' => ['web'], 'namespace' => 'App\Modules\Infrastructures\Controllers'], function() {

    Route::resource('Infrastructures', 'InfrastructuresController');

    Route::get('/search','WebController@showSearchPage')->name('showSearchPage');

    Route::get('/search/terrain','WebController@showTerrainDetails')->name('showTerrainDetails');

    Route::get('/search/club','WebController@showClubDetails')->name('showClubDetails');

});
