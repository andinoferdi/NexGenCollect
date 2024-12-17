<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin',
            'password' => Hash::make('admin@admin'),
            'foto' => 'fotos/Cover1.jpg',

            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Kolektor User',
            'email' => 'kolektor@kolektor',
            'password' => Hash::make('kolektor@kolektor'),
            'foto' => 'fotos/Cover2.jpg',
            
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Seniman User',
            'email' => 'seniman@seniman',
            'password' => Hash::make('seniman@seniman'),
            'foto' => 'fotos/Cover3.jpg',

            'role_id' => 3,
        ]);
    }
}
