<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingMenusSeeder extends Seeder
{
    public function run()
    {
        DB::table('setting_menus')->truncate();

        $settingMenus = [
            ['role_id' => 1, 'menu_id' => 1],  
            ['role_id' => 2, 'menu_id' => 1],  
            ['role_id' => 3, 'menu_id' => 1],  
        ];

        DB::table('setting_menus')->insert($settingMenus);
    }
}
