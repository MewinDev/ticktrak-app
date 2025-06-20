<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SubTaskRequest;
use App\Services\SubTaskServices;
use App\Models\SubTask;

class SubTaskApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, SubTaskServices $subTaskServices, Task $task)
    {
        $all_subtasks = $subTaskServices->getAllSubTasksByTaskId($request, $task);

        return response()->json([
            'all_subtasks' => $all_subtasks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubTaskRequest $request, Task $task): JsonResponse
    {
        $validate = $request->validated();
        $validate['task_id'] = $task->id;

        $subTasks = SubTask::create($validate);

        return response()->json([
            'message' => 'Sub-task Created Successfully',
            'subTasks' => $subTasks,
        ], 201);
    }

    public function updateMark(Request $request, Task $task, SubTask $subtask): JsonResponse
    {
        $subtask->is_complete = $request->boolean('is_complete');
        $subtask->save();

        return response()->json([
            'message' => 'Mark as Complete Successfully',
        ], 200);
    }

    public function destroy(Request $request, Task $task, SubTask $subtask): JsonResponse
    {
        $subtask->delete();

        return response()->json([
            'message' => "Sub-task Delete Successfully",
        ], 200);
    }

}
