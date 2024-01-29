<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CargaAcademicaController;
use App\Http\Controllers\DocenteRevisorController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\PortafolioController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\SemestreController;
use App\Models\Admin;
use App\Models\CargaAcademica;
use App\Models\Informe;
use App\Models\Portafolio;
use App\Models\Revision;

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

    // Ruta para mostrar carga academica del docente
    Route::get('docentes/carga_academica', [DocenteController::class, 'cargaAcademica'])->name('docentes.cargaAcademica');

    // Ruta para enviar portafolio docente
    Route::get('docentes/enviar_portafolio', [DocenteController::class, 'enviarPortafolio'])->name('docentes.enviarPortafolio');

    // Ruta para mostrar portafolios revisados
    Route::get('docentes/portafolios_revisados', [DocenteController::class, 'portafoliosRevisados'])->name('docentes.portafoliosRevisados');
});


// Rutas para el panel de Revisor
Route::middleware(['auth','role:Revisor'])->group(function () {

    // Ruta para el inicio del panel de Revisor
    Route::get('revisores', [RevisorController::class, 'dashboard'])->name('revisores.dashboard');

    // Rutas para editar el perfil revisor
    Route::get('revisores/profile', [ProfileController::class, 'editRevisor'])->name('profileRevisor.edit');
    Route::patch('revisores/profile', [ProfileController::class, 'updateRevisor'])->name('profileRevisor.update');   

    // Ruta para revisar portafolios 
    Route::get('revisores/revisar_portafolios', [RevisorController::class, 'revisarPortafolios'])->name('revisores.revisarPortafolios');

    // Ruta para mostrar el historial de revisiones 
    Route::get('revisores/historial_revisiones', [RevisorController::class, 'historialRevisiones'])->name('revisores.historialRevisiones');
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
    
    // Rutas para diferente CRUD
    Route::prefix('admins')->group(function () {
        Route::resources([
            'docentes' => DocenteController::class,
            'revisores' => RevisorController::class,
            'semestres' => SemestreController::class,
            'revisor_docentes' => DocenteRevisorController::class,
            
            // Desde aqui falta implementar los CRUD
            'asignaturas' => AsignaturaController::class,
            'carga_academicas' => CargaAcademicaController::class,
            'portafolios' => PortafolioController::class,
            'revisiones' => RevisionController::class,
            'informes' => InformeController::class,
        ]);
    });

    // Ruta para mostrar carga acddemica de la escuela
    Route::get('admins/carga_academica_escuela', [CargaAcademicaController::class, 'cargaAcademicaEscuela'])->name('admins.cargaAcademicaEscuela');

    // Ruta para mostrar informes sin enviar (debe incluir en la vista la opción para enviar)
    Route::get('admins/informes_sin_enviar', [InformeController::class, 'informeSinEnviar'])->name('admins.informeSinEnviar');
});


require __DIR__.'/auth.php';
