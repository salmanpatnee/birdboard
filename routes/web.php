<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectInvitationController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    /*
     *   Project
    */
    Route::get('/projects', [ProjectController::class, 'index'])
        ->name('projects.index');

    Route::get('/projects/create', [ProjectController::class, 'create'])
        ->name('projects.create');

    Route::get('/projects/{project}', [ProjectController::class, 'show'])
        ->name('projects.show')->can('update', 'project');

    Route::post('/projects', [ProjectController::class, 'store'])
        ->name('projects.store');

    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])
        ->name('projects.edit');

    Route::patch('/projects/{project}', [ProjectController::class, 'update'])
        ->name('projects.update')->can('update', 'project');

    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])
        ->name('projects.destroy')->can('delete', 'project');

    /*
     *   Task
    */
    Route::post('/projects/{project}/tasks', [TaskController::class, 'store'])
        ->name('tasks.store')->can('update', 'project');

    Route::patch('/projects/{project}/tasks/{task}', [TaskController::class, 'update'])
        ->name('tasks.update')->can('update', 'project');


    /*
     *   Invitation
    */

    Route::post('/projects/{project}/invite', [ProjectInvitationController::class, 'store'])
        ->name('invites.store')->can('manage', 'project');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
