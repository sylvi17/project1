<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'availSubject'=>fake()->randomElement(['Bahasa Inggris', 'Bahasa jepang', 'Website Dev', 'Mobile Dev', 'IoT']),
            'desc'=>fake()->randomElement(['Subject Pilihan', 'Subject Wajib'])
        ];
    }
}
