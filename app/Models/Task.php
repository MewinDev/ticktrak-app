<?php

namespace App\Models;

use App\Models\SubTask;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'details', 'priority', 'status', 'due_date'];

    /**
     * Get all of the subTasks for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subTasks(): HasMany
    {
        return $this->hasMany(SubTask::class);
    }
}
