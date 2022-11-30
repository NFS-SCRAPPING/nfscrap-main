<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['web'])->group(function () {

    Route::group(['middleware' => ['auth']], function () {

        Route::get('dashboard','Admin\DashboardController@index')->name('dashboard');

        Route::post('logout','AuthController@logout');

        Route::group(['prefix' => 'admin','middleware' => ['admin']], function () {

            Route::get('role','Cms\RoleController@index')->name('role');
            Route::get('role/create','Cms\RoleController@create')->name('role-create');
            Route::get('role/show/{id}','Cms\RoleController@show')->name('role-show');
            Route::get('role/edit/{id}','Cms\RoleController@edit')->name('role-edit');
            Route::get('role/destroy/{id}','Cms\RoleController@destroy')->name('role-destroy');
            Route::post('role/store','Cms\RoleController@store')->name('role-store');
            Route::post('role/update','Cms\RoleController@update')->name('role-update');
            Route::post('role/action/{slug}/{id}','Cms\RoleController@action');
            Route::post('role/submodule/{table}/{foreign_key}','Cms\RoleController@submodule');


            Route::get('users','Cms\UsersController@index')->name('users');
            Route::get('users/create','Cms\UsersController@create')->name('users-create');
            Route::get('users/show/{id}','Cms\UsersController@show')->name('users-show');
            Route::get('users/edit/{id}','Cms\UsersController@edit')->name('users-edit');
            Route::get('users/destroy/{id}','Cms\UsersController@destroy')->name('users-destroy');
            Route::post('users/store','Cms\UsersController@store')->name('users-store');
            Route::post('users/update','Cms\UsersController@update')->name('users-update');
            Route::post('users/action/{slug}/{id}','Cms\UsersController@action');
            Route::post('users/submodule/{table}/{foreign_key}','Cms\UsersController@submodule');

            Route::get('logs','Cms\CmsLogsController@index')->name('logs');

            Route::get('settings','Cms\CmsSettingsController@index')->name('settings');
            Route::get('settings/create','Cms\CmsSettingsController@create')->name('settings-create');
            Route::get('settings/show/{id}','Cms\CmsSettingsController@show')->name('settings-show');
            Route::get('settings/edit/{id}','Cms\CmsSettingsController@edit')->name('settings-edit');
            Route::get('settings/destroy/{id}','Cms\CmsSettingsController@destroy')->name('settings-destroy');
            Route::post('settings/store','Cms\CmsSettingsController@store')->name('settings-store');
            Route::post('settings/update','Cms\CmsSettingsController@update')->name('settings-update');
            Route::post('settings/action/{slug}/{id}','Cms\CmsSettingsController@action');
            Route::post('settings/submodule/{table}/{foreign_key}','Cms\CmsSettingsController@submodule');


            Route::get('modules','Cms\CmsModulesController@index')->name('modules');
            Route::get('modules/create','Cms\CmsModulesController@create')->name('modules-create');
            Route::get('modules/show/{id}','Cms\CmsModulesController@show')->name('modules-show');
            Route::get('modules/edit/{id}','Cms\CmsModulesController@edit')->name('modules-edit');
            Route::get('modules/destroy/{id}','Cms\CmsModulesController@destroy')->name('modules-destroy');
            Route::post('modules/store','Cms\CmsModulesController@store')->name('modules-store');
            Route::post('modules/update','Cms\CmsModulesController@update')->name('modules-update');
            Route::post('modules/action/{slug}/{id}','Cms\CmsModulesController@action');
            Route::post('modules/submodule/{table}/{foreign_key}','Cms\CmsModulesController@submodule');


            Route::group(['middleware' => ['superadmin']], function () {

            });

        });

    });

    

    Route::group(['middleware' => ['guest']], function () {
        Route::get('login','Admin\GuestController@login')->name('login');
        Route::get('register','Admin\GuestController@register')->name('register');
        Route::get('forget','Admin\GuestController@forget')->name('forget');
        Route::get('/','Admin\GuestController@welcome')->name('welcome');

        Route::get('test','TetsController@index');
    });

    Route::group(['middleware' => ['guest','throttle:6,1']], function () {

        Route::post('sign-in','AuthController@login');
        Route::post('sign-up','AuthController@register');
        Route::post('forget-password','AuthController@forget_password');

    });


});