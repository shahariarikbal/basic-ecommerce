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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/category/store', 'CategoryController@store');
Route::post('/getCategoryFilterProduct', 'CategoryController@getCategoryProducts');
Route::get('/get/category', 'CategoryController@getCategory');
Route::get('/filter/product/get/{id}', 'CategoryController@filtaringProduct');

Route::post('/product/store', 'ProductController@store');
Route::get('/get/product', 'ProductController@getProducts');
Route::get('/get/search/product', 'ProductController@getSearchProducts');

Route::post('/brand/store', 'BrandController@store');
Route::get('/get/brand', 'BrandController@getBrands');
