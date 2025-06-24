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
        $teams = auth()->user()->get();
        return response()->json($teams);
    }

    public function show($team_name)
    {
        $team = Team::where('team_name', $team_name)->with('owner')->firstOrFail();
        return response()->json($team);
    }

    public function store(TeamRequest $request) : JsonResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('team_profile')) {
            $path = $request->file('team_profile')->store('team_profiles', 'public');
            $validated['team_profile'] = $path;
        } else {
            $validated['team_profile'] = null;
        }

        do {
            $teamCode = strtoupper(str()->random(10));
        } while (Team::where('team_code', $teamCode)->exists());

        $validated['team_code'] = $teamCode;
        $validated['owner_id'] = auth()->id();

        $team = Team::create($validated);

        return response()->json([
            'message' => 'Team Created Successfully',
            'team' => $team,
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
