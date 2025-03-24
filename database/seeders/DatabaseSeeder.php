<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            PositionSeeder::class,
            AboutSeeder::class,
            EducationSeeder::class,
            ExperienceSeeder::class,
            ServiceSeeder::class,
            SkillsCategorySeeder::class,
            ProjectSeeder::class,
            AdminSeeder::class,
            LinkSeeder::class,
        ]);
    }
}
