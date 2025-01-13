<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileDataController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // Display all files
    Route::get('/filedata', [FileDataController::class, 'index'])->name('filedata.index');

    // Show the form to create a new file
    Route::get('/filedata/create', [FileDataController::class, 'create'])->name('filedata.create');

    // Store a new file
    Route::post('/filedata', [FileDataController::class, 'store'])->name('filedata.store');

    // Show a specific file (optional)
    Route::get('/filedata/{filedata}', [FileDataController::class, 'show'])->name('filedata.show');

    // Show the form to edit an existing file
    Route::get('/filedata/edit/{filedata}', [FileDataController::class, 'edit'])->name('filedata.edit');

    // Update an existing file
    Route::put('/filedata/{filedata}', [FileDataController::class, 'update'])->name('filedata.update');

    // Delete a file
    Route::delete('/filedata/{filedata}', [FileDataController::class, 'destroy'])->name('filedata.destroy');
});


require __DIR__.'/auth.php';
