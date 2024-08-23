<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('/purchase-order')->name('purchase_order')->controller(\App\Http\Controllers\Api\PurchaseOrderController::class)->group(function () {
//     Route::post('/store', 'store')->name('.store');
// });

Route::prefix('/owner')->name('owner')->controller(\App\Http\Controllers\Api\OwnerController::class)->group(function () {
    Route::get('/index', 'index')->name('.index');
    Route::post('/store', 'store')->name('.store');
});

Route::prefix('/material')->name('material')->controller(\App\Http\Controllers\Api\MaterialController::class)->group(function () {
    Route::get('/index', 'index')->name('.index');
    Route::post('/store', 'store')->name('.store');
});

Route::prefix('/supplier')->name('supplier')->controller(\App\Http\Controllers\Api\SupplierController::class)->group(function () {
    Route::get('/index', 'index')->name('.index');
    Route::post('/store', 'store')->name('.store');
});
