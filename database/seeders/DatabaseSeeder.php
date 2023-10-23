<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProjectType;
use App\Models\Project;
use App\Models\Board;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::pluck("id");
        $t = ProjectType::pluck("id");

        $projects = Project::factory(10)
            ->make()
            ->each(function ($project) use ($users, $t) {
                $project->user_id = $users->random();
                $project->project_type_id = $t->random();
                $project->save();
            })
            ->pluck("id");

        $boards = Board::factory(15)
            ->make()
            ->each(function ($board) use ($projects, $users) {
                $board->user_id = $users->random();
                $board->project_id = $projects->random();
                $board->save();
            })
            ->pluck("id");

        $tasks = Task::factory(20)
            ->make()
            ->each(function ($task) use ($users, $boards) {
                $task->user_id = $users->random();
                $task->board_id = $boards->random();
                $task->save();
            });
    }
}
