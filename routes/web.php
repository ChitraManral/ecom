<?php

use App\Http\Controllers\ProductController;
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


Route::get('product-details', [ProductController::class, 'productDetails']);
Route::post('store-product-details', [ProductController::class, 'storeDetails']);
Route::get('get-product-details', [ProductController::class, 'getProductDetails']);
Route::post('delete-product', [ProductController::class, 'deleteProductDetails']);
Route::post('edit-product-details', [ProductController::class, 'editProductDetails']);
Route::post('update-product-details', [ProductController::class, 'updateProductDetails']);