<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $links = [
            [
                'setting_id' => 1, // Make sure this matches your setting ID
                'icon' => 'bx bxl-facebook',
                'link' => 'https://www.facebook.com/YourFacebookUsername',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'setting_id' => 1,
                'icon' => 'bx bxl-linkedin',
                'link' => 'https://www.linkedin.com/in/YourLinkedInUsername',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'setting_id' => 1,
                'icon' => 'bx bxl-instagram',
                'link' => 'https://www.instagram.com/YourInstagramUsername',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'setting_id' => 1,
                'icon' => 'bx bxl-github',
                'link' => 'https://github.com/YourGithubUsername',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'setting_id' => 1,
                'icon' => 'bx bxl-gitlab',
                'link' => 'https://gitlab.com/YourGitlabUsername',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'setting_id' => 1,
                'icon' => 'bx bxl-gmail',
                'link' => 'mailto:youremail@gmail.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        foreach ($links as $link) {
            Link::create($link);
        }
    }
}
