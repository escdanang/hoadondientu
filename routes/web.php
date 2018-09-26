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
Route::get('admin',function(){
	return view('admin.admin');
});
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'products'],function(){
		Route::get('list','ProductsController@index');
		Route::get('add','ProductsController@add');
		Route::post('save','ProductsController@save');
		Route::get('search','ProductsController@search');
		Route::get('edit/{id}','ProductsController@edit');
        Route::post('update/{id}','ProductsController@update');
        Route::get('delete', 'ProductsController@destroy') -> name('products.removedata');
    });
    Route::group(['prefix'=>'customers'],function(){
		Route::get('list','CustomersController@index');
		Route::get('add','CustomersController@add');
		Route::post('save','CustomersController@save');
		Route::get('search','CustomersController@search');
		Route::get('edit/{id}','CustomersController@edit');
        Route::post('update/{id}','CustomersController@update');
        Route::get('delete', 'CustomersController@destroy') -> name('customers.removedata');
	});
	Route::group(['prefix'=>'companys'],function(){
		Route::get('list','CompanyController@index');
		Route::get('add','CompanyController@add');
		Route::post('save','CompanyController@save');
		Route::get('edit/{id}','CompanyController@edit');
                Route::post('update/{id}','CompanyController@update');
                Route::get('search','CompanyController@search');
                Route::get('delete', 'CompanyController@destroy') -> name('companys.removedata');
                Route::get('pdf','CompanyController@indexPDF');
                Route::get('word','CompanyController@indexWord');
        });
	Route::group(['prefix'=>'bills'],function(){
		Route::get('add','billsController@add');
        });
});
