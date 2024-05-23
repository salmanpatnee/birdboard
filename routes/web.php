<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/projects', [ProjectController::class, 'index'])
        ->name('projects.index');

    Route::get('/projects/create', [ProjectController::class, 'create'])
        ->name('projects.create');

    Route::get('/projects/{project}', [ProjectController::class, 'show'])
        ->name('projects.show');

    Route::post('/projects', [ProjectController::class, 'store'])
        ->name('projects.store');

    Route::post('/projects/{project}/tasks', [TaskController::class, 'store'])
        ->name('tasks.store');

    Route::patch('/projects/{project}/tasks/{task}', [TaskController::class, 'update'])
        ->name('tasks.update');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
