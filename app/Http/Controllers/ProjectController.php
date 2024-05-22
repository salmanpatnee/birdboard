<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return $projects;
    }

    public function show(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        return $project;
    }

    public function store()
    {
        $attributes = request()->validate([
            'title'         => 'required',
            'description'   => 'required'
        ]);

        auth()->user()->projects()->create($attributes);

        return redirect(route('projects.index'));
    }
}
