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

        $allTask = Task::all();

        return view('contents.tasks', compact('allTask'));
    }
}
