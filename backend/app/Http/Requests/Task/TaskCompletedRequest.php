<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskCompletedRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->route('task'));
    }

    public function rules()
    {
        return [];
    }
}
