<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\Complex\Controllers'], function () {

    Route::get('/sportsCategories/', 'WebController@handleAjaxGetSportsCategories')->name('ajaxSportsCategories');

    Route::get('/getSports/', 'WebController@handleAjaxGetSports')->name('ajaxSports');

});

