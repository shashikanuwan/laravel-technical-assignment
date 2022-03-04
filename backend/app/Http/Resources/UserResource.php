<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->fullName,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
        ];
    }
}
