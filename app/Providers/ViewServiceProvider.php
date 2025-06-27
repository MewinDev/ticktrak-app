<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Teams\Team;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.aside', function ($view) {
            if (Auth::check()) {
                $userId = Auth::id();

                $teams = Team::with('owner')
                    ->where('owner_id', $userId)
                    ->orWhereHas('members', function ($q) use ($userId) {
                        $q->where('user_id', $userId);
                    })
                    ->get();

                $currentTeam = null;
                $route = request()->route();
                if ($route && $route->parameter('team_name')) {
                    $teamName = str_replace('-', ' ', $route->parameter('team_name'));
                    $currentTeam = Team::where('team_name', $teamName)->first();
                }

                $view->with(compact('teams', 'currentTeam'));
            }
        });
    }
}
