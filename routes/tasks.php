<?php

use App\Http\Controllers\TaskController;
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

Route::middleware(['auth', 'throttle:1000,1'])->prefix('tasks')->name('tasks.')->group(function () {
        
    Route::controller(TaskController::class)->group(function () {
        Route::get('/', 'index')->name('index');  // -> /tasks
        Route::get('/{taskId}', 'show')->name('show'); // -> /tasks/{taskId}
    });
});


