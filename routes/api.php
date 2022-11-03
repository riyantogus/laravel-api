<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\TokenController;
use App\Http\Controllers\User\UserController;
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

// Auth
Route::post('register', [RegisterController::class, 'Register']);
Route::post('login', [LoginController::class, 'Login']);

// User
Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'FindAll']);
    Route::get('/{id}', [UserController::class, 'GetUser']);
    Route::put('/{id}', [UserController::class, 'UpdateUser']);
    Route::delete('/{id}', [UserController::class, 'DeleteUser']);
});
