<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusSeeder extends Seeder
{
    public function run()
    {
        Menu::create([
            'nama_menu' => 'Master',
            'icon_menu' => 'fas fa-cogs',
        ]);
    }
}
