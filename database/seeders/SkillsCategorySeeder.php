<?php

namespace Database\Seeders;

use App\Models\SkillsCategory;
use Illuminate\Database\Seeder;

class SkillsCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Programming Languages',
                'skills' => [
                    ['skill' => 'PHP', 'percentage' => 90],
                    ['skill' => 'JavaScript', 'percentage' => 85],
                    ['skill' => 'HTML/CSS', 'percentage' => 80],
                ]
            ],
            [
                'name' => 'Frameworks & Tools',
                'skills' => [
                    ['skill' => 'Laravel', 'percentage' => 90],
                    ['skill' => 'Vue.js', 'percentage' => 75],
                    ['skill' => 'Git', 'percentage' => 85],
                ]
            ],
            [
                'name' => 'Databases',
                'skills' => [
                    ['skill' => 'MySQL', 'percentage' => 85],
                    ['skill' => 'MongoDB', 'percentage' => 70],
                ]
            ],
        ];

        foreach ($categories as $category) {
            $skillsCategory = SkillsCategory::create([
                'name' => $category['name']
            ]);

            foreach ($category['skills'] as $skill) {
                $skillsCategory->Skills()->create($skill);
            }
        }
    }
}
