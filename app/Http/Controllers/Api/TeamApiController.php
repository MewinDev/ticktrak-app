<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Teams\Team;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeamApiController extends Controller
{
    public function index() {
        return auth()->user()->joinedTeams()->with('owner')->get();
    }

    public function show($team_name)
    {
        $team = Team::where('team_name', $team_name)->with('owner')->firstOrFail();
        return response()->json($team);
    }

    public function store(TeamRequest $request) : JsonResponse
    {
        $team = Team::create($request->validated());
 
        return response()->json([
            'message' => 'Task Created Successfully',
            'task' => $task,
        ], 201);
    }

    public function updateVisibility(Request $request, Team $team) :JsonResponse
    {
        $validated = $request->validate([
            'visibility' => ['required', 'string']
        ]);

        $team->visibility = $validated['visibility'];
        $team->save();

        return response()->json([
            'message' => 'Update Visibility Successfully',
        ], 200);
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return response()->json([
            'message' => 'Team Deleted Successfully',
        ], 200);
    }
}
