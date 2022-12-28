<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('home');

// CartShop

Route::get('/Kart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.show');
Route::POST('/Kart/add/{id_product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::PUT('/Kart/rest/{id_cart}', [App\Http\Controllers\CartController::class, 'rest'])->name('cart.rest');
Route::PUT('/Kart/sum/{id_cart}', [App\Http\Controllers\CartController::class, 'sum'])->name('cart.sum');

// Payments

Route::get('/payments/mercadopago', [App\Http\Controllers\PaymentController::class, 'index'])->name('payments.mercadopago');
Route::get('/payments/mercadopago/completed', [App\Http\Controllers\PaymentController::class, 'pay'])->name('order.pay');
Route::get('/payments/mercadopago/rejected', [App\Http\Controllers\PaymentController::class, 'reject'])->name('order.reject');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//Routes for Admin Dashboard
Route::get('/admin/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.show');
Route::get('/admin/users/shop', [App\Http\Controllers\UsersController::class, 'shop'])->name('users.shop');
Route::POST('/admin/users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('users.save');
Route::get('/admin/users/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
Route::PUT('/admin/users/update/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
Route::DELETE('/admin/users/delete/{id}', [App\Http\Controllers\UsersController::class, 'delete'])->name('users.delete');


// Products

Route::get('/admin/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
Route::get('/admin/products/shop', [App\Http\Controllers\ProductsController::class, 'shop'])->name('products.shop');
Route::POST('/admin/products/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('products.save');
Route::get('/admin/products/edit/{id_product}', [App\Http\Controllers\ProductsController::class, 'edit'])->name('products.edit');
Route::PUT('/admin/products/update/{id_product}', [App\Http\Controllers\ProductsController::class, 'update'])->name('products.update');
Route::DELETE('/admin/products/delete/{id_product}', [App\Http\Controllers\ProductsController::class, 'delete'])->name('products.delete');


// Sales

Route::get('/admin/sales', [App\Http\Controllers\SalesController::class, 'index'])->name('sales.index');
Route::get('/admin/sales/details/{id_sale}', [App\Http\Controllers\SalesController::class, 'details'])->name('sales.details');
