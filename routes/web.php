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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/schedule', 'ScheduleController@index')->middleware('auth');

Route::post('/schedule/add', 'ScheduleController@add')->middleware('auth');

Route::get('/schedule/show', 'ScheduleController@show')->middleware('auth');

Route::post('/schedule/edit', 'ScheduleController@edit')->middleware('auth');

Route::post('/schedule/update', 'ScheduleController@update')->middleware('auth');

Route::post('/schedule/delete/{id}', 'ScheduleController@destroy')->middleware('auth');
    
Route::resource("Group", "GroupController")->middleware('auth');

Auth::routes();


