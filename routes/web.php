<?php

use App\Http\Controllers\Fnm\ApiaryController;
use App\Http\Controllers\Fnm\Config\CampaignController;
use App\Http\Controllers\Fnm\Config\DiseaseController;
use App\Http\Controllers\Fnm\Config\MedicineController;
use App\Http\Controllers\Fnm\Config\PlagueController;
use App\Http\Controllers\Fnm\Dashboard\DashboardController;
use App\Http\Controllers\Fnm\VisitController;
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
    
    Route::get('/apiarios', [ApiaryController::class, 'index'])->name('apiarios.index');
    Route::get('/apiarios/create', [ApiaryController::class, 'create'])->name('apiarios.create');
    Route::get('/apiarios/{apiario}', [ApiaryController::class, 'show'])->name('apiarios.show');
    Route::get('/apiarios/{apiario}/edit', [ApiaryController::class, 'edit'])->name('apiarios.edit');

    Route::get('/visitas', [VisitController::class, 'index'])->name('visitas.index');
    Route::get('/visitas/create', [VisitController::class, 'create'])->name('visitas.create');
    Route::get('/visitas/{visita}', [VisitController::class, 'show'])->name('visitas.show');
    Route::get('/visitas/{visita}/edit', [VisitController::class, 'edit'])->name('visitas.edit');
    
    Route::post('/visitas/visitaEnfermedad/{disease_visit_id}', [VisitController::class, 'updateDiseaseVisitQ']);
    Route::get('/visitas/visitaEnfermedad/{disease_visit_id}/delete', [VisitController::class, 'deleteDiseaseVisitQ']);
    Route::post('/visitas/visitaPlaga/{plague_visit_id}', [VisitController::class, 'updatePlagueVisitQ']);
    Route::get('/visitas/visitaPlaga/{plague_visit_id}/delete', [VisitController::class, 'deletePlagueVisitQ']);
    Route::post('/visitas/visitaMedicina/{medicine_visit_id}', [VisitController::class, 'updateMedicineVisitQ']);
    Route::get('/visitas/visitaMedicina/{medicine_visit_id}/delete', [VisitController::class, 'deleteMedicineVisitQ']);

});
