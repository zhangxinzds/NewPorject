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
	//前台首页
	Route::get('/','Home\IndexController@index');
	//注册
	Route::get('/home/register','Home\RegisterController@register')->name('register');
	Route::post('/home/doregister','Home\RegisterController@doregister')->name('doregister');
	Route::get('/home/remind','Home\RegisterController@remind')->name('remind');
	Route::get('/home/wait','Home\RegisterController@wait');
	//前台登录
	Route::get('/home/login','Home\LoginController@login')->name('login');
	Route::get('/home/captcha','Home\LoginController@captcha')->name('hcaptcha');
	Route::post('/home/dologin','Home\LoginController@dologin');
	Route::get('/home/logout','Home\LoginController@logout')->name('logout');

	//后台登录
	Route::get('/admin/login','Admin\LoginController@login');
	Route::post('/admin/dologin','Admin\LoginController@dologin');
	Route::get('/admin/logout','Admin\LoginController@logout');
	//验证码
	Route::get('/admin/captcha','Admin\LoginController@captcha')->name('captcha');

	Route::group(['middleware'=>['adminlogin']],function(){
		//后台首页
		Route::get('/admin','Admin\IndexController@index')->name('admin');
		Route::post('/admin/header','Admin\IndexController@header')->name('header');
		Route::get('/admin/mpassword','Admin\IndexController@mpassword');
		Route::post('/admin/dompassword','Admin\IndexController@dompassword');
		//管理员
		Route::resource('/admin/manager','Admin\ManagerController');
		Route::get('/admin/magajax','Admin\ManagerController@ajax');

		//用户
		Route::resource('/admin/user','Admin\UserController');
		Route::get('/admin/user/status/{sta}/{id}','Admin\UserController@status');

		//分类
		Route::resource('/admin/type','Admin\TypeController');
		Route::get('/admin/type/display/{dis}/{id}','Admin\TypeController@display');
		Route::post('/admin/type/nameajax','Admin\TypeController@nameajax');
		Route::get('/admin/addchild/{id}/{path}','Admin\TypeController@addChild');
		Route::post('/admin/savechild','Admin\TypeController@saveChild');
		Route::get('/admin/typechild/{id}','Admin\TypeController@typeChild');

		//商品
		Route::resource('/admin/goods','Admin\GoodsController');
		Route::get('/admin/goods/status/{sta}/{id}','Admin\GoodsController@status');
		Route::get('/admin/ajax','Admin\GoodsController@ajax');

		//轮播图
		Route::resource('/admin/carousel','Admin\CarouselController');
		Route::get('/admin/carajax','Admin\CarouselController@ajax');

		//订单
		Route::resource('/admin/orders','Admin\OrdersController');

		//友情链接
		Route::resource('/admin/link','Admin\AdvController');
	});


