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

Route::get('/', 'TopicController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/yanzheng/', 'HomeController@getcaptcha');
Route::post('/get_token','HomeController@get_token');
//topic
Route::get('topic/create','TopicController@create');
Route::post('topic/create','TopicController@store');
Route::get('topic/{topic}','TopicController@show');
//reply
Route::post('reply/create','ReplyController@store');
Route::get('reply/{reply}','ReplyController@show');