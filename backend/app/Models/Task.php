<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public const STARTED = 'started';
    public const PENDING = 'pending';
    public const NOT_STARTED = 'not_started';
    public const COMPLETED = 'completed';

    protected $guarded = [];

    public function todo_list()
    {
        return $this->belongsTo(TodoList::class);
    }
}
