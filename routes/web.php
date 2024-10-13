<?php

use App\Http\Controllers\ProductController;
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


Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::post('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::put('/products/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/products/delete', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/pagination', [ProductController::class, 'pagination']);
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
