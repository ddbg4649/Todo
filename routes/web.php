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
//一番最初に表示されるページ
Route::get('/', 'HomeController@index');

//
Route::get('/home', 'HomeController@index')->name('home');

//GoalのRESTfulなルーティングを実装
Route::resource("goals", "GoalController")->middleware('auth');;

//ネストされたRESTfulなルーティングを実装
Route::resource("goals.todos", "TodoController")->middleware('auth');;

//Todoを並び替える処理を行うルーティング
Route::post('/goals/{goal}/todos/{todo}/sort', 'TodoController@sort')->middleware('auth');;

Auth::routes();