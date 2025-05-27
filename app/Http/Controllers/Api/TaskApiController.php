<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskApiRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskApiController extends Controller
{
    public function store(TaskApiRequest $request): JsonResponse
    {
        $task = Task::create($request->validated());

        return response()->json([
            'message' => 'Task Created Successfully',
            'task' => $task,
        ], 201);
    }
}
