<?php

Route::group(['module' => 'General', 'middleware' => ['web'], 'namespace' => 'App\Modules\General\Controllers'], function() {

    Route::resource('General', 'GeneralController');


    Route::get('/', 'WebController@showHome')->name('showHome');
    Route::get('/contact', 'WebController@showContact')->name('showContact');
    Route::get('/faq', 'WebController@showFaq')->name('showFaq');
    Route::get('/404', 'WebController@handlePageNotFound')->name('handlePageNotFound');
    Route::get('/index/sports/{sportId}', 'WebController@getTerrainsBySport');

    Route::get('/fill','WebController@ExcelToJson')->name('kl');
});

Route::group(['module' => 'General', 'middleware' => ['web'], 'namespace' => 'App\Modules\General\Controllers'], function() {

    Route::resource('General', 'GeneralController');

    Route::get('/search','WebController@public/search')->name('showSearchPage');

    Route::get('/search/terrain/{id}','WebController@showTerrainDetails')->name('showTerrainDetails');

    Route::get('/search/club/{id}','WebController@showClubDetails')->name('showClubDetails');

    Route::post('/search','WebController@handleSearchMaps')->name('handleSearchMaps');

    Route::post('/searchClub','WebController@handleSearchClubs')->name('handleSearchClubs');

    Route::post('/searchFilterTerrain','WebController@handleFilterMaps')->name('handleFilterMaps');

    Route::post('/searchFilterClub','WebController@handleFilterClubs')->name('handleFilterClubs');

    Route::get('category/{complex}','WebController@hundleGetCategory')->name('hundleGetCategory');
});

