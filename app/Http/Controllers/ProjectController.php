<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return $projects;
    }

    public function show(Project $project)
    {
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
