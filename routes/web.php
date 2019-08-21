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

Route::group(['middleware'=>['web']],function () {
    Auth::routes();
    Route::get('login', ['uses' => 'Auth\VoyagerAuthController@login','as' => 'login']);
    Route::post('login', ['uses' => 'Auth\VoyagerAuthController@postLogin','as' => 'postLogin']);
    Route::post('logout', ['uses' => 'Auth\VoyagerAuthController@logout','as' => 'logout']);
    Route::get('admin/login', ['uses' => 'Auth\VoyagerAuthController@login', 'as' => 'voyager.login']);
    Route::post('admin/login', ['uses' => 'Auth\VoyagerAuthController@postLogin', 'as' => 'voyager.postlogin']);
    Route::post('admin/logout', ['uses' => 'Auth\VoyagerAuthController@logout', 'as' => 'voyager.logout']);
});

