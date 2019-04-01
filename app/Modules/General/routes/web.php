<?php

Route::group(['module' => 'General', 'middleware' => ['web'], 'namespace' => 'App\Modules\General\Controllers'], function() {

    Route::resource('General', 'GeneralController');


    Route::get('/', 'WebController@showHome')->name('showHome');
    Route::get('/contact', 'WebController@showContact')->name('showContact');
    Route::get('/faq', 'WebController@showFaq')->name('showFaq');
    Route::get('/404', 'WebController@handlePageNotFound')->name('handlePageNotFound');
    Route::get('/index/sports/{sportId}', 'WebController@getTerrainsBySport');

});
