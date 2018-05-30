<?php

/*
 *
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Language switch route
|--------------------------------------------------------------------------
*/
Route::post('/language', [
    'Middleware' => 'Language',
    'uses' => 'LanguageController@index'
]);


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
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function (){
    //Profile route
    Route::get('profile', 'User\ProfileController@index');
    Route::post('profile', 'User\ProfileController@update')->name('user.profile.update');
});

//Manage route
Route::group(['prefix' => 'manage', 'middleware' => ['role:manager']], function (){
    Route::get('/', 'Manage\ManageController@index');
    Route::resource('users', 'Manage\UserController');
});

//Chat
Route::get('/chat', 'Chat\ChatController@index');
Route::get('/messages', 'Chat\ChatController@getMessages');
Route::get('/users', 'Chat\ChatController@getUsers');
Route::post('/messages', 'Chat\ChatController@create')->name('messages');
//Chat