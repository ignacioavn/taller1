<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\UserController;
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

Route::post('/login',[AuthController::class,'login']);

Route::middleware(['jwt'])->group(function () {
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/users',[UserController::class,'index']);
    Route::post('/users/new',[UserController::class,'store']);
    Route::get('/users/{id}/edit',[UserController::class,'edit']);
    Route::put('/users/{id}/edit',[UserController::class,'update']);
    Route::delete('/users/{id}',[UserController::class,'destroy']);
    Route::get('/users/search/rut/{rut}',[UserController::class,'searchRut']);
    Route::get('/users/search/email/{email}',[UserController::class,'searchEmail']);
});


