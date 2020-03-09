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

Route::get('/items','itemsController@index');
Route::get('/item/{id}','itemsController@show');
Route::get('/','collectionsController@index');
Route::get('/collection/{id}','collectionsController@show');
Route::post('/updatebitskins','itemsController@updateSkinDatabase');
Route::get('/profile','usersController@logged');
Route::get('/profile','usersController@show');
Route::get('/refresh','usersController@refreshInventory');
Route::get('/updateitems','itemsController@getJson');
Route::get('/refreshdb','DBController@getupdatepage');
Route::get('/bitskinsupdate','itemsController@getBitskins');
Route::get('auth/steam', 'AuthController@redirectToSteam')->name('auth.steam');
Route::get('auth/steam/handle', 'AuthController@handle')->name('auth.steam.handle');
