<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class FetchTaskRequest extends FormRequest
{
    public function authorize()
    {
        return $this->route('todo_list')->user_id == $this->user()->id;
    }

    public function rules()
    {
        return [];
    }
}
