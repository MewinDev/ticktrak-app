<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubTaskRequest;
use App\Models\SubTask;

class SubTaskController extends Controller
{
    public function store(SubTaskRequest $request, $taskId)
    {
        $validated = $request->validated();
        $validated['task_id'] = $taskId;
        
        SubTask::create($validated);
        
        return redirect()->route('tasks.show', $taskId)->with('success', "Create Milestones Successfully!");
    }
}
