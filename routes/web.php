<?php
Route::get('/', function () {
    if(auth()->check()){
        return redirect(route('dashboard.index'));
    }else{
        return view('auth.login');
    }
});

Auth::routes(['verify' => true]);

Route::group(['prefix'=>'dashboard', 'middleware' => 'auth'],function (){
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::resource('permission-groups', 'PermissionGroupsController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::get('leads/{status?}', 'LeadsController@index')->name('leads.index');
    Route::post('leads/search/all', 'LeadsController@search')->name('leads.search');
    Route::resource('leads', 'LeadsController')->except(['index']);

    Route::get('manuals', 'ManualsController@index')->name('manuals.index');
    Route::put('manuals/{id}', 'ManualsController@update')->name('manuals.update');
    Route::get('manuals/show', 'ManualsController@show')->name('manuals.show');

    // User update data
    Route::get('user/profile', 'UsersController@showUserProfile')->name('users.showUserProfile');

    // Update password
    Route::put('users/{user}/update_password', 'UsersController@updatePassword')->name('users.update_password');

    // User update data
    Route::post('leads/post/mass-edit', 'LeadsController@massEdit')->name('leads.massedit');

    // Import leads
    Route::post('leads/post/import', 'LeadsController@import')->name('leads.import');

    // Make Done leads
    Route::get('leads/make/done', 'LeadsController@makeDone')->name('leads.makedone');
});
