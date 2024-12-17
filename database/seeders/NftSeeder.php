<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nft;

class NftSeeder extends Seeder
{
    public function run()
    {
        Nft::create([
            'nama_nft' => 'Hangar 18',
            'file' => 'nft_files/Hangar 18 - Remastered.mp3',
            'foto' => 'nft_photos/Cover1.jpg',
            'deskripsi' => 'Hangar 18 - Remastered adalah NFT audio edisi terbatas yang menawarkan pengalaman mendalam bagi pendengarnya. 
            Sebuah kombinasi antara seni audio dan teknologi blockchain, menghadirkan karya yang otentik dan tak tergantikan.',
            'kategori_id' => 2,
            'user_id' => 1,
            'harga_awal' => 150000,
            'harga_akhir' => null,
            'status' => 'available',
        ]);

        Nft::create([
            'nama_nft' => 'So Far, So Good... So What!',
            'file' => 'nft_files/Cover2.jpg',
            'foto' => 'nft_photos/Cover2.jpg',
            'deskripsi' => 'So Far, So Good... So What!" adalah album ketiga dari band thrash metal asal Amerika, Megadeth, yang dirilis pada tahun 1988. 
            Album ini menampilkan perpaduan keras antara riff gitar cepat, solo gitar yang kompleks, 
            dan lirik yang penuh dengan tema politik, sosial, dan perang.',
            'kategori_id' => 1,
            'user_id' => 3,
            'harga_awal' => 10000,
            'harga_akhir' => null,
            'status' => 'available',
        ]);

        Nft::create([
            'nama_nft' => 'Video Acumulaka',
            'file' => 'nft_files/Acumalaka.mp4',
            'foto' => 'nft_photos/Cover3.jpg',
            'deskripsi' => 'Acumulaka" adalah meme yang berasal dari video TikTok, menampilkan seseorang yang dengan ekspresif mengatakan "Acumulaka" 
            sambil menari atau melakukan gerakan lucu. Meme ini sering digunakan untuk menggambarkan situasi yang tiba-tiba, 
            menghibur, atau tidak terduga dengan cara yang kocak.',
            'kategori_id' => 3,
            'user_id' => 1,
            'harga_awal' => 30000,
            'harga_akhir' => null,
            'status' => 'available',
        ]);
    }
}
