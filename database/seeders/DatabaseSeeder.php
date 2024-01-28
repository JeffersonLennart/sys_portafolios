<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Docente;
use App\Models\Revisor;
use App\Models\Semestre;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    protected static ?string $password;

    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()
        //                 ->count(5)
        //                 ->has(Docente::factory()->count(3))
        //                 ->has(Revisor::factory()->count(3))
        //                 ->create();        

        // Crear el admin
        \App\Models\User::factory()
        ->has(Docente::factory())
        ->has(Revisor::factory()->state(['es_presidente' => 1]))
        ->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'rol' => 'Docente,Revisor,Administrador',            
        ]);

        // Crear los Docentes
        \App\Models\User::factory()
            ->count(6)
            ->has(Docente::factory())
            ->create([
                'rol' => 'Docente',
            ]);

        // Crear los Revisores
        \App\Models\User::factory()
            ->count(2)
            ->has(Docente::factory())
            ->has(Revisor::factory())
            ->create([
                'rol' => 'Docente,Revisor',
            ]);            

        // Crear Semestres
        \App\Models\Semestre::factory()->create([
            'nombre' => '2022-I',
            'fecha_inicio' => '2022-03-11',
            'fecha_fin' => '2022-06-24',
            'estado' => 'Terminado',
        ]);

        \App\Models\Semestre::factory()->create([
            'nombre' => '2022-II',
            'fecha_inicio' => '2022-07-3',
            'fecha_fin' => ' 2022-10-09',
            'estado' => 'Terminado',
        ]);

        \App\Models\Semestre::factory()->create([
            'nombre' => '2023-I',
            'fecha_inicio' => '2023-03-11',
            'fecha_fin' => ' 2023-06-24',
            'estado' => 'Terminado',
        ]);

        \App\Models\Semestre::factory()->create([
            'nombre' => '2023-II',
            'fecha_inicio' => '2023-08-3',
            'fecha_fin' => ' 2024-02-8',
            'estado' => 'Activo',
        ]);

        /* Para la asignaciones de docentes a revisores, cuidando que un revisor no se revise a si mismo*/    
        $docentes = \App\Models\Docente::all();
        $revisores = \App\Models\Revisor::all();

        // Crear un nuevo array booleano con valores false para ver si ya ha sido revisado
        $revisados = array_fill(0, count($docentes), false);        

        // Asignar 3 docentes por cada revisor
        foreach($revisores as $revisor){            
            $k = 0;
            for ($j = 0; $j < count($docentes) ; $j++){                
                if (($revisor->id !== $docentes[$j]->id) && $revisados[$j] == false){
                    $docentes[$j]->revisores()->attach($revisor->id, ['semestre_id' => 4]);
                    $k++;
                    $revisados[$j] = true;
                }
                if ($k === 3)
                    break;
            }
        }

        // Para crear asignaturas
        \App\Models\Asignatura::factory()->count(40)->create();

        // Para crear cargas academicas    
        for($i = 0; $i < 50; $i++){
            $docente = \App\Models\Docente::inRandomOrder()->first();
            $asignatura = \App\Models\Asignatura::inRandomOrder()->first();
            $semestre = \App\Models\Semestre::inRandomOrder()->first();

            \App\Models\CargaAcademica::factory()->create([
                'docente_id' => $docente->id,
                'asignatura_id' => $asignatura->id,
                'semestre_id' => $semestre->id,
            ]);
        }        

        // Para crear portafolios
        for($i = 0; $i < 12; $i++){
            $cargaAcademica = \App\Models\CargaAcademica::inRandomOrder()->first();            

            // Verificar si el id ya existe en la tabla Portafolio
            $existeId = \App\Models\Portafolio::where('carga_academica_id', $cargaAcademica->id)->exists();

            if (!$existeId) {
                // Si el id no existe, entonces podemos crear el nuevo registro
                \App\Models\Portafolio::factory()->create([
                    'carga_academica_id' => $cargaAcademica->id,
                ]);
            }
        }  

        // Para crear revisiones (solo 5 de los 10 portafolios)        
        $portafolios = \App\Models\Portafolio::take(5)->get();

        foreach($portafolios as $portafolio){
            // Obtener revisor asociado al portafolio
            $revisor = $portafolio->cargaAcademica->docente->revisores->first();

            \App\Models\Revision::factory()->create([
                'portafolio_id' => $portafolio->id,                
                'revisor_id' => $revisor->id,                
            ]);
        }

        // Para crear informes (solo 2 de las 5 revisiones)        
        $revisiones = \App\Models\Revision::take(2)->get();

        foreach($revisiones as $revision){
            // Obtener revisor asociado a la revisión
            $presidente = \App\Models\Revisor::where('es_presidente',1)->first();
            
            \App\Models\Informe::factory()->create([
                'revision_id' => $revision->id,                
                'revisor_id' => $presidente->id,                
            ]);
        }
    }
}
