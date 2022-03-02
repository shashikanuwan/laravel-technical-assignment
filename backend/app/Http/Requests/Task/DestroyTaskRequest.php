<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class DestroyTaskRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('destroy', $this->route('task'));
    }

    public function rules()
    {
        return [];
    }
}
