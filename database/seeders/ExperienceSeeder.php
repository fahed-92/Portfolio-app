<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run()
    {
        Experience::create([
            'position' => 'Full Stack Laravel Developer',
            'company' => 'Freelancer',
            'from_year' => '2022',
            'to_year' => 'Present',
            'description' => '<ul>
                <li>Developed and maintained web applications using Laravel framework.</li>
                <li>Implemented RESTful APIs and integrated third-party services.</li>
                <li>Worked with MySQL databases and optimized database queries.</li>
                <li>Collaborated with clients to understand requirements and deliver solutions.</li>
                <li>Used Git for version control and project management.</li>
            </ul>',
        ]);

        Experience::create([
            'position' => 'Backend Developer',
            'company' => 'Upwork',
            'from_year' => '2020',
            'to_year' => '2022',
            'description' => '<ul>
                <li>Built and maintained backend systems using Laravel.</li>
                <li>Developed APIs for mobile applications.</li>
                <li>Implemented authentication and authorization systems.</li>
                <li>Worked with various databases including MySQL and MongoDB.</li>
                <li>Collaborated with remote teams using agile methodologies.</li>
            </ul>',
        ]);

        Experience::create([
            'position' => 'Software Engineer',
            'company' => 'Local Company',
            'from_year' => '2018',
            'to_year' => '2020',
            'description' => '<ul>
                <li>Developed web applications using PHP and Laravel.</li>
                <li>Created and maintained database schemas.</li>
                <li>Implemented user authentication and authorization.</li>
                <li>Worked on both frontend and backend development.</li>
                <li>Participated in code reviews and team meetings.</li>
            </ul>',
        ]);
    }
}
