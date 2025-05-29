<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskApiServices
{
    public function queryBuilder(Request $request) {

        $search = $request->query('search');
        $status = $request->query('status');
        $priority = $request->query('priority');

        $query = Task::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('details', 'like', "%{$search}%")
                ->orWhere('priority', 'like', "%{$search}%")
                ->orWhereRaw("DATE_FORMAT(due_date, '%M %e, %Y') like ?", ["%{$search}%"]);
            });
        }

        if ($status) {
            $query->where('status', 'like', "%{$status}%");
        }

        if ($priority) {
            $query->where('priority', 'like', "%{$priority}%");
        }

        return $query;
    }

    public function getPaginatedTasks(Request $request, int $perPage) {
        return $this->queryBuilder($request)->paginate($perPage);
    }

    public function getAllTasks($request) {
        return $this->queryBuilder($request)->get();
    }
}
