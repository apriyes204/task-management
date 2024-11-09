<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return redirect('/');
});

Route::get('/', function () {
    return redirect(route('tasks.dashboard'));
})->middleware('web');

Route::middleware(['verified', 'web'])->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('tasks.dashboard');

    Route::prefix('users')->group(function () {
        Route::get('/{id}', [UserController::class, 'edit'])->name('users.profile');
        Route::get('/{id}/password', [UserController::class, 'show'])->name('users.password');
        Route::post('/{id}/change-password', [UserController::class, 'update'])->name('users.update');
        Route::get('/', [UserController::class, 'index'])->name('users.all');
        Route::delete('/{id}/delete', [UserController::class, 'destroy'])->name('users.delete');
    });

    Route::prefix('tasks')->group(function () {
        // Route::get('/{id}', [TaskController::class, 'show'])->name('task.show');
        Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
        Route::put('/{id}/update', [TaskController::class, 'update'])->name('tasks.update');
        Route::put('/{id}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
        Route::get('/success', [TaskController::class, 'success'])->name('tasks.success');
        Route::get('/pending', [TaskController::class, 'pending'])->name('tasks.pending');
        Route::delete('/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    });
});
