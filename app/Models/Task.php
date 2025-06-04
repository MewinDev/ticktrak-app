<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubTask;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'details', 'priority', 'status', 'due_date'];

    /**
     * The subtask that belong to the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subTask(): BelongsToMany
    {
        return $this->belongsToMany(SubTask::class);
    }
}
