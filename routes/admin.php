<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// note that  the prefix for all routes is  admin in RouteServiceProvidder



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    //      'prefix' => 'en',
    ], function(){


      Route::group(['namespace' => 'Dashboard' , 'middleware' =>'auth:admin', 'prefix' =>'admin'], function () {

        Route::get('/','DashboardController@index')->name('admin.dashboard');// thr first page admin will visists if authenticated
        Route::get('logout', 'LoginController@logout')->name('admin.logout');


        Route::group(['prefix' => 'settings'], function () {

            Route::get('shipping-methods/{type}', 'SettingsController@editShippingsMethods')->name('edit.shippings.methods');

            Route::put('shipping-methods/{id}', 'SettingsController@updateShippingsMethods')->name('update.shippings.methods');
        });

        });












      Route::group(['namespace' => 'Dashboard','middleware' =>'guest:admin', 'prefix' =>'admin'], function () {

            Route::get('login', 'LoginController@login')->name('admin.login');
            Route::post('login', 'LoginController@postlogin')->name('admin.post.login');

     });
});
