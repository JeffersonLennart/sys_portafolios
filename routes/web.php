<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocenteRevisorController;
use App\Http\Controllers\SemestreController;
use App\Models\Admin;

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

// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});


// Ruta para eliminar un perfil como un usuario
Route::middleware('auth')->group(function () {
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Rutas para el panel de Docente
Route::middleware(['auth','role:Docente'])->group(function () {

    // Ruta para el inicio del panel de Docente
    Route::get('docentes', [DocenteController::class, 'dashboard'])->name('docentes.dashboard');

    // Rutas para editar el perfil docente
    Route::get('docentes/profile', [ProfileController::class, 'editDocente'])->name('profileDocente.edit');
    Route::patch('docentes/profile', [ProfileController::class, 'updateDocente'])->name('profileDocente.update');

});


// Rutas para el panel de Revisor
Route::middleware(['auth','role:Revisor'])->group(function () {

    // Ruta para el inicio del panel de Revisor
    Route::get('revisores', [RevisorController::class, 'dashboard'])->name('revisores.dashboard');

    // Rutas para editar el perfil revisor
    Route::get('revisores/profile', [ProfileController::class, 'editRevisor'])->name('profileRevisor.edit');
    Route::patch('revisores/profile', [ProfileController::class, 'updateRevisor'])->name('profileRevisor.update');   

});

Route::middleware(['auth','role:Admin'])->group(function () {

    // Ruta para el inicio del panel de admin
    Route::get('admins', [AdminController::class, 'dashboard'])->name('admins.dashboard');

    // Rutas para editar el perfil admin
    Route::get('admins/profile', [ProfileController::class, 'editAdmin'])->name('profileAdmin.edit');
    Route::patch('admins/profile', [ProfileController::class, 'updateAdmin'])->name('profileAdmin.update');
    
    // Rutas para la asignación de roles
    Route::get('admins/asignar_roles', [AdminController::class, 'asignarRoles'])->name('admins.asignarRoles');
    Route::put('admins/asignar_roles', [AdminController::class, 'updateRole'])->name('admins.updateRole');
    
    // // Rutas para el CRUD de Docentes, Revisores
    Route::prefix('admins')->group(function () {
        Route::resources([
            'docentes' => DocenteController::class,
            'revisores' => RevisorController::class,
            'semestres' => SemestreController::class,
            'revisor_docentes' => DocenteRevisorController::class,
        ]);
    });
});


require __DIR__.'/auth.php';
