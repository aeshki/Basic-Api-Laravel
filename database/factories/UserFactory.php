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
            'pseudo' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'color' => ltrim(fake()->safeHexColor(), '#'),
            'password' => Hash::make(fake()->password()),
            'remember_token' => Str::random(10),
        ];
    }
}