<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingMenusSeeder extends Seeder
{
    public function run()
    {
        // Hapus semua data sebelumnya
        DB::table('setting_menus')->truncate();

        // Menentukan role dan akses menu serta submenu yang dimiliki
        $menuAssignments = [
            1 => [ // Admin
                'menus' => [
                    1 => [null, 1, 2, 3, 4, 5], // menu_id => [submenu_id, ...]
                ],
            ],
            2 => [ // Kolektor
                'menus' => [
                    1 => [null, 1, 3], // Kolektor memiliki akses terbatas
                ],
            ],
            3 => [ // Seniman
                'menus' => [
                    1 => [null, 2, 4], // Seniman memiliki akses ke beberapa submenu
                ],
            ],
        ];

        foreach ($menuAssignments as $roleId => $assignment) {
            foreach ($assignment['menus'] as $menuId => $submenuIds) {
                foreach ($submenuIds as $submenuId) {
                    DB::table('setting_menus')->insert([
                        'role_id' => $roleId,
                        'menu_id' => $menuId,
                        'submenu_id' => $submenuId,
                    ]);
                }
            }
        }
    }
}
