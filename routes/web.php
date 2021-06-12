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

Route::get('/', function () {
    return view('welcome');
});

Route::get('Category', 'CategoryController@category');
Route::get('Product', 'ProductController@product');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Category
Route::get('Category/All', 'CategoryController@AllCat')->name('all.category');
Route::post('Category/Add', 'CategoryController@AddCat')->name('store.category');
Route::get('Category/Edit/{id}', 'CategoryController@Edit');
Route::post('Store/Category/{id}', 'CategoryController@update');
Route::get('Softdelete/Category/{id}', 'CategoryController@SoftDelete');
Route::get('Category/restore/{id}', 'CategoryController@Restore');
Route::get('pdelete/Category/{id}', 'CategoryController@pdelete');

// Product
Route::get('Product/All', 'ProductController@AllProduct')->name('all.product');
Route::post('Product//Add', 'ProductController@AddProduct')->name('store.product');
Route::get('Product/Edit/{id}', 'ProductController@Edit');
Route::post('Store/Product/{id}', 'ProductController@update');
Route::get('Softdelete/Product/{id}', 'ProductController@SoftDelete');
Route::get('Product/restore/{id}', 'ProductController@Restore');
Route::get('pdelete/Product/{id}', 'ProductController@pdelete');
