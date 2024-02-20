<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeIds = Type::all()->pluck('id');

        $projects = [
            [
                'name' => 'Boolflix',
                'type_id' => rand(1, count($typeIds) - 2 ),
                'description' => 'A simple copy of Netflix',
                'day_to_make' => 3,
                'main_languages' => 'Vuejs 3.0 + Vite',
                'repo_url' => 'https://github.com/AlfredoCastrogiovanni/vite-boolflix.git'
            ],
            [
                'name' => 'Boolzapp',
                'type_id' => rand(1, count($typeIds) - 1 ),
                'description' => 'The simplest copy of Whatsapp',
                'day_to_make' => 3,
                'main_languages' => 'HTML + CSS + JS Vanilla',
                'repo_url' => 'https://github.com/AlfredoCastrogiovanni/vue-boolzapp.git'
            ],
            [
                'name' => 'MaxCoach',
                'type_id' => rand(1, count($typeIds) - 2 ),
                'description' => 'Simple clone of MaxCoach artist site.',
                'day_to_make' => 3,
                'main_languages' => 'Vuejs 3.0 + Vite',
                'repo_url' => 'https://github.com/AlfredoCastrogiovanni/proj-html-vuejs.git'
            ],
        ];

        foreach($projects as $project) {
            Project::create($project);
        }
    }
}
