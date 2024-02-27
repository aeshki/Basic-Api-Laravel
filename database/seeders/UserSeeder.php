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
            'pseudo' => 'Shxkja\'',
            'username' => 'shxkja',
            'password'=> Hash::make('ImTheMasterOfThisGame404@'),
            'email'=> 'shxkjadev@api.com',
            'remember_token' => Str::random(80),
            'role_id' => 2
        ]);

        User::factory()->count(rand(5, 18))->create();
    }
}
