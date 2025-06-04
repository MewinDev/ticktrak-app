<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubTaskController extends Controller
{
    public function store(Request $request, SubTaskServices $subTaskServices, $taskId)
    {
        $allSubTasks = $subTaskServices->getAllSubTasks($request, $taskId);

        return redirect()->route('tasks.show')->with('success', "Create Milestones Successfully!");
    }
}
