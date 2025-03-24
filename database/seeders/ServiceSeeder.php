<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::create([
            'service' => 'Web Development',
            'icon' => 'bx bx-code-alt',
            'description' => 'Full-stack web development using Laravel, Vue.js, and other modern technologies.',
        ]);

        Service::create([
            'service' => 'Backend Development',
            'icon' => 'bx bx-server',
            'description' => 'Building robust and scalable backend systems with Laravel and MySQL.',
        ]);

        Service::create([
            'service' => 'API Development',
            'icon' => 'bx bx-link',
            'description' => 'Creating RESTful APIs and integrating third-party services.',
        ]);

        Service::create([
            'service' => 'Database Design',
            'icon' => 'bx bx-data',
            'description' => 'Designing and optimizing database schemas for performance and scalability.',
        ]);
    }
}
