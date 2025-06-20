<?php

use App\Http\Controllers\Api\TaskApiController;
use App\Http\Controllers\Api\SubTaskApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('tasks')->controller(TaskApiController::class)->name('api.tasks.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{task}', 'update')->name('update');
        Route::patch('/{task}', 'updateStatus')->name('updateStatus');
        Route::delete('/{task}', 'destroy')->name('destroy');
    });

    Route::prefix('tasks/{task}/subtasks')->controller(SubTaskApiController::class)->name('api.subtasks.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{subtask}', 'update')->name('update');
        Route::patch('/{subtask}', 'updateMark')->name('updateMark');
        Route::delete('/{subtask}', 'destroy')->name('destroy');
    });

    Route::prefix('teams')->controller(TeamApiController::class)->name('api.teams.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{team}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::patch('/{team}/visibility', 'updateVisibility')->middleware('hasTeamRole:team,owner,editor')->name('updateVisibility');
        Route::delete('/{team}', 'destroy')->middleware('hasTeamRole:team,owner')->name('destroy');
    });

    Route::prefix('teams/{team}/')->middleware('hasTeamRole:team,owner')->controller(TeamMemberApiController::class)->name('api.team.members.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::patch('/request/{userId}/promote', 'promote')->name('promote');
        Route::delete('/member/{userId}', 'destroy')->name('destroy');
    });

    Route::prefix('teams/{team}/')->middleware('hasTeamRole:team,owner')->controller(TeamJoinRequestApiController::class)->name('api.teams.join.requests.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::patch('/request/{userId}/join', 'join')->name('join');
        Route::patch('/request/{userId}/status', 'updateStatus')->name('updateStatus');
    });
});

