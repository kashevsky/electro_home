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

Route::get('/', '\App\Http\Controllers\MainController@index')->name('index');
Route::get('categories/{category_id}', '\App\Http\Controllers\CategoryController@index')->name('category.index');
Route::get('sub_categories/{sub_category_id}', '\App\Http\Controllers\SubCategoryController@index')->name('sub_category.index');
Route::get('products/{product_id}', '\App\Http\Controllers\ProductController@show')->name('product.show');

Route::get('searchByQuery', [App\Http\Controllers\SearchController::class, 'searchByQuery']);
Route::get('sub_categories/{sub_category_id}/searchProducts', [App\Http\Controllers\SearchController::class, 'searchProducts']);

Route::get('admin/promocodes', '\App\Http\Controllers\PromocodeController@index');

Route::post('basket/add', '\App\Http\Controllers\BasketController@add')->name('basket.add');

Route::post('add_to_comparison', [App\Http\Controllers\ComparisonController::class, 'addToComparison']);
Route::post('remove_from_comparison', [App\Http\Controllers\ComparisonController::class, 'removeFromComparison']);

Route::get('compare/{products}', [App\Http\Controllers\ComparisonController::class, 'compare']);

Route::get('basket/test', '\App\Http\Controllers\BasketController@test')->name('basket.test');
