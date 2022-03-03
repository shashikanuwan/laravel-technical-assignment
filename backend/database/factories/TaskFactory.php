<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\TodoList;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition()
    {
        $dueDate = Carbon::parse($this->faker->dateTimeBetween('-2 months', '+1 months'));

        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph,
            'status' =>  $this->faker->randomElement(array(Task::PENDING, Task::STARTED, Task::COMPLETED)),
            'due_date' => $dueDate,
            'todo_list_id' => TodoList::factory(),
        ];
    }
}
