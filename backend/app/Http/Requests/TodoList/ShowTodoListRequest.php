<?php

namespace App\Http\Requests\TodoList;

use Illuminate\Foundation\Http\FormRequest;

class ShowTodoListRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('show', $this->route('todo_list'));
    }

    public function rules()
    {
        return [];
    }
}
