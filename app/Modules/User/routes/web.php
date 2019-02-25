<?php
Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('admin/dashboard','WebController@showAdminDashboard')->name('showAdminDashboard');
    Route::get('user/activation/{email}/{activationCode}', 'WebController@handleUserActivation');

    Route::get('/user/social/{provider}', 'WebController@handleSocialRedirect')->name('handleSocialRedirect');
    Route::get('/user/social/{provider}/callback', 'WebController@handleSocialCallback')->name('handleSocialCallback');

    Route::post('/user/register', 'WebController@handleUserRegister')->name('handleUserRegister');
    Route::post('/user/login', 'WebController@handleUserLogin')->name('handleUserLogin');
    Route::get('/user/logout','WebController@handleLogout')->name('handleLogout');
    Route::get('/user/login','WebController@showUserLogin')->name('login');
  

});
Route::group(['module' => 'User', 'middleware' => ['auth'], 'namespace' => 'App\Modules\User\Controllers'], function() {



    Route::get('/user/complete', 'WebController@showUserCompleteProfile')->name('showUserCompleteProfile');
    Route::post('/user/complete', 'WebController@handleUserCompleteProfile')->name('handleUserCompleteProfile');

    Route::get('/user/dashboard','WebController@showUserDashboard')->name('showUserDashboard');
    Route::get('/user/profile','WebController@showUserProfile')->name('showUserProfile');
    Route::get('/user/message','WebController@showUserMessage')->name('showUserMessage');
    Route::get('/user/password','WebController@showUserPassword')->name('showUserPassword');
    Route::get('/user/listing/terrain','WebController@showUserListingTerrain')->name('showUserListingTerrain');
    Route::get('/user/listing/club','WebController@showUserListingClub')->name('showUserListingClub');
    Route::get('/user/add/terrain','WebController@showUserAddTerrain')->name('showUserAddTerrain');
    Route::get('/user/add/complex','WebController@showUserAddComplex')->name('showUserAddComplex');
    Route::get('/user/add/equipement','WebController@showUserAddEquipement')->name('showUserAddEquipement');
    Route::get('/user/add/club','WebController@showUserAddClub')->name('showUserAddClub');
    Route::get('/user/add/team','WebController@showUserAddTeam')->name('showUserAddTeam');
    Route::post('/user/profile/update', 'WebController@handleUpdateUserProfile')->name('handleUpdateUserProfile');
    Route::post('/user/profile/updatePicture', 'WebController@handleUpdateUserProfilePicture')->name('handleUpdateUserProfilePicture');
    Route::post('/user/profile/updatePassword', 'WebController@handleUpdateUserPassword')->name('handleUpdateUserPassword');
    Route::post('/user/add/complex','WebController@hundleUserAddComplex')->name('hundleUserAddComplex');
    Route::post('/user/add/terrain','WebController@hundleUserAddTerrain')->name('hundleUserAddTerrain');
    Route::post('/user/add/equipement','WebController@hundleUserAddEquipement')->name('hundleUserAddEquipement');
    Route::post('/user/add/club','WebController@hundleUserAddClub')->name('hundleUserAddClub');
    Route::post('/user/add/team','WebController@hundleUserAddTeam')->name('hundleUserAddTeam');




});
