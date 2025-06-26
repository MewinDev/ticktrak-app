<?php

use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'throttle:1000,1'])->prefix('teams')->name('teams.')->group(function () {

    Route::controller(TeamController::class)->group(function () {
        Route::get('/', 'index')->name('index');  // -> /teams
        Route::post('/', 'store')->name('store');  // -> /teams
        Route::get('/{team}', 'show')->name('show'); // -> /teams/{id}

        Route::name('show.')->group(function () {
            Route::get('/{team_name}/dashboard', 'showDashboard')->name('dashboard');  // -> /teams/{team_name}/dashboard
            Route::get('/{team_name}/tasks', 'showTasks')->name('tasks');  // -> /teams/{team_name}/tasks
            Route::get('/{team_name}/members', 'showMembers')->name('members');  // -> /teams/{team_name}/members
            Route::get('/{team_name}/settings', 'showSettings')->name('settings');  // -> /teams/{team_name}/settings
        });
    });
});


