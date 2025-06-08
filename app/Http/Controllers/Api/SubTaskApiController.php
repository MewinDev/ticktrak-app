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
    public function index(Request $request, SubTaskServices $subTaskServices, string $taskId)
    {
        $all_subtasks = $subTaskServices->getAllSubTasksByTaskId($request, $taskId);

        return response()->json([
            'all_subtasks' => $all_subtasks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubTaskRequest $request, $taskId): JsonResponse
    {
        $validate = $request->validated();
        $validate['task_id'] = $taskId;

        $subTasks = SubTask::create($validate);
        
        return response()->json([
            'message' => 'SubTask Created Successfully',
            'subTasks' => $subTasks,
        ]);
    }

}
