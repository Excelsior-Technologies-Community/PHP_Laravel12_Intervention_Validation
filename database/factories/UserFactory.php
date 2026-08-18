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
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),

            'email' => fake()->unique()->safeEmail(),

            'password' => Hash::make('Password@123'),

            'phone' => fake()->numerify('##########'),

            'age' => fake()->numberBetween(18, 70),

            'employment_status' => 'employed',

            'company_name' => fake()->company(),

            'bio' => fake()->optional()->paragraph(),

            'email_verified_at' => now(),

            'remember_token' => Str::random(10),
        ];
    }
}