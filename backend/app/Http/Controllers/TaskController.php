<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\DestroyTaskRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Models\TodoList;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function index(TodoList $todo_list)
    {
        $tasks = $todo_list->tasks;

        return TaskResource::collection($tasks);
    }

    public function store(StoreTaskRequest $request, TodoList $todo_list)
    {
        $task = $todo_list->tasks()->create($request->validated());
        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return new TaskResource($task);
    }

    public function destroy(DestroyTaskRequest $request, Task $task)
    {
        $task->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
