<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubTaskController extends Controller
{
    public function create(Request $request, SubTaskServices $subTaskServices)
    {
        $allSubTasks = $subTaskServices->getAllSubTasks($request);

        return redirect()->route('tasks.show')->with('success', "Create Milestones Successfully!");
    }
}
