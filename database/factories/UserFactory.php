<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->optional(0.8)->numerify('##########'), // 80% chance of having a phone
            'age' => fake()->numberBetween(18, 100),
            'bio' => fake()->optional(0.7)->paragraph(), // 70% chance of having a bio
            // Remove authentication fields since we're not using them
        ];
    }
}