<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Submenu;

class SubmenusSeeder extends Seeder
{
    public function run()
    {
        Submenu::create(['menu_id' => 1, 'nama_submenu' => 'Menu', 'link_submenu' => 'menu']);
        Submenu::create(['menu_id' => 1, 'nama_submenu' => 'Setting Menu', 'link_submenu' => 'setting_menus']);
        Submenu::create(['menu_id' => 1, 'nama_submenu' => 'Sub Menu', 'link_submenu' => 'submenu']);
        Submenu::create(['menu_id' => 1, 'nama_submenu' => 'Setting Sub Menu', 'link_submenu' => 'setting_submenus']);
        Submenu::create(['menu_id' => 1, 'nama_submenu' => 'User', 'link_submenu' => 'user']);
        Submenu::create(['menu_id' => 1, 'nama_submenu' => 'Role', 'link_submenu' => 'role']);
        Submenu::create(['menu_id' => 1, 'nama_submenu' => 'Kategori', 'link_submenu' => 'kategori']);
        Submenu::create(['menu_id' => 1, 'nama_submenu' => 'NFT', 'link_submenu' => 'nft']);
        Submenu::create(['menu_id' => 1, 'nama_submenu' => 'Verifikasi User', 'link_submenu' => 'verifikasi']);
        Submenu::create(['menu_id' => 1, 'nama_submenu' => 'Apllication Settings', 'link_submenu' => 'application_settings']);
    }
}
