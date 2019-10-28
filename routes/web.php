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
Route::group(['prefix' => '/','categories'], function () {
    Route::get('categories/list','CategoryController@index')->name('category.index');
    Route::get('categories/search','CategoryController@index')->name('category.search');
    Route::get('categories/create', 'CategoryController@create')->name('category.create');
    Route::get('categories/edit/{id}', 'CategoryController@create')->name('category.edit');
    Route::post('categories/store', 'CategoryController@store')->name('category.store');
    Route::get('categories/detail/{id}', 'CategoryController@show')->name('category.show');
    Route::get('categories/delete/{id}', 'CategoryController@delete')->name('category.delete');
});

Route::group(['prefix' => '/','products'], function () {
    Route::get('products/list','ProductController@index')->name('product.index');
//    Route::get('products/create/{id?}', 'ProductController@create')->name('product.create');
    Route::get('products/create', 'ProductController@create')->name('product.create');
    Route::get('products/edit/{id}', 'ProductController@create')->name('product.edit');
    Route::post('products/store', 'ProductController@store')->name('product.store');
    Route::get('products/detail/{id}', 'ProductController@show')->name('product.show');
    Route::get('products/delete/{id}', 'ProductController@delete')->name('product.delete');
});

