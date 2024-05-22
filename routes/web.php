<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/projects', [ProjectController::class, 'index'])
        ->name('projects.index');

    Route::get('/projects/{project}', [ProjectController::class, 'show'])
        ->name('projects.show');

    Route::post('/projects', [ProjectController::class, 'store'])
        ->name('projects.store');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
