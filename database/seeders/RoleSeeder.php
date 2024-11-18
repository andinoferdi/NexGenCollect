<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['nama_role' => 'Admin']);
        Role::create(['nama_role' => 'Kolektor']);
        Role::create(['nama_role' => 'Seniman']);
    }
}
