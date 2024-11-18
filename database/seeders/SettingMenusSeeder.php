<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SettingMenu;

class SettingMenusSeeder extends Seeder
{
    public function run()
    {
        SettingMenu::create(['role_id' => 1, 'menu_id' => 1]);
        SettingMenu::create(['role_id' => 2, 'menu_id' => 1]);
        SettingMenu::create(['role_id' => 3, 'menu_id' => 1]);
    }
}
