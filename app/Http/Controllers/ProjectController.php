<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->accessibleProjects();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {

        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title'         => 'required',
            'description'   => 'required',
            'notes'   => 'nullable'
        ]);

        $project = auth()->user()->projects()->create($attributes);

        return redirect(route('projects.show', $project->id));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $attributes = request()->validate([
            'title' => ['sometimes', 'required'],
            'description' => ['sometimes', 'required'],
            'notes' => ['nullable']
        ]);

        $project->update($attributes);

        return redirect(route('projects.show', $project->id));
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect(route('projects.index'));
    }
}
