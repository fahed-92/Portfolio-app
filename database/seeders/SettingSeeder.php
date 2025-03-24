<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'name' => 'Fahed AlJghamy',
            'photo' => 'profile.jpg',
        ]);
    }
}
