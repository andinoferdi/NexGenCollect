<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmenusSeeder extends Seeder
{
    public function run()
    {
        DB::table('submenus')->insert([
            ['menu_id' => 1, 'nama_submenu' => 'User', 'link_submenu' => 'user'],
            ['menu_id' => 1, 'nama_submenu' => 'Role', 'link_submenu' => 'role'],
            ['menu_id' => 1, 'nama_submenu' => 'Menu', 'link_submenu' => 'menu'],
            ['menu_id' => 1, 'nama_submenu' => 'Setting Menu', 'link_submenu' => 'setting_menus'],
            ['menu_id' => 1, 'nama_submenu' => 'Sub Menu', 'link_submenu' => 'submenu'],
        ]);
    }
}
