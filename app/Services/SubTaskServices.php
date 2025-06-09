<?php

namespace App\Services;

use App\Models\SubTask;
use Illuminate\Http\Request;

class SubTaskServices
{
    public function queryBuilder(Request $request, $taskId) {

        $search = $request->query('search');

        $query = SubTask::query()->where('task_id', $taskId);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('description', 'like', "%{$search}%")
                ->orWhereRaw("DATE_FORMAT(due_date, '%M %e, %Y') like ?", ["%{$search}%"]);
            });
        }

        $query->orderByRaw('CASE WHEN due_date IS NOT NULL THEN 0 ELSE 1 END')->orderBy('due_date', 'asc');

        return $query;
    }

    public function getAllSubTasksByTaskId($request, $taskId) {
        return $this->queryBuilder($request, $taskId)->get();
    }
}
