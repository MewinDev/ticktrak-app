<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskApiRequest;
use App\Models\Task;
use App\Services\TaskApiServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    public function index(Request $request, TaskApiServices $taskApiServices)
    {
        $perPage = $request->query('per_page');

        if ($perPage === 'All' || $perPage == 0) {
            $paginated_tasks = $taskApiServices->getAllTasks($request);

            return response()->json([
                'paginated_tasks' => [
                    'data' => $paginated_tasks,
                    'current_page' => 1,
                    'last_page' => 1,
                    'per_page' => count($paginated_tasks),
                    'total' => count($paginated_tasks),
                ],
                'all_tasks' => $paginated_tasks,
            ]);
        }

        $paginated_tasks = $taskApiServices->getPaginatedTasks($request, $perPage);
        $allTasks = $taskApiServices->getAllTasks($request);

        return response()->json([
            'paginated_tasks' => $paginated_tasks,
            'all_tasks' => $allTasks,
        ]);
    }

    public function store(TaskApiRequest $request): JsonResponse
    {
        $task = Task::create($request->validated());

        return response()->json([
            'message' => 'Task Created Successfully',
            'task' => $task,
        ], 201);
    }
}
