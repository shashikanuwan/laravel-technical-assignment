<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\TaskCompletedRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskCompletedController extends Controller
{
    public function __invoke(TaskCompletedRequest $request, Task $task)
    {
        $task->markAsCompleted();

        return new TaskResource($task);
    }
}
