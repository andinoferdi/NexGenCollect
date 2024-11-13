<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSubmenusSeeder extends Seeder
{
    public function run()
    {
        DB::table('setting_submenus')->truncate();

        // Menambahkan data ke setting_submenus
        DB::table('setting_submenus')->insert([

            // Admin (Role 1) bisa mengakses semua submenu
            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 1],  // User
            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 2],  // Role
            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 3],  // Menu
            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 4],  // Setting Menu
            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 5],  // Sub Menu
            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 6],  // Sub Menu

            // Kolektor (Role 2) hanya bisa mengakses "User" dan "Role"
            ['role_id' => 2, 'menu_id' => 1, 'submenu_id' => 1],  // User
            ['role_id' => 2, 'menu_id' => 1, 'submenu_id' => 2],  // Role

            // Seniman (Role 3) hanya bisa mengakses "Menu" dan "Setting Menu"
            ['role_id' => 3, 'menu_id' => 1, 'submenu_id' => 3],  // Menu
            ['role_id' => 3, 'menu_id' => 1, 'submenu_id' => 4],  // Setting Menu
        ]);
    }
}
