<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        Kategori::create(['nama_kategori' => 'Gambar']);
        Kategori::create(['nama_kategori' => 'Audio']);
        Kategori::create(['nama_kategori' => 'Video']);
        Kategori::create(['nama_kategori' => 'Dokumen']);
    }
}
