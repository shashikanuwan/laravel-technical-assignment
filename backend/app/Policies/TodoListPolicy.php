<?php

namespace App\Policies;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoListPolicy
{
    use HandlesAuthorization;

    public function show(User $user, TodoList $todo_list): bool
    {
        return $this->todomManage($user, $todo_list);
    }

    public function update(User $user, TodoList $todo_list): bool
    {
        return $this->todomManage($user, $todo_list);
    }

    public function destroy(User $user, TodoList $todo_list): bool
    {
        return $this->todomManage($user, $todo_list);
    }

    private function todomManage(User $user, TodoList $todo_list)
    {
        return $todo_list->user_id == $user->id;
    }
}
