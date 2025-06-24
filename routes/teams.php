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
        Route::get('/', 'index')->name('index');  // -> /tasks
        Route::get('/{team_name}', 'show')->name('show');  // -> /tasks/{team_name}
        Route::post('/', 'store')->name('store');  // -> /tasks
        Route::get('/{team}', 'show')->name('show'); // -> /tasks/{id}
    });
});


