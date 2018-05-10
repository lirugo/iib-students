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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route for two factor auth
Route::get('/auth/token', 'Auth\AuthTokenController@getToken');
Route::post('/auth/token', 'Auth\AuthTokenController@postToken');
//Resend token
Route::get('/auth/token/resend', 'Auth\AuthTokenController@getResend');

//User route
Route::prefix('user')->middleware('auth')->group(function (){
    //Profile route
    Route::get('profile', 'User\ProfileController@index');
    Route::post('profile', 'User\ProfileController@update')->name('user.profile.update');
});

//Manage route
Route::prefix('manage')->middleware('role:manager')->group(function (){
    Route::get('/', 'Manage\ManageController@index');
});