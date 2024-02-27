<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_id' => rand(1, Post::count()),
            'user_id' => rand(1, User::count()),
            'content' => fake()->paragraph(),
            'like' => fake()->boolean() ? rand(1, 2000) : 0,
        ];
    }
}
