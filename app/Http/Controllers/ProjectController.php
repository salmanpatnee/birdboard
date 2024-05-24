<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects()->latest('updated_at')->get();

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
            'description'   => 'required'
        ]);

        $project = auth()->user()->projects()->create($attributes);

        return redirect(route('projects.show', $project->id));
    }

    public function update(Project $project)
    {
        request()->validate([
            'notes' => 'min:3'
        ]);

        $project->update(request(['notes']));

        return redirect(route('projects.show', $project->id));
    }
}
