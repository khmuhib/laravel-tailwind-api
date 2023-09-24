<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('students', [StudentController::class, 'index']);
Route::post('student/store', [StudentController::class, 'store']);
Route::get('student/{id}', [StudentController::class, 'show']);
Route::get('student/{id}/edit', [StudentController::class, 'edit']);
Route::put('student/{id}/update', [StudentController::class, 'update']);
Route::delete('student/{id}/delete', [StudentController::class, 'delete']);


Route::get('categories', [CategoryController::class, 'index']);
Route::post('categories/store', [CategoryController::class, 'store']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::get('categories/{id}/edit', [CategoryController::class, 'edit']);
Route::put('categories/{id}/update', [CategoryController::class, 'update']);
Route::delete('categories/{id}/delete', [CategoryController::class, 'delete']);

Route::get('post', [PostController::class, 'index']);
Route::post('post/store', [PostController::class, 'store']);
Route::get('post/{id}', [PostController::class, 'show']);
Route::get('post/{id}/edit', [PostController::class, 'edit']);
Route::put('post/{id}/update', [PostController::class, 'update']);
Route::delete('post/{id}/delete', [PostController::class, 'delete']);
