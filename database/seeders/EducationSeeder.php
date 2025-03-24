<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run()
    {
        Education::create([
            'university' => 'Islamic University of Gaza',
            'faculty' => 'Computer Engineering',
            'major' => 'Computer Engineering',
            'from' => '2010-09-01',
            'to' => '2015-06-30',
            'grade' => 'Bachelor',
        ]);
    }
}
