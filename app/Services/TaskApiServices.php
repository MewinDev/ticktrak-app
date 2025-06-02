<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskApiServices
{
    public function queryBuilder(Request $request) {

        $search = $request->query('search');

        $query = Task::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('details', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%")
                ->orWhere('priority', 'like', "%{$search}%")
                ->orWhereRaw("DATE_FORMAT(due_date, '%M %e, %Y') like ?", ["%{$search}%"]);
            });
        }

        $query->orderByRaw("CASE WHEN due_date IS NOT NULL THEN 0 ELSE 1 END")
        ->orderByRaw("CASE priority
                        WHEN 'high' THEN 0
                        WHEN 'medium' THEN 1
                        WHEN 'low' THEN 2
                        ELSE 3
                    END
                ")
        ->orderBy('due_date', 'asc');

        return $query;
    }

    public function getPaginatedTasks(Request $request, int $perPage) {
        return $this->queryBuilder($request)->paginate($perPage);
    }

    public function getAllTasks($request) {
        return $this->queryBuilder($request)->get();
    }
}
