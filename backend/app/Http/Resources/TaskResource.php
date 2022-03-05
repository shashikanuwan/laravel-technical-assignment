<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'todo_list' => $this->todo_list->name,
            'description' => $this->description,
            'status' => $this->status,
            'due_date' => $this->due_date,
            'completed_at' => $this->completed_at,

        ];
    }
}
