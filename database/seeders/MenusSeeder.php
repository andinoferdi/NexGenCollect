<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusSeeder extends Seeder
{
    public function run()
    {
        DB::table('menus')->insert([
            'nama_menu' => 'Master',
            'icon_menu' => 'fas fa-cogs',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
