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

        });

    });

    

    Route::group(['middleware' => ['guest']], function () {
        Route::get('login','Admin\GuestController@login')->name('login');
        Route::get('register','Admin\GuestController@register')->name('register');
        Route::get('/','Admin\GuestController@welcome')->name('welcome');
    });

    Route::group(['middleware' => ['guest','throttle:6,1']], function () {

        Route::post('sign-in','AuthController@login');

    });


});