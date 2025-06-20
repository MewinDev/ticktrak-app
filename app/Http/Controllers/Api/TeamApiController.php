<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Teams\Team;
use Illuminate\Http\Request;

class TeamApiController extends Controller
{
    public function index() {
        return auth()->user()->joinedTeams()->with('owner')->get();
    }

    public function store(TeamRequest $request) {
        $team = Team::create($request->validated());

        return response()->json([
            'message' => 'Task Created Successfully',
            'task' => $task,
        ], 201);
    }
}
