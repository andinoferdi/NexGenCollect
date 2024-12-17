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
            'foto_tim' => 'team_photos/Andino.png',

        ]);

        ApplicationSetting::create([
            'nama_tim' => 'Radit',
            'deskripsi_tim' => 'Data Analyst',
            'foto_tim' => 'team_photos/Radit.png',

        ]);

        ApplicationSetting::create([
            'nama_tim' => 'Revika',
            'deskripsi_tim' => 'UI/UX Designer',
            'foto_tim' => 'team_photos/Revika.png',

        ]);

        ApplicationSetting::create([
            'nama_tim' => 'Sherly',
            'deskripsi_tim' => 'Project Manager',
            'foto_tim' => 'team_photos/Sherly.png',
        ]);
    }
}
