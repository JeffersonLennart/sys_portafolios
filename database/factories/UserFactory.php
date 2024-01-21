<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'rol' => fake()->randomElement(['Docente', 'Docente,Revisor', 'Docente,Revisor,Administrador']),
            'activo' => fake()->randomElement([0, 1]),
            'telefono' => fake()->unique()->numerify('#########'),
            'codigo' => fake()->unique()->numerify('#######'),            
            'categoria' => fake()->randomElement(['PR-DE', 'PR-TC', 'AS-DE', 'AS-TC', 'AS-TP', 'AUX-TC', 'AUX-TP 10H', 'A1', 'B1', 'B2', 'B3', 'JP-20H', 'JP-TC', 'JP-10H', 'JP-20H']),
            'grado_academico' => fake()->randomElement(['Ingeniero', 'Magister', 'Doctor']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
