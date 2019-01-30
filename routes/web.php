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


Route::get('admin','Admin\IndexController@index')->name('admin');
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