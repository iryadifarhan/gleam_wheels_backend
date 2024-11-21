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

Route::apiResource('/places', App\Http\Controllers\Api\PlaceController::class);
Route::apiResource('/users', App\Http\Controllers\Api\UserController::class);
Route::post('/users/login', [App\Http\Controllers\Api\UserController::class, 'login']);
Route::post('/users/autologin', [App\Http\Controllers\Api\UserController::class, 'autologin']);
Route::get('/getbooklist/place/{name}', [App\Http\Controllers\Api\PlaceController::class, 'getBookList']);
Route::get('/getbooklist/user/{username}', [App\Http\Controllers\Api\UserController::class, 'getBookList']);
Route::patch('/user/update', [App\Http\Controllers\Api\UserController::class, 'change_username']);
Route::post('/booking', [App\Http\Controllers\Api\BookingController::class, 'store']);