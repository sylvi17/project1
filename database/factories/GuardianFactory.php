<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
 */
class GuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'job'=>fake()->randomElement(['CEO','Teacher','Engineer','Bussinessman']),
            'email'=>fake()->unique()->safeEmail(),
            'telpon'=>fake()->phoneNumber(),
            'address'=>fake()->address(),
            'gender'=> fake()->randomElement(['Male','Female']),
            
        ];
    }
}
