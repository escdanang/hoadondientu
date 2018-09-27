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
		Route::get('delete', 'billsController@destroy') -> name('bills.removedata');
		Route::get('add','billsController@add');
        Route::post('save','billsController@save');
        Route::get('list','billsController@index');
        Route::get('list1','billsController@index1');
        Route::get('list2','billsController@index2');
        Route::get('list3','billsController@index3');
        Route::get('list4','billsController@index4');
        Route::get('list5','billsController@index5');
        Route::get('list6','billsController@index6');
        Route::get('list7','billsController@index7');
        Route::get('list8','billsController@index8');
        Route::get('list9','billsController@index9');
        Route::get('list10','billsController@index10');
        Route::get('list11','billsController@index11');
        Route::get('list12','billsController@index12');
        Route::get('list13','billsController@index13');
        Route::get('list14','billsController@index14');
        Route::get('list15','billsController@index15');
        Route::get('list16','billsController@index16');
        Route::get('list17','billsController@index17');
        Route::get('list18','billsController@index18');
        Route::get('list19','billsController@index19');
        Route::get('list20','billsController@index20');
        Route::get('list21','billsController@index21');
        Route::get('list22','billsController@index22');
        Route::get('list23','billsController@index23');
        Route::get('list24','billsController@index24');
        Route::get('list25','billsController@index25');
        Route::get('list26','billsController@index26');
        Route::get('list27','billsController@index27');
        Route::get('list28','billsController@index28');
        Route::get('list29','billsController@index29');
        Route::get('list30','billsController@index30');
        Route::get('list31','billsController@index31');
        Route::get('list32','billsController@index32');
        Route::get('list33','billsController@index33');
        Route::get('list34','billsController@index34');
        Route::get('list35','billsController@index35');
        Route::get('list36','billsController@index36');
        Route::get('list37','billsController@index37');
        Route::get('list38','billsController@index38');
        Route::get('list39','billsController@index39');
        Route::get('list40','billsController@index40');
        Route::get('list41','billsController@index41');
        Route::get('list42','billsController@index42');
        Route::get('list43','billsController@index43');
        Route::get('list44','billsController@index44');
        Route::get('list45','billsController@index45');            
        });
});
