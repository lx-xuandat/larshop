<?php

use App\Http\Controllers\Admins\CustomerController;
use App\Http\Controllers\Admins\ProductController;
use App\Models\Customer;
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

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{product}', [ProductController::class, 'show']);
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    Route::post('/products/deletes', [ProductController::class, 'deleteAll']);

    Route::get('/customers', function () {
        return view('admin.customers');
    });

    Route::get('/orders', function () {
        return view('admin.orders');
    });

    Route::apiResource('customers', CustomerController::class);
    Route::get('get-customers', [CustomerController::class, 'getCustomers'])->name('get-customers');

});
