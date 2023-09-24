<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::prefix('course')->name('course.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/create', [CourseController::class, 'create'])->name('create');
    Route::post('/store', [CourseController::class, 'store'])->name('store');
    Route::get('/show/{id}', [CourseController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [CourseController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [CourseController::class, 'destroy'])->name('delete');
});

// Route::prefix('student')->name('student.')->group(function () {
//     Route::get('/', [StudentController::class, 'index'])->name('index');
//     Route::get('/create', [StudentController::class, 'create'])->name('create');
//     Route::post('/store', [StudentController::class, 'store'])->name('store');
//     Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');
//     Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
//     Route::put('/update/{id}', [StudentController::class, 'update'])->name('update');
//     Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('delete');
// });
