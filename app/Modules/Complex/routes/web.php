<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\Complex\Controllers'], function () {

    Route::get('/sportsCategories/', 'WebController@handleAjaxGetSportsCategories')->name('ajaxSportsCategories');

});

