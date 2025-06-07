<?php

use App\Http\Controllers\SubTaskController;
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


Route::middleware(['auth', 'throttle:100,1'])->prefix('tasks')->controller(SubTaskController::class)->name('subtasks.')->group(function () {
    Route::post('/{taskId}', 'store')->name('store');
});
