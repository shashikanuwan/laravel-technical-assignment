<?php

namespace App\Jobs;

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

    private $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function handle()
    {
        $this->task->todo_list->user->notify(new TaskReminderNotification($this->task));
    }
}
