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
        Route::put('/{taskId}', 'update')->name('update');
        Route::patch('/{taskId}', 'updateStatus')->name('updateStatus');
        Route::delete('/{taskId}', 'destroy')->name('destroy');
    });

    Route::prefix('tasks/{taskId}/subtasks')->controller(SubTaskApiController::class)->name('api.subtasks.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{subtaskId}', 'update')->name('update');
        Route::patch('/{subtaskId}', 'updateMark')->name('updateMark');
        Route::delete('/{subtaskId}', 'destroy')->name('destroy');
    });
});
