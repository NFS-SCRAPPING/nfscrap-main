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
            Route::get('role/show/{id}','Cms\RoleController@show')->name('role-detail');
            Route::get('role/edit/{id}','Cms\RoleController@edit')->name('role-edit');
            Route::get('role/destroy/{id}','Cms\RoleController@destroy')->name('role-destroy');
            Route::post('role/store','Cms\RoleController@store')->name('role-store');
            Route::post('role/update','Cms\RoleController@update')->name('role-update');
            Route::post('role/action/{slug}/{id}','Cms\RoleController@action');
            Route::post('role/submodule/{table}/{foreign_key}','Cms\RoleController@submodule');


            Route::get('users','Cms\UsersController@index')->name('users');
            Route::get('users/create','Cms\UsersController@create')->name('users-create');
            Route::get('users/show/{id}','Cms\UsersController@show')->name('users-detail');
            Route::get('users/edit/{id}','Cms\UsersController@edit')->name('users-edit');
            Route::get('users/destroy/{id}','Cms\UsersController@destroy')->name('users-destroy');
            Route::post('users/store','Cms\UsersController@store')->name('users-store');
            Route::post('users/update','Cms\UsersController@update')->name('users-update');
            Route::post('users/action/{slug}/{id}','Cms\UsersController@action');
            Route::post('users/submodule/{table}/{foreign_key}','Cms\UsersController@submodule');

            Route::group(['middleware' => ['superadmin']], function () {

            });

        });

    });

    

    Route::group(['middleware' => ['guest']], function () {
        Route::get('login','Admin\GuestController@login')->name('login');
        Route::get('register','Admin\GuestController@register')->name('register');
        Route::get('forget','Admin\GuestController@forget')->name('forget');
        Route::get('/','Admin\GuestController@welcome')->name('welcome');
    });

    Route::group(['middleware' => ['guest','throttle:6,1']], function () {

        Route::post('sign-in','AuthController@login');
        Route::post('sign-up','AuthController@register');
        Route::post('forget-password','AuthController@forget_password');

    });


});