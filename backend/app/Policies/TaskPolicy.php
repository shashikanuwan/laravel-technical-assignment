<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Task $task): bool
    {
        return $this->taskmManage($user, $task);
    }

    public function destroy(User $user, Task $task): bool
    {
        return $this->taskmManage($user, $task);
    }

    private function taskmManage(User $user, Task $task)
    {
        return $task->todo_list->user_id == $user->id;
    }
}
