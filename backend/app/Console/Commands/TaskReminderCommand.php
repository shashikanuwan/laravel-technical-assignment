<?php

namespace App\Console\Commands;

use App\Jobs\TaskReminderJob;
use App\Models\Task;
use Illuminate\Console\Command;

class TaskReminderCommand extends Command
{
    protected $signature = 'reminder:send';

    protected $description = 'Send task reminder emails to users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $tasks = Task::query()
            ->pending()
            ->get();

        TaskReminderJob::dispatch($tasks);
    }
}
