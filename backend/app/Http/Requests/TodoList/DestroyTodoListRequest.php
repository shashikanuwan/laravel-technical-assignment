<?php

namespace App\Http\Requests\TodoList;

use Illuminate\Foundation\Http\FormRequest;

class DestroyTodoListRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('destroy', $this->route('todo_list'));
    }

    public function rules()
    {
        return [];
    }
}
