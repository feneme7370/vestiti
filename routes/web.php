<?php

use App\Http\Controllers\Fnm\Config\CampaignController;
use App\Http\Controllers\Fnm\Config\DiseaseController;
use App\Http\Controllers\Fnm\Config\MedicineController;
use App\Http\Controllers\Fnm\Config\PlagueController;
use App\Http\Controllers\Fnm\Dashboard\DashboardController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/cosechas', [CampaignController::class, 'index'])->name('cosechas.index');
    Route::get('/enfermedades', [DiseaseController::class, 'index'])->name('enfermedades.index');
    Route::get('/plagas', [PlagueController::class, 'index'])->name('plagas.index');
    Route::get('/medicinas', [MedicineController::class, 'index'])->name('medicinas.index');

});
