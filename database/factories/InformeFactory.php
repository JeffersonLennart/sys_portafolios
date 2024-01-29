<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Informe>
 */
class InformeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_informe' => $this->faker->dateTimeBetween('2023-01-01', '2023-12-31'),
            'cumplimiento' => $this->faker->randomElement([0,1]),            
        ];
    }
}
