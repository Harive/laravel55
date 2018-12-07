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
	//后台主页面
	// Route::get('index',)
	//注册
	Route::any('registerindex','RegisterController@index');
    //登录 
	Route::any('loginindex','LoginController@login');
	//添加导航栏信息
	Route::any('infiniteinsert','InfiniteController@insert');
	//展示导航栏信息
	Route::any('infiniteindex','InfiniteController@index');
	//导航信息详情
	Route::any('infinitelist/{id}','InfiniteController@list');
	//修改导航信息
	Route::any('infiniteupdate/{id}','InfiniteController@update');
	//删除导航信息
	Route::any('infinitedelete/{id}','InfiniteController@delete');
	//批量删除
	Route::any('infinitedelete2/{id}','InfiniteController@delete2');
	//搜索
	Route::any('infinitesearch/{sear}','InfiniteController@search');
});