<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Models\Story;
use App\Http\Controllers\UserController;

Route::get('/', function () {

    $stories = Story::latest()->take(6)->get();

    return view('pages.home', compact('stories'));

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy']);

    Route::get('/stories/create', [StoryController::class, 'create']);

    Route::post('/stories', [StoryController::class, 'store']);

    Route::get('/stories', [StoryController::class, 'index']);

    Route::get('/stories/{story}', [StoryController::class, 'show']);

    Route::post('/stories/{story}/fragment', [StoryController::class, 'addFragment']);

    Route::get('/my-stories', [StoryController::class, 'myStories']);

    Route::get('/stories/{story}/edit', [StoryController::class, 'edit']);

    Route::put('/stories/{story}', [StoryController::class, 'update']);

    Route::delete('/stories/{story}', [StoryController::class, 'destroy']);



    // USERS
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);

    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit']);

    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update']);

    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy']);

});

require __DIR__.'/auth.php';