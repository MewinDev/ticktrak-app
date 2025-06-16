<?php

use App\Http\Controllers\SettingController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('setting')->middleware('auth')->name('setting.')->group(function () {
    Route::get('/', [SettingController::class, 'edit'])->name('edit');

    Route::patch('/', [SettingController::class, 'update'])->name('update');
    Route::patch('/updateProfile', [SettingController::class, 'updateProfile'])->name('updateProfile');

    Route::delete('/', [SettingController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/tasks.php';
require __DIR__.'/timesheet.php';
