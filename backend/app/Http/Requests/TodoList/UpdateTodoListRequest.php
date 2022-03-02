<?php

namespace App\Http\Requests\TodoList;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoListRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->route('todo_list'));
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
