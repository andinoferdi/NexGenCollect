<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@admin',
                'password' => Hash::make('admin@admin'),
                'role_id' => 1, // Admin role
            ],
            [
                'name' => 'Kolektor User',
                'email' => 'kolektor@kolektor',
                'password' => Hash::make('kolektor@kolektor'),
                'role_id' => 2, // Kolektor role
            ],
            [
                'name' => 'Seniman User',
                'email' => 'seniman@seniman',
                'password' => Hash::make('seniman@seniman'),
                'role_id' => 3, // Seniman role
            ],
        ]);
    }
}
