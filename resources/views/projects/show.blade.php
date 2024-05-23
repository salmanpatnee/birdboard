@extends('layouts.app') @section('content')
    <div class="container">
        <div class="align-items-center mb-4 row">
            <div class="col">
                <p class="text-secondary">
                    <a href="{{ route('projects.index') }}" class="text-decoration-none text-secondary">
                        My Projects
                    </a> /
                    {{ $project->title }}
                </p>

            </div>
            <div class="col text-end">
                <a href="{{ route('projects.create') }}" class="btn btn-primary">Create Project</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <h2 class="h5 mb-4">Tasks</h2>

                <div class="card mb-4">
                    <ul class="list-group list-group-flush w-100">
                        <li class="list-group-item bg-white w-100">An item</li>
                        <li class="list-group-item bg-white w-100">A second item</li>
                        <li class="list-group-item bg-white w-100">A third item</li>
                    </ul>
                </div>

                <h2 class="h5 mb-4">Notes</h2>
                <div class="card bg-white shadow-sm p-3">
                    <textarea name="notes" id="notes" class="form-control border-0 bg-white" cols="3" rows="3"
                        placeholder="Write some notes if any."></textarea>
                </div>
            </div>
            <div class="col-md-3 pt-5">
                <x-project-card :project="$project" />
            </div>
        </div>
    </div>
@endsection
