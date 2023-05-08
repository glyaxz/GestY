<?php

use App\Http\Controllers\dashboard\CompanyController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FichajesController;
use App\Http\Controllers\HorasController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function() {
    Route::resources([
        'company' => CompanyController::class,
        'company/{company_id}/fichajes' => FichajesController::class,
        'company/{company_id}/empleados' => EmpleadoController::class,
    ]);
    Route::get('company/{company_id}/fichajes/exportpdf', [FichajesController::class, 'getpdf']);
    Route::get('company/{company_id}/fichajes/sendpdfto', [FichajesController::class, 'sendpdfto']);
    Route::get('company/{company_id}/fichajes/viewpdf', [FichajesController::class, 'streampdf']);
    Route::get('company/{company_id}/empleados/exportpdf', [EmpleadoController::class, 'getpdf']);
    Route::get('company/{company_id}/empleados/viewpdf', [EmpleadoController::class, 'streampdf']);
    Route::get('company/{company_id}/mail/sendmail', [MailController::class, 'sendmail']);
    Route::resource('mail', MailController::class)->only(['index']);
    Route::resource('horas', HorasController::class)->only(['index','show']);
    Route::get('horas/{project}/task', [HorasController::class, 'tasks']);
    Route::get('horas/{project}/task/{taskid}', [HorasController::class, 'task']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
