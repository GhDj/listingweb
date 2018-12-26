<?php

Route::group(['module' => 'Infrastructures', 'middleware' => ['web'], 'namespace' => 'App\Modules\Infrastructures\Controllers'], function() {

    Route::resource('Infrastructures', 'InfrastructuresController');

    Route::get('/search','WebController@showSearch')->name('showSearch');

    Route::get('/stade','WebController@showStadeSearch')->name('showStadeSearch');

});
