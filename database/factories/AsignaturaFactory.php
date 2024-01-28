<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asignatura>
 */
class AsignaturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombres = [
            'ALGORITMOS AVANZADOS',
            'ANALISIS Y DISEÑO DE ALGORITMOS',
            'BIOINFORMATICA',
            'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACIÓN',
            'ALGORITMOS Y ESTRUCTURAS DE DATOS',
            'INTELIGENCIA ARTIFICIAL',
            'ABSTRACCION DE DATOS Y OBJETOS',
            'FUNDAMENTOS DE LA PROGRAMACION',
            'SEMINARIO DE INVESTIGACION I',
            'ANÁLISIS DE DATOS EMPRESARIALES',
            'SEMINARIO DE INVESTIGACION II',
            'ORGANIZACION Y ARQUITECTURA DEL COMPUTADOR',
            'SISTEMAS OPERATIVOS',
            'FORMULACION DE PROYECTOS DE TECNOLOGIAS DE LA INFORMACION',
            'ADMINISTRACION DE TECNOLOGÍAS DE LA INFORMACIÓN',
            'PLANEAMIENTO Y DIRECCION ESTRATEGICA DE TECNOLOGIA DE INFORMACION',
            'DESARROLLO DE SOFTWARE II',
            'FUNDAMENTOS Y DISEÑO DE BASE DE DATOS',
            'PROGRAMACION DIGITAL',
            'EMPRENDIMIENTO E INNOVACION',
            'PROGRAMACION I',
            'ALGORITMOS PARALELOS Y DISTRIBUIDOS',
            'VISION COMPUTACIONAL',
            'APRENDIZAJE AUTOMATICO',
            'PROCESAMIENTO DE LENGUAJE NATURAL',
            'MODELADO Y SIMULACION',
            'METODOS NUMERICOS',
            'INGENIERIA ECONOMICA',
            'QUECHUA',
            'ROBOTICA',
            'ANALISIS Y DISEÑO DE SISTEMAS DE INFORMACION',
            'COMPUTACION GRAFICA I',
            'MINERIA DE DATOS',
            'PROGRAMACION II',
            'LENGUAJE DE PROGRAMACION',
            'INGENIERIA DE SOFTWARE I',
            'INGENIERIA DE SOFTWARE II',
            'REDES DE COMPUTADORAS I',
            'COMPILADORES',
            'DEEP LEARNING',
            'TECNOLOGIAS DE LA INFORMACION Y LA COMUNICACIÓN',
            'TEORIA DE LA COMPUTACION',
            'COMPUTACION GRAFICA II',
            'PROGRAMACION DIGITAL II',
            'MODELOS PROBABILISTICOS',
            'SISTEMA DE BASE DE DATOS',
            'CONTROL Y AUDITORIA DE SISTEMAS',
            'MUSICA',
            'TEATRO',
        ];

        $escuelas = [
            'INGENIERIA INFORMATICA',
            'ZOOTECNIA',
            'CIENCIAS ADMINISTRATIVAS',
            'INGENIERIA ELECTRICA',
            'FILOSOFIA',
            'ENFERMERIA',
            'EDUCACION',
            'INGENIERIA MECANICA',
            'INGENIERIA GEOLOGICA',
            'FARMACIA Y BIOQUIMICA',
            'AGRONOMIA',
            'FISICA',
            'MATEMATICA',
            'CONTABILIDAD',
            'PSICOLOGIA',
            'INGENIERIA ELECTRONICA',
            'INGENIERIA DE MINAS',
            'INGENIERIA CIVIL',
            'ARQUEOLOGIA',
            'MEDICINA HUMANA',
            'ARQUITECTURA',
            'ECONOMIA',
            'HISTORIA',
            'ODONTOLOGIA',
            'CIENCIAS DE LA COMUNICACIÓN',
            'TURISMO',
            'INGENIERÍA PETROQUÍMICA / INGENIERÍA QUÍMICA',
            'BIOLOGIA',
            'QUIMICA',
        ];

        $categorias = ['EG', 'EEEP', 'AEX', 'OEES'];

        $creditos = [2, 3, 4];

        return [
            'nombre' => $this->faker->unique()->randomElement($nombres),
            'tipo' => $this->faker->randomElement(['teorica', 'teorica_practica', 'practica']),
            'codigo' => 'IF' . $this->faker->unique()->numberBetween(100, 999) . strtoupper($this->faker->unique()->lexify('???')),
            'escuela' => $this->faker->randomElement($escuelas),
            'categoria' => $this->faker->randomElement($categorias),
            'creditos' => $this->faker->randomElement($creditos),
        ];
    }
}
