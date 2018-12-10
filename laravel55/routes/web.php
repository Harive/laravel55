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
    //登录 
	Route::any('loginindex','LoginController@login');
	//退出登录
	Route::any('logout','LoginController@logout');

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

	//添加直播信息
	Route::any('liveinsert','LiveController@insert');
	//展示直播信息
	Route::any('liveindex','LiveController@index');
	//导航信息详情
	Route::any('livelist/{id}','LiveController@list');
	//修改导航信息
	Route::any('liveupdate/{id}','LiveController@update');
	//删除导航信息
	Route::any('livedelete/{id}','LiveController@delete');
	//批量删除
	Route::any('livedelete2/{id}','LiveController@delete2');
	//搜索
	Route::any('livesearch/{sear}','LiveController@search');

	//轮播图展示页面
	Route::any('carouselindex','CarouselController@index');
	//添加轮播图信息
	Route::any('carouselinsert','CarouselController@insert');
	//轮播图详细信息
	Route::any('carousellist/{id}','CarouselController@list');
	//删除轮播图信息
	Route::any('carouseldelete/{id}','CarouselController@delete');
	//批量删除
	Route::any('carouseldelete2/{id}','CarouselController@delete2');
	//修改轮播图信息
	Route::any('carouselupdate/{id}','CarouselController@update');
	//搜索
	Route::any('carouselsearch/{sear}','CarouselController@search');

	//联系我们添加二维码信息
	Route::any('qrinsert','QrController@insert');
	//展示信息
	Route::any('qrindex','QrController@index');
	//详细信息
	Route::any('qrlist/{id}','QrController@list');
	//修改信息
	Route::any('qrupdate/{id}','QrController@update');
	//删除信息
	Route::any('qrdelete/{id}','QrController@delete');
	//批量删除
	Route::any('qrdelete2/{id}','QrController@delete2');
	//搜索
	Route::any('qrsearch/{sear}','QrController@search');
});

//用户管理
Route::group(['prefix'=>'user'] , function(){
    //显示
    Route::get('index','User\UserController@index');
    //跳转添加
    Route::get('insertadd','User\UserController@insertadd');
    //执行添加
    Route::post('inserts', 'User\UserController@inserts');
    //执行删除
    Route::any('deletes/{id?}', 'User\UserController@deletes');
    //跳转修改
    Route::get('update/{id?}', 'User\UserController@updateadd');
    //执行修改
    Route::post('updateas', 'User\UserController@updateas');

});

//权限
Route::any('auth1/index','Auth1\Auth1Controller@index');
Route::any('auth1/insert','Auth1\Auth1Controller@insert');
Route::any('deleteauth/{id}','Auth1\Auth1Controller@deleteauth');
Route::any('auth1/edit/{id}','Auth1\Auth1Controller@edit');
Route::any('checkdel','Auth1\Auth1Controller@checkdel');