<?php

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


Route::group(['middleware' => 'javck.checkForMaintenanceMode'], function () {
	Route::get('/', 'SiteController@renderDemoPage');
	Route::get('/shop','SiteController@renderShopPage');
    Route::get('/contact', 'SiteController@renderContactUsPage');
});

Auth::routes();

