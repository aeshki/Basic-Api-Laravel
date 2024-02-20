<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'pseudo' => 'admin',
            'password'=> Hash::make('Azerty80@'),
            'email'=> 'admin@test.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(80),
            'role_id' => 2
        ]);

        User::create([
            'pseudo' => 'user',
            'password'=> Hash::make('Azerty80@'),
            'email'=> 'user@test.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);

        User::factory()->count(8)->create();
    }
}
