<?php

namespace App\Console\Commands;

use App\Jobs\TaskStartedJob;
use App\Models\Task;
use Illuminate\Console\Command;

class TaskStartedCommand extends Command
{
    protected $signature = 'task:stated';

    protected $description = 'Update status as soon as the user starts task';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $tasks = Task::query()
            ->started()
            ->get();

        TaskStartedJob::dispatch($tasks);
    }
}
