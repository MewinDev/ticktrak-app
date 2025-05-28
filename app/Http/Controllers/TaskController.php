<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $table_task = Task::orderByRaw("CASE WHEN due_date IS NULL OR due_date = '' THEN 1 ELSE 0 END ASC")
            ->orderByRaw("FIELD(priority, 'high', 'medium', 'low')")
            ->orderBy('due_date', 'asc')
            ->paginate(5);

        $list_task = Task::all();

        return view('contents.tasks', compact('table_task', 'list_task'));
    }
}
