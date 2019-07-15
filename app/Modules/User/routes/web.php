<?php
Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function () {

    Route::get('admin/login', 'WebController@showAdminLogin')->name('showAdminLogin');
    Route::post('admin/login', 'WebController@handleAdminLogin')->name('handleAdminLogin');


    Route::get('user/activation/{email}/{activationCode}', 'WebController@handleUserActivation');

    Route::get('/user/social/{provider}', 'WebController@handleSocialRedirect')->name('handleSocialRedirect');
    Route::get('/user/social/{provider}/callback', 'WebController@handleSocialCallback')->name('handleSocialCallback');

    Route::post('/user/register', 'WebController@handleUserRegister')->name('handleUserRegister');
    Route::post('/user/login', 'WebController@handleUserLogin')->name('handleUserLogin');
    Route::get('/user/logout', 'WebController@handleLogout')->name('handleLogout');
    Route::get('/user/login', 'WebController@showUserLogin')->name('login');
    Route::get('/test', 'WebController@showTest')->name('test');

});

Route::group(['module' => 'User', 'middleware' => ['userAccess'], 'namespace' => 'App\Modules\User\Controllers'], function () {


    Route::get('/user/complete', 'WebController@showUserCompleteProfile')->name('showUserCompleteProfile');
    Route::post('/user/complete', 'WebController@handleUserCompleteProfile')->name('handleUserCompleteProfile');
    Route::get('/user/favoriteList', 'WebController@showFavoriteList')->name('showFavoriteList');
    Route::get('/user/dashboard', 'WebController@showUserDashboard')->name('showUserDashboard');
    Route::get('/user/profile', 'WebController@showUserProfile')->name('showUserProfile');

    Route::get('/user/password', 'WebController@showUserPassword')->name('showUserPassword');
    Route::get('/user/listing/terrain', 'WebController@showUserListingTerrain')->name('showUserListingTerrain');
    Route::get('/user/listing/club', 'WebController@showUserListingClub')->name('showUserListingClub');
    Route::get('/user/add/terrain', 'WebController@showUserAddTerrain')->name('showUserAddTerrain');

    Route::get('/user/add/complex', 'WebController@showUserAddComplex')->name('showUserAddComplex');

    Route::get('/user/edit/complex', 'WebController@showEditComplex')->name('showEditComplex');

    Route::post('/user/edit/complex', 'WebController@handleEditComplex')->name('handleEditComplex');


    Route::get('/user/add/equipement', 'WebController@showUserAddEquipement')->name('showUserAddEquipement');
    Route::get('/user/add/club', 'WebController@showUserAddClub')->name('showUserAddClub');
    Route::get('/user/add/team', 'WebController@showUserAddTeam')->name('showUserAddTeam');
    Route::post('/user/profile/update', 'WebController@handleUpdateUserProfile')->name('handleUpdateUserProfile');
    Route::post('/user/profile/updatePicture', 'WebController@handleUpdateUserProfilePicture')->name('handleUpdateUserProfilePicture');
    Route::post('/user/profile/updatePassword', 'WebController@handleUpdateUserPassword')->name('handleUpdateUserPassword');

    Route::post('/user/add/complex', 'WebController@handleUserAddComplex')->name('handleUserAddComplex');

    Route::post('/user/add/terrain', 'WebController@hundleUserAddTerrain')->name('hundleUserAddTerrain');
    Route::post('/user/add/equipement', 'WebController@hundleUserAddEquipement')->name('hundleUserAddEquipement');
    Route::post('/user/add/club', 'WebController@hundleUserAddClub')->name('hundleUserAddClub');
    Route::post('/user/add/team', 'WebController@hundleUserAddTeam')->name('hundleUserAddTeam');

    Route::get('/user/add/infrastructure','WebController@showUserAddInfrastructure')->name('showUserAddInfrastructure');

    Route::get('/user/edit/infrastructure','WebController@showUserEditInfrastructure')->name('showUserEditInfrastructure');

    Route::post('user/request/complex','WebController@handleUserRequestComplex')->name('handleUserRequestComplex');

    Route::get('user/edit/terrain/{id}','WebController@showUserEditTerrain')->name('showUserEditTerrain');
Route::post('user/update/terrain/{id}','WebController@handleUserUpdateTerrain')->name('handleUserUpdateTerrain');

Route::post('user/add/infrastructure','WebController@handleAddInfrastructure')->name('handleAddInfrastructure');
Route::post('user/edit/infrastructure','WebController@handleEditInfrastructure')->name('handleEditInfrastructure');


});


Route::group(['module' => 'User', 'middleware' => ['adminAccess'], 'namespace' => 'App\Modules\User\Controllers'], function () {

    Route::get('/admin/dashboard', 'WebController@showAdminDashboard')->name('showAdminDashboard');

    ///Users
    Route::get('/admin/users', 'WebController@showUsersList')->name('showUsersList');
    Route::post('/admin/user/add', 'WebController@handleAddUser')->name('handleAddUser');

    Route::get('/admin/user/delete/{id}', 'WebController@handleDeleteUser')->name('handleDeleteUser');

    Route::post('/admin/user/update/{id}', 'WebController@handleUpdateUser')->name('handleUpdateUser');

    Route::get('/admin/user/getById/{id}', 'WebController@handleGetUserById')->name('handleGetUserById');

    //Complex

    Route::get('/admin/add/Complex', 'WebController@showAddComplexAdmin')->name('showAddComplexAdmin');
    Route::post('/admin/add/Complex', 'WebController@handleAddComplex')->name('handleAddComplex');


    //Terrains

    Route::get('/admin/terrain', 'WebController@showTerrainsList')->name('showTerrainsList');
    Route::get('/admin/complexs', 'WebController@showComplexsList')->name('showComplexsList');
    Route::get('/admin/terrain/add', 'WebController@showAddTerrain')->name('showAddTerrain');
    Route::post('/admin/terrain/add', 'WebController@handleAddTerrain')->name('handleAddTerrain');

    Route::get('/admin/terrain/edit/{id}', 'WebController@showEditTerrain')->name('showEditTerrain');

    //Clubs

    Route::get('/admin/club', 'WebController@showAdminClubsList')->name('showClubsList');
    Route::get('/admin/club/add', 'WebController@showAddClub')->name('showAddClub');
    Route::post('/admin/club/add', 'WebController@handleAddClub')->name('handleAddClub');

    Route::get('/admin/club/edit/{id}', 'WebController@showEditTerrain')->name('showEditTerrain');


    Route::get('/admin/complex_request','WebController@showComplexRequest')->name('showComplexRequest');

    Route::get('/admin/complex_request/accept/{id}','WebController@acceptComplexRequest')->name('acceptComplexRequest');
    Route::get('/admin/complex_request/cancel/{id}','WebController@cancelComplexRequest')->name('cancelComplexRequest');

    /***** Club Request ********/
    Route::get('/admin/club_request/accept/{id}','WebController@handleAcceptClubRequest')->name('acceptClubRequest');
    Route::get('/admin/club_request/cancel/{id}','WebController@handleCancelComplexRequest')->name('cancelClubRequest');
});
