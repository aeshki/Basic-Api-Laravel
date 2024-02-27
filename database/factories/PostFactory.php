<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{
    public function definition(): array
    {
        $fakerTags = function($count) {
            if (fake()->boolean) return null;

            $tags = [];
            
            for ($i = 1; $i <= rand(1, $count); $i++) {
                $tags[] = [
                    'name' => fake()->word()
                ];
            }

            return $tags;
        };

        return [
            'user_id' => rand(1, User::count()),
            'is_private' => fake()->boolean(),
            'title' => fake()->title(),
            'description' => fake()->paragraph(),
            'tags' => $fakerTags(3),
        ];
    }
}