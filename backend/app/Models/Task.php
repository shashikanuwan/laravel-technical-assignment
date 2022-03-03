<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public const PENDING = 'pending';
    public const STARTED = 'started';
    public const COMPLETED = 'completed';

    protected $guarded = [];

    public function todo_list()
    {
        return $this->belongsTo(TodoList::class);
    }

    public function getDueDateAttribute($value)
    {
        return Carbon::parse($value)->format('M d, Y h:m a');
    }

    public function scopePending($query)
    {
        return $query->where('status', Task::PENDING)
            ->where('due_date', '<', Carbon::now()->addMinutes(61)->toDateTimeString());
    }
}
