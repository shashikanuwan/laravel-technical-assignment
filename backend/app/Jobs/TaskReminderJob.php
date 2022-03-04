<?php

namespace App\Jobs;

use App\Models\Task;
use App\Notifications\TaskReminderNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TaskReminderJob implements ShouldQueue
{
    use  Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $tasks;

    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    public function handle()
    {
        foreach ($this->tasks as $task) {
            $task->todo_list->user->notify(new TaskReminderNotification($task));
            $task->update(['status' => Task::REMINDED]);
        }
    }
}
