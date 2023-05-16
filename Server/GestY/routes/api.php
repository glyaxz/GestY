<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\ClientController;

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
    Route::post('check-ref', [ClientController::class, 'checkRef']);
    Route::post('check-user-ref', [ClientController::class, 'checkUserRef']);
    Route::put('set-user-ref', [ClientController::class, 'setUserRef']);
    Route::post('get-company', [ClientController::class, 'getCompany']);
    Route::post('get-projects', [ClientController::class, 'getProjects']);
    Route::post('get-tasks', [ClientController::class, 'getTasks']);
});

Route::middleware('admin')->group( function() {
    Route::post('companies', [ClientController::class, 'companies']);
    Route::post('projects', [ClientController::class, 'projects']);
    Route::post('tasks', [ClientController::class, 'tasks']);
});
