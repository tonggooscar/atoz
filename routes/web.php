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


Route::group(['middleware' => ['web']], function() {

	Route::get('/', 'TransactionController@index');
	Route::get('/prepaid_balance', 'TransactionController@prepaid_balance');
	Route::get('/product', 'TransactionController@product');
	Route::get('transaction/order/{id?}', 'TransactionController@success_order');
	Route::get('/order', 'TransactionController@order');
	Route::patch('/pay/{id}', 'TransactionController@pay');

	Route::resource('transaction', 'TransactionController');

	Auth::routes();

	Route::get('/home', 'TransactionController@index');
	Route::get('logout', 'Auth\LoginController@logout', function () {
		return abort(404);
	});
	
});
