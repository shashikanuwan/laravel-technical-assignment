<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->route('task'));
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'status' => 'sometimes',
            'description' => 'sometimes',
            'due_date' => 'required|date_format:Y-m-d|after:yesterday',
        ];
    }
}
