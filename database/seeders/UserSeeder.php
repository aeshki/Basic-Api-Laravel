<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'pseudo' => 'admin',
            'username' => 'toto',
            'password'=> Hash::make('Azerty80@'),
            'email'=> 'admin@test.fr',
            'remember_token' => Str::random(80),
            'role_id' => 2
        ]);

        User::create([
            'pseudo' => 'user',
            'username' => 'toto2',
            'password'=> Hash::make('Azerty80@0'),
            'email'=> 'user@test.fr',
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);

        User::factory()->count(8)->create();
    }
}
