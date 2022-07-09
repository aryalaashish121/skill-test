<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/', 'categories');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::patch('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.delete');

Route::resource('products', ProductController::class);
