<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoListResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray([
            'name' => $this->name,
            'created_at' => $this->created_at->diffForHumans()
        ]);
    }
}
