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
    Route::get('/katalog/{categoryLink}', 'CategoryController@index')->where('category', '[A-Za-z]+');
    Route::get('/tovari/{productLink}', 'ProductController@show')->name('product.show');
    Route::get('/cities', 'CityController@index')->name('cities');
    Route::get('/cities/{cityId}', 'CityController@show')->name('showCity');
    Route::get('/cities/set/{cityId}', 'CityController@setup')->name('setCity');

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

        Route::get('/account', 'AccountController@index')->name('account');
        Route::post('/account', 'AccountController@edit')->name('account.edit');

        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        Route::get('/basket', 'BasketController@index')->name('basket');
        Route::post('/basket/add/{productId}', 'BasketController@add')->name('basket.add');

        Route::get('/order', 'OrderController@add')->name('order.add');
    });
});
