<?php

use App\Http\Controllers\api\ClickupController;
use App\Http\Controllers\api\EmpleadosController;
use App\Http\Controllers\api\FichajesController;
use App\Http\Controllers\api\LoginController;
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

Route::middleware('client')->group( function() {
    Route::post('login-user', [LoginController::class, 'loginUser']);
    Route::post('register-user', [LoginController::class, 'registerUser']);
    Route::resource('empleados', EmpleadosController::class);
});
