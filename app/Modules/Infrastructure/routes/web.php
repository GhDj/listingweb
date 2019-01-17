<?php

Route::group(['module' => 'Infrastructures', 'middleware' => ['web'], 'namespace' => 'App\Modules\Infrastructures\Controllers'], function() {

    Route::resource('Infrastructures', 'InfrastructuresController');

    Route::get('/search','WebController@showSearchPage')->name('showSearchPage');

    Route::get('/search/terrain/{id}','WebController@showTerrainDetails')->name('showTerrainDetails');

    Route::get('/search/club/{id}','WebController@showClubDetails')->name('showClubDetails');

    Route::post('/search','WebController@handleSearchMaps')->name('handleSearchMaps');

    Route::post('/searchClub','WebController@handleSearchClubs')->name('handleSearchClubs');
});
