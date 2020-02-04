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

Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');
// Route::post('add-category', 'CategoryController@addCategory');
// Route::get('category-list', 'CategoryController@categoryList');
// Route::post('add-product', 'ProductController@addProduct');
// Route::get('product-list/{start}/{limit}/{catFilter}', 'ProductController@productList');

Route::get('product-list', 'ProductController@index');
 
Route::get('cart', 'ProductController@cart');
 
Route::get('add-to-cart/{id}', 'ProductController@addToCart');
Route::patch('update-cart', 'ProductController@update');
Route::delete('remove-from-cart', 'ProductController@remove');
