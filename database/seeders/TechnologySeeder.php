<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name' => 'HTML',
                'img_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg'
            ],
            [
                'name' => 'CSS',
                'img_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg'
            ],
            [
                'name' => 'Boostrap',
                'img_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/bootstrap/bootstrap-plain-wordmark.svg'
            ],
            [
                'name' => 'JavaScript',
                'img_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg'
            ],
            [
                'name' => 'VueJs',
                'img_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/vuejs/vuejs-original-wordmark.svg'
            ],
            [
                'name' => 'PHP',
                'img_url' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg'
            ],
        ];

        foreach($technologies as $technology) {
            Technology::create($technology);
        }
    }
}
