<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskApiRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $priority = $request->query('priority');
        $perPage = $request->query('per_page');

        $query = Task::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('details', 'like', "%{$search}%")
                ->orWhere('priority', 'like', "%{$search}%")
                ->orWhereRaw("DATE_FORMAT(due_date, '%M %e, %Y') like ?", ["%{$search}%"]);
            });
        }

        if ($priority) {
            $query->where('priority', 'like', "%{$priority}%");
        }

        // Clone query before pagination to reuse for all_tasks
        $allTasksQuery = clone $query;

        if ($perPage === 'All' || $perPage == 0) {
            $paginated_tasks = $query->get();

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

        $paginated_tasks = $query->paginate((int) $perPage);
        $allTasks = $allTasksQuery->get(); // Use cloned query

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
