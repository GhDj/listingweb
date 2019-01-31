<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('admin/dashboard','WebController@showAdminDashboard')->name('showAdminDashboard');
    Route::get('user/activation/{email}/{activationCode}', 'WebController@handleUserActivation');

    Route::post('user/register', 'WebController@handleUserRegister')->name('handleUserRegister');
    Route::post('user/login', 'WebController@handleUserLogin')->name('handleUserLogin');
    Route::get('user/logout','webController@handleLogout')->name('handleLogout');
    Route::get('user/dashboard','WebController@showUserDashboard')->name('showUserDashboard');
    Route::get('user/profile','WebController@showUserProfile')->name('showUserProfile');
    Route::get('user/message','WebController@showUserMessage')->name('showUserMessage');
    Route::get('user/password','WebController@showUserPassword')->name('showUserPassword');
    Route::get('user/listingTerrain','WebController@showUserListingTerrain')->name('showUserListingTerrain');
    Route::get('user/listingClub','WebController@showUserListingClub')->name('showUserListingClub');
    Route::get('user/addTerrain','WebController@showUserAddTerrain')->name('showUserAddTerrain');
    Route::post('/user/profile/update', 'WebController@handleUpdateUserProfile')->name('handleUpdateUserProfile');
    Route::post('/user/profile/updatePicture', 'WebController@handleUpdateUserProfilePicture')->name('handleUpdateUserProfilePicture');
    Route::post('/user/profile/updatePassword', 'WebController@handleUpdateUserPassword')->name('handleUpdateUserPassword');
});
