<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TodoList;
use Illuminate\Database\Seeder;

class TodoListSeeder extends Seeder
{
    public function run()
    {
        TodoList::factory(4)
            ->has(Task::factory()->count(3))
            ->create();
    }
}
