<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run()
    {
        $positions = [
            'Software Engineer',
            'Backend Developer',
            'FullStack Laravel Developer',
            'Systems Analyst'
        ];

        foreach ($positions as $position) {
            Position::create([
                'position' => $position,
                'setting_id' => 1 // This will link to the first setting we created
            ]);
        }
    }
}
