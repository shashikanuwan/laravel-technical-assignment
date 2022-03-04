<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public const PENDING = 'pending';
    public const REMINDED = 'reminded';
    public const STARTED = 'started';
    public const COMPLETED = 'completed';

    protected $guarded = [];

    public function getDueDateAttribute($value)
    {
        return Carbon::parse($value)->format('M d, Y h:m a');
    }

    //relationships
    public function todo_list()
    {
        return $this->belongsTo(TodoList::class);
    }

    //scopes
    public function scopePending($query)
    {
        return $query->where('status', Task::PENDING)
            ->where('due_date', '<=', Carbon::now()->addMinutes(60)->toDateTimeString());
    }

    public function scopeStarted($query)
    {
        return $query->where('status', Task::REMINDED)
            ->where('due_date', '<=', Carbon::now()->toDateTimeString());
    }

    //actions
    public function markAsCompleted()
    {
        $this->completed_at = now();
        $this->status = $this::COMPLETED;
        $this->save();
    }
}
