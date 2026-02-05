<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Maak 25 projecten aan, elk met minimaal 2 tasks
        Project::factory()
            ->count(25)
            ->hasTasks(2)  // Magic method: gebruikt de tasks() relatie in Project model
            ->create();
    }
}
