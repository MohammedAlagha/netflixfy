<?php

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth','role:super_admin|admin'])->group(function ()
{

    //welcome route
    Route::get('/','WelcomeController@index')->name('welcome');



    //category routes
    Route::resource('categories', 'CategoryController')->except('show');
    Route::get('categories-data','CategoryController@data')->name('categories.data');


    //Role routes
    Route::resource('roles', 'RoleController');
    Route::get('roles-data','RoleController@data')->name('roles.data');


    //User routes
    Route::resource('users', 'UserController');
    Route::get('users-data','UserController@data')->name('users.data');


    //Movie routes
    Route::resource('movies', 'MovieController');
    Route::get('movies-data','MovieController@data')->name('movies.data');

    //Setting Routes
    Route::get('/settings/social_login','SettingController@social_login')->name('settings.social_login');
    Route::get('/settings/social_links','SettingController@social_links')->name('settings.social_links');
    Route::post('/settings','SettingController@store')->name('settings.store');

});
