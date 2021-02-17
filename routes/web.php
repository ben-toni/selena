<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('categories', [CategoryController::class, 'store'])->name('category.store');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('products', [ProductController::class, 'index'])->name('product.index');
});
