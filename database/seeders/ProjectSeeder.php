<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
            'name' => 'E-commerce Platform',
            'category' => 'Web Development',
            'image' => 'ecommerce.jpg',
            'link' => 'https://github.com/yourusername/ecommerce',
            'description' => 'A full-featured e-commerce platform built with Laravel and Vue.js',
        ]);

        Project::create([
            'name' => 'Task Management System',
            'category' => 'Web Development',
            'image' => 'taskmanager.jpg',
            'link' => 'https://github.com/yourusername/taskmanager',
            'description' => 'A task management system with real-time updates using Laravel and WebSockets',
        ]);

        Project::create([
            'name' => 'RESTful API',
            'category' => 'API Development',
            'image' => 'api.jpg',
            'link' => 'https://github.com/yourusername/api',
            'description' => 'A RESTful API built with Laravel Sanctum for authentication',
        ]);
    }
}
