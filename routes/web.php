<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Begin Route Casiher
Route::prefix('/')->middleware(['auth', 'verified'])->group(
    function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        // Purchase Order
        Route::prefix('/purchase-order')->name('purchase_order')->controller(\App\Http\Controllers\Web\PurchaseOrderController::class)->group(function () {
            Route::get('/index', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::post('/store', 'store')->name('.store');

            Route::get('/export', 'export')->name('.export');
        });

        Route::prefix('/project-material-list')->name('project_material_list')->controller(\App\Http\Controllers\Web\ProjectMaterialListController::class)->group(function () {
            Route::get('/{uuid}/edit', 'edit')->name('.edit');
            Route::patch('/{uuid}/update', 'update')->name('.update');
            Route::delete('/{uuid}/delete', 'destroy')->name('.destroy');
        });

        // Purchase
        Route::prefix('/purchase')->name('purchase')->controller(\App\Http\Controllers\Web\PurchaseController::class)->group(function () {
            Route::get('/index', 'index')->name('.index');
            Route::get('/create/{id}', 'create')->name('.create');
            Route::post('/store/{id}', 'store')->name('.store');
            Route::get('/show/{id}', 'show')->name('.show');

            Route::get('/export', 'export')->name('.export');
        });

        // Inventory
        Route::prefix('/inventory')->name('inventory')->controller(\App\Http\Controllers\Web\InventoryController::class)->group(function () {
            Route::get('/index', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::get('/{uuid}/edit', 'edit')->name('.edit');
            Route::patch('/{uuid}/update', 'update')->name('.update');
            Route::delete('/{uuid}/delete', 'destroy')->name('.destroy');
        });

        // User
        Route::prefix('/user')->name('user')->controller(\App\Http\Controllers\Web\UserController::class)->group(function () {
            Route::get('/index', 'index')->name('.index');
        });

        // Owner
        Route::prefix('/owner')->name('owner')->controller(\App\Http\Controllers\Web\OwnerController::class)->group(function () {
            Route::get('/index', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::get('/{uuid}/edit', 'edit')->name('.edit');
            Route::patch('/{uuid}/update', 'update')->name('.update');
        });

        // Project
        Route::prefix('/project')->name('project')->controller(\App\Http\Controllers\Web\ProjectController::class)->group(function () {
            Route::get('/index', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::get('/{uuid}/edit', 'edit')->name('.edit');
            Route::patch('/{uuid}/update', 'update')->name('.update');
        });

        // Supplier
        Route::prefix('/supplier')->name('supplier')->controller(\App\Http\Controllers\Web\SupplierController::class)->group(function () {
            Route::get('/index', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::get('/{uuid}/edit', 'edit')->name('.edit');
            Route::patch('/{uuid}/update', 'update')->name('.update');
        });

        Route::prefix('/material')->name('material')->group(function () {
            Route::prefix('/in')->name('.in')->controller(\App\Http\Controllers\Web\MaterialInController::class)->group(function () {
                Route::get('/index', 'index')->name('.index');
                Route::post('/store', 'store')->name('.store');
            });

            Route::prefix('/out')->name('.out')->controller(\App\Http\Controllers\Web\MaterialOutController::class)->group(function () {
                Route::get('/index', 'index')->name('.index');
                Route::post('/store', 'store')->name('.store');
            });
        });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
