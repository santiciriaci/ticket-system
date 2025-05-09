<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // usuario normal
        User::updateOrCreate(
            ['email' => 'useree@example.com'],
            [
                'name' => 'Usuario Normal',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );

        // usuario agente
        User::updateOrCreate(
            ['email' => 'agentee@example.com'],
            [
                'name' => 'Agente Soporte',
                'password' => Hash::make('password'),
                'role' => 'agent',
            ]
        );
    }
}
