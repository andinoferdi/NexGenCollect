<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan data contoh kategori
        Kategori::create(['nama_kategori' => 'Gambar']);
        Kategori::create(['nama_kategori' => 'Audio']);
        Kategori::create(['nama_kategori' => 'Video']);
        Kategori::create(['nama_kategori' => 'Dokumen']);
    }
}
