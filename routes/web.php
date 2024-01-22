<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:Docente'])->group(function () {
    # Rutas para editar el perfil docente
    Route::get('docentes/profile', [ProfileController::class, 'editDocente'])->name('profileDocente.edit');
    Route::patch('docentes/profile', [ProfileController::class, 'updateDocente'])->name('profileDocente.update');

    # Rutas para la gestión de docentes
    Route::resource('docentes', DocenteController::class);    
});

Route::middleware(['auth','role:Revisor'])->group(function () {
    # Rutas para editar el perfil revisor
    Route::get('revisores/profile', [ProfileController::class, 'editRevisor'])->name('profileRevisor.edit');
    Route::patch('revisores/profile', [ProfileController::class, 'updateRevisor'])->name('profileRevisor.update');

    # Rutas para la gestión de revisores
    Route::resource('revisores', RevisorController::class);    
});

Route::middleware(['auth','role:Admin'])->group(function () {
    # Rutas para editar el perfil admin
    Route::get('admins/profile', [ProfileController::class, 'editAdmin'])->name('profileAdmin.edit');
    Route::patch('admins/profile', [ProfileController::class, 'updateAdmin'])->name('profileAdmin.update');

    # Rutas para la gestión de admins
    Route::resource('admins', AdminController::class);    
});


require __DIR__.'/auth.php';
