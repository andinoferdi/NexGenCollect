<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSubmenusSeeder extends Seeder
{
    public function run()
    {
        DB::table('setting_submenus')->truncate();

        DB::table('setting_submenus')->insert([

            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 1],  
            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 2],  
            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 3],  
            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 4],  
            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 5],  
            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 6],  
            ['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 7],  

            ['role_id' => 2, 'menu_id' => 1, 'submenu_id' => 1],  
            ['role_id' => 2, 'menu_id' => 1, 'submenu_id' => 2],  

            ['role_id' => 3, 'menu_id' => 1, 'submenu_id' => 3],  
            ['role_id' => 3, 'menu_id' => 1, 'submenu_id' => 4],  
        ]);
    }
}
