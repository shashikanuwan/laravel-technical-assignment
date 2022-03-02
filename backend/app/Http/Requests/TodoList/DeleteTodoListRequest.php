<?php

namespace App\Http\Requests\TodoList;

use Illuminate\Foundation\Http\FormRequest;

class DeleteTodoListRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('delete', $this->route('todo_list'));
    }

    public function rules()
    {
        return [];
    }
}
