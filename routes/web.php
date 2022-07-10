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
Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');

// Route::resource('products', ProductController::class);
Route::prefix('products')->group(function(){

    Route::get('/',[ProductController::class,'index'])->name('products.index');
    Route::get('/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/',[ProductController::class,'store'])->name('products.store');
    Route::get('/{product}/details',[ProductController::class,'show'])->name('products.show');
    Route::get('/{product}',[ProductController::class,'edit'])->name('products.edit');
    Route::post('/{product}',[ProductController::class,'update'])->name('products.update');
    Route::delete('/{product}',[ProductController::class,'destroy'])->name('products.destroy');

});
