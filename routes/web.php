<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubCategoryController;
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
    return view('welcome');
});

// Route::resource('home', CategoryController::class);

Route::get('category', [CategoryController::class, 'index'])->name('item.category');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/distroy/{id}', [CategoryController::class, 'distroy'])->name('category.destroy');

Route::get('sub-category', [SubCategoryController::class, 'index'])->name('sub-category');
Route::post('sub-category/store', [SubCategoryController::class, 'store'])->name('sub-category.store');
Route::put('sub-category/status-change', [SubCategoryController::class, 'statusChange'])->name('sub-category.status-change');
