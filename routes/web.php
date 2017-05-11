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

Route::resource('profile', 'ProfileController');

Auth::routes();

Route::get('/', 'HomeController@index');

//Route::get('messages/send','MessageController@send');

Route::get('/send/{id}',['uses'=>'MessageController@send','as'=>'messages.send']);
Route::post('/sendto',['uses'=>'MessageController@sendto','as'=>'messages.sendto']);

Route::resource('messages','MessageController');

