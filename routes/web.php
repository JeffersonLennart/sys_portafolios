<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AdminController;
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

    // Ruta para el inicio del panel de Docente
    Route::get('docentes', [DocenteController::class, 'index'])->name('docentes.index');

    // Rutas para editar el perfil docente
    Route::get('docentes/profile', [ProfileController::class, 'editDocente'])->name('profileDocente.edit');
    Route::patch('docentes/profile', [ProfileController::class, 'updateDocente'])->name('profileDocente.update');

    // Rutas para la gestión de docentes
    // Route::resource('docentes', DocenteController::class);    
});

Route::middleware(['auth','role:Revisor'])->group(function () {

    // Ruta para el inicio del panel de Revisor
    Route::get('revisores', [RevisorController::class, 'index'])->name('revisores.index');

    // Rutas para editar el perfil revisor
    Route::get('revisores/profile', [ProfileController::class, 'editRevisor'])->name('profileRevisor.edit');
    Route::patch('revisores/profile', [ProfileController::class, 'updateRevisor'])->name('profileRevisor.update');    

    // Rutas para la gestión de revisores
    // Route::resource('revisores', RevisorController::class);    
});

Route::middleware(['auth','role:Admin'])->group(function () {

    // Rutas para editar el perfil admin
    Route::get('admins/profile', [ProfileController::class, 'editAdmin'])->name('profileAdmin.edit');
    Route::patch('admins/profile', [ProfileController::class, 'updateAdmin'])->name('profileAdmin.update');
    
    // Ruta para el inicio del panel de admin
    Route::get('admins', [AdminController::class, 'index'])->name('admins.index');

    // Rutas para la asignación de roles
    Route::get('admins/asignar_roles', [AdminController::class, 'asignarRoles'])->name('admins.asignarRoles');
    Route::put('admins/asignar_roles', [AdminController::class, 'updateRole'])->name('admins.updateRole');
    
    // Rutas para el CRUD de Docentes
    Route::get('admins/docentes', [AdminController::class, 'indexDocente'])->name('admins.indexDocente');
    Route::post('admins/docentes', [AdminController::class, 'storeDocente'])->name('admins.storeDocente');
    Route::get('admins/docentes/create', [AdminController::class, 'createDocente'])->name('admins.createDocente');
    Route::get('admins/docentes/{docente}', [AdminController::class, 'showDocente'])->name('admins.showDocente');
    Route::put('admins/docentes/{docente}', [AdminController::class, 'updateDocente'])->name('admins.updateDocente');
    Route::delete('admins/docentes/{docente}', [AdminController::class, 'destroyDocente'])->name('admins.destroyDocente');
    Route::get('admins/docentes/{docente}/edit', [AdminController::class, 'editDocente'])->name('admins.editDocente');
    // Route::resource('admins', AdminController::class);    
});


require __DIR__.'/auth.php';
