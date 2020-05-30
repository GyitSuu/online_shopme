<?php

use Illuminate\Support\Facades\Route;

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

//backend
	Route::group(['prefix'=>'admin','as'=>'admin.'], function(){

		Route::get('/dashboard','DashboardController@index')->name('dashboard');

		Route::resource('/category','CategoryController');
		Route::get('/get_category','CategoryController@get_category')->name('get_category');

		Route::resource('/township','TownshipController');
		Route::get('/get_township','TownshipController@get_township')->name('get_township');

		Route::resource('/size','SizesController');
		Route::get('/get_size','SizesController@get_size')->name('get_size');
		Route::post('/get_size_by_id/{id}','SizesController@getSizeByCategoryId')->name('get_size_by_id');

		Route::post('/get_color_by_id/{id}','SizesController@getcolorByCategoryId')->name('get_color_by_id');

		//Route::post('/sizeandcolor','SearchController@search')->name('sizeandcolor');

		Route::resource('/color','ColorController');
		Route::get('/get_color','ColorController@getColor')->name('get_color');

		Route::resource('/delivery_fee','DeliveryFeeController');
		Route::get('/get_delivery_fee','DeliveryFeeController@getDeliveryFee')->name('get_delivery_fee');

		

		Route::resource('/item','ItemController');
		Route::get('/get_item','ItemController@getItem')->name('get_item');

		Route::get('/get_order_detail/{id}','DashboardController@getOrderDetail')->name('get_order_detail');

		Route::put('/change_status/{id}','DashboardController@changeStatus')->name('change_status');

	});	

//frontend
Route::get('/','FrontendController@index')->name('homepage');
Route::get('product','FrontendController@product')->name('product');
Route::get('product_detail/{id}','FrontendController@productDetail')->name('product_detail');

Route::post('/get_item_by_category/{id}','FrontendController@getItemsByCategory')->name('get_item_by_category');

Route::post('/get_item_by_sorting/{sort_type}','FrontendController@getItemsBySorting')->name('get_item_by_sorting');

Route::get('/cart','CartController@cart')->name('cart');
Route::post('/feebytownship','CartController@fee')->name('feebytownship');
Route::post('/order','OrderController@store')->name('order');

Route::get('about','FrontendController@about')->name('about');
Route::get('contact','FrontendController@contact')->name('contact');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
