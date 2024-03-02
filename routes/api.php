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


Route::post('/users', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::post('/users/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/articles', [App\Http\Controllers\ArticleController::class, 'store'])->middleware('auth:sanctum');

Route::post('/users/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->middleware('auth:sanctum');

Route::put('/articles/{slug}',[App\Http\Controllers\ArticleController::class, 'update'])->middleware('auth:sanctum');

Route::delete('/articles/{slug}', [App\Http\Controllers\ArticleController::class, 'delete'])->middleware('auth:sanctum');

Route::get('/articles/{slug}', [App\Http\Controllers\ArticleController::class, 'show']);