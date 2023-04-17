<?php

use App\Http\Controllers\api\ClickupController;
use App\Http\Controllers\api\EmpleadosController;
use App\Http\Controllers\api\FichajesController;
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

Route::resource('apifichajes', FichajesController::class);
Route::resource('apiempleados', EmpleadosController::class);
Route::resource('apiclickup', ClickupController::class);
Route::get('fichajes/getall', [FichajesController::class, 'getall']);
