<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\TestController;
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

// Main page
Route::get('/', [ProductController::class, 'index'])->name('mainPage');

// Test method
Route::get('/test', [TestController::class, 'test'])->name('test');

// Shopping cart
Route::get('/shoppingCart', [ShoppingCartController::class, 'index'])->name('shoppingCart');

// Add product to shopping cart
Route::post('/shoppingCart/add/{product}', [ShoppingCartController::class, 'addProduct'])->name('addProductToShoppingCart');

// Delete product from shopping cart
Route::delete('/shoppingCart/delete/{product}', [ShoppingCartController::class, 'deleteProduct'])->name('deleteProductFromShoppingCart');

// Delete product from catalog
Route::delete('/product/delete/{product}', [ProductController::class, 'deleteProduct'])->name('deleteProductFromCatalog');

// Add product to catalog (the form)
Route::get('/product/add', [ProductController::class, 'addProduct'])->name('addProductToCatalog');

// Save product in catalog
Route::post('/product/add', [ProductController::class, 'saveProduct'])->name('saveProductInCatalog');

// Edit product in catalog (the form)
Route::get('/product/edit/{product}', [ProductController::class, 'editProduct'])->name('editProductInCatalog');

// Update product in catalog
Route::put('/product/edit/{product}', [ProductController::class, 'updateProduct'])->name('updateProductInCatalog');