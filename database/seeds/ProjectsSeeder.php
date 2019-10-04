<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Project::count() < 1) {
            Project::insert([
                ['project_name' => 'Project #1'],
                ['project_name' => 'Project #2'],
                ['project_name' => 'Project #3'],
                ['project_name' => 'Project #4'],
                ['project_name' => 'Project #5'],
            ]);
        }
    }
}
