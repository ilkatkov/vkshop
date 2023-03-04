<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function() {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/tovari/{firstLevel}', 'CategoryController@index')->where('firstLevel', '[A-Za-z]+');
    Route::get('/tovari/{firstLevel}/{secondLevel}', 'CategoryController@index')->where(['firstLevel'=>'[A-Za-z]+', 'secondLevel'=>'[A-Za-z]+']);
    Route::get('/tovari/{firstLevel}/{secondLevel}/{thirdLevel}', 'CategoryController@index')->where(['firstLevel'=>'[A-Za-z]+', 'secondLevel'=>'[A-Za-z]+', 'thirdLevel'=>'[A-Za-z]+']);

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
