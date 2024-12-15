<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SettingSubmenu;

class SettingSubmenusSeeder extends Seeder
{
    public function run()
    {
        SettingSubmenu::create(['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 1]);
        SettingSubmenu::create(['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 2]);
        SettingSubmenu::create(['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 3]);
        SettingSubmenu::create(['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 4]);
        SettingSubmenu::create(['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 5]);
        SettingSubmenu::create(['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 6]);
        SettingSubmenu::create(['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 7]);
        SettingSubmenu::create(['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 7]);
        SettingSubmenu::create(['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 8]);
        SettingSubmenu::create(['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 9]);
        SettingSubmenu::create(['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 10]);
        SettingSubmenu::create(['role_id' => 1, 'menu_id' => 1, 'submenu_id' => 11]);

        SettingSubmenu::create(['role_id' => 2, 'menu_id' => 1, 'submenu_id' => 1]);
        SettingSubmenu::create(['role_id' => 2, 'menu_id' => 1, 'submenu_id' => 2]);

        SettingSubmenu::create(['role_id' => 3, 'menu_id' => 1, 'submenu_id' => 3]);
        SettingSubmenu::create(['role_id' => 3, 'menu_id' => 1, 'submenu_id' => 4]);
    }
}
