<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Teams\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TeamController extends Controller
{
    public function index() {

        $userId = auth()->id();

        $teams = Team::with('owner')
            ->where('owner_id', $userId)
            ->orWhereHas('members', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();
        return view('layouts.aside', compact('teams'));
    }

    public function show(Team $team) {
        return view('contents.teams', compact('team'));
    }

    public function showDashboard($team_name) {
        $name = str_replace('-', ' ', $team_name);
        $team = Team::where('team_name', $name)->firstOrFail();

        return view('contents.teams', compact('team'));
    }

    public function showTasks($team_name) {
        $name = str_replace('-', ' ', $team_name);
        $team = Team::where('team_name', $name)->firstOrFail();

        return view('contents.teams.tasks', compact('team'));
    }

    public function showMembers($team_name) {
        $name = str_replace('-', ' ', $team_name);
        $team = Team::where('team_name', $name)->firstOrFail();

        return view('contents.teams.members', compact('team'));
    }

    public function showSettings($team_name) {
        $name = str_replace('-', ' ', $team_name);
        $team = Team::where('team_name', $name)->firstOrFail();

        return view('contents.teams.settings', compact('team'));
    }

    public function showLeave($team_name) {
        $name = str_replace('-', ' ', $team_name);
        $team = Team::where('team_name', $name)->firstOrFail();

        return view('contents.teams.leave', compact('team'));
    }

    public function store(TeamRequest $request) {
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

        // Add owner as a member in team_members table with role 'owner'
        $team->members()->attach(auth()->id(), ['role' => 'owner']);

        return Redirect::route('dashboard');
    }
}
