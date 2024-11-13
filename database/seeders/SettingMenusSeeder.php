<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingMenusSeeder extends Seeder
{
    public function run()
    {
        DB::table('setting_menus')->truncate();

        // Data untuk role_id dan menu_id yang ingin disetting
        $settingMenus = [
            // Role 1 (Admin) - Admin dapat mengakses semua menu
            ['role_id' => 1, 'menu_id' => 1],  // Hanya menu "Master"

            // Role 2 (Kolektor) - Kolektor hanya dapat mengakses "Master"
            ['role_id' => 2, 'menu_id' => 1],  // Hanya menu "Master"

            // Role 3 (Seniman) - Seniman hanya dapat mengakses "Master"
            ['role_id' => 3, 'menu_id' => 1],  // Hanya menu "Master"
        ];

        // Menambahkan semua data ke dalam tabel setting_menus
        DB::table('setting_menus')->insert($settingMenus);
    }
}
