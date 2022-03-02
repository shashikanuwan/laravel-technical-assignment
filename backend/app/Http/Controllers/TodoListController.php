<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoList\DestroyTodoListRequest;
use App\Http\Requests\TodoList\ShowTodoListRequest;
use App\Http\Requests\TodoList\StoreTodoListRequest;
use App\Http\Requests\TodoList\UpdateTodoListRequest;
use App\Http\Resources\TodoListResource;
use App\Models\TodoList;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    public function index()
    {
        $lists = auth()->user()->todo_lists;
        return TodoListResource::collection($lists);
    }

    public function show(ShowTodoListRequest $request, TodoList $todo_list)
    {
        return new TodoListResource($todo_list);
    }

    public function store(StoreTodoListRequest $request, TodoList $todo_list)
    {
        $todo_list = auth()->user()
            ->todo_lists()
            ->create($request->validated());

        return new TodoListResource($todo_list);
    }

    public function update(UpdateTodoListRequest $request, TodoList $todo_list)
    {
        $todo_list->update($request->validated());

        return new TodoListResource($todo_list);
    }

    public function destroy(DestroyTodoListRequest $request, TodoList $todo_list)
    {
        $todo_list->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
