<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $tasks = Task::all();
        return view('contents.tasks', compact('tasks'));
    }

    public function show(string $taskId) {

        $task = Task::findOrFail($taskId);
        $subTasks = $task->subTasks;
        return view('contents.tasks.subtasks', compact('task', 'subTasks'));
    }
}
