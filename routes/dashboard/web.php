<?php

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth','role:super_admin|admin'])->group(function ()
{

    //welcome route
    Route::get('/','WelcomeController@index')->name('welcome');



    //category controller
    Route::resource('categories', 'CategoryController')->except('show');
    Route::get('categories-data','CategoryController@data')->name('categories.data');


    //Role Controller
    Route::resource('roles', 'RoleController');
    Route::get('roles-data','RoleController@data')->name('roles.data');


    //User Controller
    Route::resource('users', 'UserController');
    Route::get('users-data','UserController@data')->name('users.data');


});
