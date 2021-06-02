<?php
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
use App\Http\Controllers\ApiControllers\UserApiController\UserApiController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;

Route::post('/loginApp', [LoginController::class, 'loginApp']);
Route::middleware('auth:sanctum')->group(function() {
    Route::get('/auth-user', [AuthController::class, 'authenticatedUser']);
    Route::apiResource('user', UserApiController::class);
    Route::post('/logout-app', [LoginController::class, 'logoutApp']);
});


