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
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        @foreach ($project->members as $member)
                            <img src="{{ $member->gravatar_url }}" class="rounded-circle" alt="{{ $member->name }}">
                        @endforeach
                        <img src="{{ $project->owner->gravatar_url }}" class="rounded-circle"
                            alt="{{ $project->owner->name }}">
                    </div>

                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Edit Project</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h2 class="h5 mb-4">Tasks</h2>

                <div class="card mb-4">
                    <ul class="list-group list-group-flush w-100">
                        @foreach ($project->tasks as $task)
                            <li class="list-group-item bg-white w-100">
                                <form action="{{ route('tasks.update', [$project->id, $task->id]) }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <div class="d-flex align-items-center">
                                        <input type="text" name="body" value="{{ $task->body }}"
                                            class="form-control border-0 bg-white {{ $task->completed ? 'text-decoration-line-through' : '' }}">
                                        <input class="form-check-input" type="checkbox" name="completed"
                                            onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                    </div>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <form action="{{ route('tasks.store', $project->id) }}" method="POST" class="mb-4">
                    @csrf
                    <div class="card bg-white shadow-sm p-3">
                        <input type="text" name="body" class="form-control border-0 bg-white"
                            placeholder="Add a new task." />
                    </div>
                </form>


                <h2 class="h5 mb-4">Notes</h2>
                <div class="card bg-white shadow-sm p-3">
                    <form method="POST" action="{{ route('projects.update', $project->id) }}">
                        @csrf
                        @method('PATCH')
                        <textarea name="notes" id="notes" class="form-control border-0 bg-white mb-3" cols="3" rows="3"
                            placeholder="Write some notes if any.">{{ $project->notes }}</textarea>
                        <button type="submit" class="btn btn-warning">Save Notes</button>
                    </form>

                </div>
                @include('projects.errors')
            </div>
            <div class="col-md-4 pt-5">
                <x-project-card :project="$project" />

                @include('projects.activity.card')

                @can('manage', $project)
                    @include('projects.invite')
                @endcan
            </div>
        </div>
    </div>
@endsection
