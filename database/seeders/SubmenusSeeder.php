<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmenusSeeder extends Seeder
{
    public function run()
    {
        DB::table('submenus')->insert([
            ['menu_id' => 1, 'nama_submenu' => 'User', 'link_submenu' => 'user', 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 1, 'nama_submenu' => 'Role', 'link_submenu' => 'role', 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 1, 'nama_submenu' => 'Menu', 'link_submenu' => 'menu', 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 1, 'nama_submenu' => 'Setting Menu', 'link_submenu' => 'setting_menus', 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 1, 'nama_submenu' => 'Sub Menu', 'link_submenu' => 'submenu', 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 1, 'nama_submenu' => 'Setting Sub Menu', 'link_submenu' => 'setting_submenus', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
