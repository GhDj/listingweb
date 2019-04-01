<?php

Route::group(['module' => 'Complex', 'middleware' => ['web'], 'namespace' => 'App\Modules\Complex\Controllers'], function() {

    Route::resource('Complex', 'ComplexController');

    Route::get('/search','WebController@showSearchPage')->name('showSearchPage');

    Route::get('/search/terrain/{id}','WebController@showTerrainDetails')->name('showTerrainDetails');

    Route::get('/search/club/{id}','WebController@showClubDetails')->name('showClubDetails');

    Route::post('/search','WebController@handleSearchMaps')->name('handleSearchMaps');

    Route::post('/searchClub','WebController@handleSearchClubs')->name('handleSearchClubs');

    Route::post('/searchFilterTerrain','WebController@handleFilterMaps')->name('handleFilterMaps');

    Route::post('/searchFilterClub','WebController@handleFilterClubs')->name('handleFilterClubs');

    Route::get('category/{complex}','WebController@hundleGetCategory')->name('hundleGetCategory');
});
