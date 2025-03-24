<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run()
    {
        About::create([
            'title' => 'About Me',
            'summary' => 'A highly skilled and motivated Software Engineer/Laravel Developer with 3 years of experience in building and maintaining web applications using Laravel framework. Strong knowledge of PHP, MySQL, HTML, CSS, JavaScript, and software development principles. Experienced in building RESTful APIs and integrating third-party APIs. Possess excellent problem-solving and analytical skills, and able to work collaboratively in a team-oriented environment.',
            'birthday' => '1992',
            'nationality' => 'Palestinian',
            'phone' => '+970 59 928 5858',
            'city' => 'Gaza, Palestine',
            'age' => '31',
            'degree' => 'Bachelor',
            'email' => 'fahed9285@gmail.com',
            'image' => 'about.jpg',
            'freelance' => true,
        ]);
    }
}
