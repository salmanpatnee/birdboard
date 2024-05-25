<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Project $project)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $project->addTask(request('body'));

        return redirect(route('projects.show', $project->id));
    }

    public function update(Project $project, Task $task)
    {

        $attributes = request()->validate(['body' => 'required']);

        $task->update($attributes);

        request('completed') ? $task->complete() : $task->incomplete();

        return redirect(route('projects.show', $project->id));
    }
}
