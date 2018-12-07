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

//直播项目
Route::group(['prefix'=>'one'],function(){
	//注册
	Route::any('registerindex','RegisterController@index');
	//导航栏信息
	Route::any('infiniteinsert','InfiniteController@insert');
});