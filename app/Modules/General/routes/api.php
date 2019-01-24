<?php

Route::group(['module' => 'General', 'middleware' => ['api'], 'namespace' => 'App\Modules\General\Controllers'], function() {

    Route::resource('General', 'GeneralController');
    Route::post('/api/media/upload', 'ApiController@handleUploadImage');
  


});
