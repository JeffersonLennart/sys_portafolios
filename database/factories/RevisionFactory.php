<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Revision>
 */
class RevisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_revision' => $this->faker->randomElement([1, 2, 3]),
            'fecha_revision' => $this->faker->dateTimeBetween('2023-01-01', '2023-12-31'),
            'observaciones' => $this->faker->text,
        ];
    }
}
