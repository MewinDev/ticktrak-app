<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class SubTask extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'is_complete', 'due_date', 'task_id'];

    /**
     * Get the task that owns the SubTask
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
