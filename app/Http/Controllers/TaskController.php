<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        request()->validate([
            'body' => 'required'
        ]);

        $project->addTask(request('body'));

        return redirect(route('projects.show', $project->id));
    }

    public function update(Project $project, Task $task)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        request()->validate([
            'body' => 'required'
        ]);

        $task->update([
            'body' => request('body'),
            'completed' => request()->has('completed')
        ]);

        return redirect(route('projects.show', $project->id));
    }
}
