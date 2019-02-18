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
	Route::get('/search','Home\IndexController@search');
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
	//前台列表页
	Route::get('/home/list/{id}','Home\ListController@index');
	//前台详情页
	Route::get('/home/details/{id}','Home\DetailsController@index');
	Route::get('/home/detail/colorimgajax','Home\DetailsController@colorimgajax');
	Route::get('/home/detail/sizeajax','Home\DetailsController@sizeajax');
	//前台购物车
	Route::post('/home/cart/addcart','Home\CartController@addcart');
	
	Route::group(['middleware'=>['homelogin']],function(){
		//购物车订单支付流程
		Route::get('/home/cart','Home\CartController@index')->name('cart');
		Route::get('/home/cart/delete','Home\CartController@delete');
		Route::get('/home/checkout','Home\CheckoutController@index');
		Route::get('/home/checkout1/{id}','Home\CheckoutController@checkout1');
		Route::get('/home/checkout2/{id}','Home\CheckoutController@checkout2');
		Route::get('/home/checkout3/{id}','Home\CheckoutController@checkout3');
		Route::get('/home/checkout4/{id}','Home\CheckoutController@checkout4');
		Route::get('/home/checkout5/{id}','Home\CheckoutController@checkout5');
		//订单管理
		Route::get('/home/orders','Home\OrderController@index');
		Route::get('/home/order/{id}','Home\OrderController@order');
		Route::post('/home/comment','Home\OrderController@comment');
		Route::get('/home/status','Home\OrderController@status');
		Route::get('/home/cancel','Home\OrderController@cancel');
		//信息管理
		Route::get('/home/pass','Home\ProController@pass');
		Route::get('/home/header','Home\ProController@header');
		Route::post('/home/hedit','Home\ProController@hedit');
		Route::post('/home/pedit','Home\ProController@pedit');
		Route::get('/home/address','Home\ProController@address');
		Route::post('/home/addressedit','Home\ProController@addressedit');
	});

	//后台登录
	Route::get('/admin/login','Admin\LoginController@login');
	Route::post('/admin/dologin','Admin\LoginController@dologin');
	Route::get('/admin/logout','Admin\LoginController@logout');
	//验证码
	Route::get('/admin/captcha','Admin\LoginController@captcha')->name('captcha');

	Route::group(['middleware'=>['adminlogin','roleper']],function(){
		//后台首页
		Route::get('/admin','Admin\IndexController@index')->name('admin');
		Route::post('/admin/header','Admin\IndexController@header')->name('header');
		Route::get('/admin/mpassword','Admin\IndexController@mpassword');
		Route::post('/admin/dompassword','Admin\IndexController@dompassword');
		//管理员
		Route::resource('/admin/manager','Admin\ManagerController');
		Route::get('/admin/magajax','Admin\ManagerController@ajax');
		//角色查看
		Route::get('/admin/managerrole/{id}','Admin\PerController@managerrole');
		//角色添加
		Route::post('/admin/managerroleadd/{id}','Admin\PerController@managerroleadd');

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
		Route::get('/admin/spe/{id}','Admin\GoodsController@spe')->name('spe');
		Route::post('/admin/color','Admin\GoodsController@color');
		Route::get('/admin/color/ajax','Admin\GoodsController@colorajax');
		Route::get('/admin/color/delete/{id}','Admin\GoodsController@colordelete');
		Route::get('/admin/size/updateajax','Admin\GoodsController@sizeupdateajax');
		Route::get('/admin/size/addajax','Admin\GoodsController@sizeaddajax');
		Route::get('/admin/size/deleteajax','Admin\GoodsController@sizedeleteajax');

		//轮播图
		Route::resource('/admin/carousel','Admin\CarouselController');
		Route::get('/admin/carajax','Admin\CarouselController@ajax');

		//订单
		Route::get('/admin/orders','Admin\OrdersController@index');
		Route::get('/admin/orders/status','Admin\OrdersController@status');
		Route::get('/admin/orderinfo/{id}','Admin\OrdersController@orderinfo');

		//角色
		Route::resource('/admin/role','Admin\RoleController');
		Route::post('/admin/roleajax','Admin\RoleController@ajax');
		Route::get('/admin/peradd/{id}','Admin\RoleController@peradd');
		Route::get('/admin/persave/{id}','Admin\RoleController@persave');
		//权限
		Route::get('/admin/permission','Admin\PerController@index');
		Route::post('/admin/permissionadd','Admin\PerController@add');
		Route::post('/admin/permissionedit','Admin\PerController@edit');
		Route::get('/admin/permissiondelete/{id}','Admin\PerController@delete');
	});


