<?php

namespace App\Services;

use App\Models\SubTask;
use Illuminate\Http\Request;

class SubTaskServices
{
    public function queryBuilder(Request $request) {

        $search = $request->query('search');

        $query = SubTask::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('details', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%")
                ->orWhere('priority', 'like', "%{$search}%")
                ->orWhereRaw("DATE_FORMAT(due_date, '%M %e, %Y') like ?", ["%{$search}%"]);
            });
        }

        return $query;
    }

    public function getAllSubTasks($request) {
        return $this->queryBuilder($request)->get();
    }
}
