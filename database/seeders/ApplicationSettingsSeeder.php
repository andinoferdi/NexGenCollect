<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApplicationSetting;

class ApplicationSettingsSeeder extends Seeder
{
    public function run()
    {
        ApplicationSetting::create([
            'nama_tim' => 'Andino Ferdiansah',
            'deskripsi_tim' => 'Fullstack Developer',
        ]);

        ApplicationSetting::create([
            'nama_tim' => 'Radit',
            'deskripsi_tim' => 'Data Analyst',
        ]);

        ApplicationSetting::create([
            'nama_tim' => 'Revika',
            'deskripsi_tim' => 'UI/UX Designer',
        ]);

        ApplicationSetting::create([
            'nama_tim' => 'Sherly',
            'deskripsi_tim' => 'Project Manager',
        ]);
    }
}
