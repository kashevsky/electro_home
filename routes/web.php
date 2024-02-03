<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubCategoryController;

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

Route::get('/', '\App\Http\Controllers\MainController@index')->name('index');
Route::get('category/{category_id}', '\App\Http\Controllers\CategoryController@index')->name('category.index');
Route::get('sub_category/{sub_category_id}','\App\Http\Controllers\SubCategoryController@index')->name('sub_category.index');
Route::get('1/product/{product_id}', '\App\Http\Controllers\ProductController@show')->name('product.show');
