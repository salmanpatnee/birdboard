@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="align-items-center mb-4 row">
            <div class="col">
                <h2 class="fs-5">My Projects</h2>
            </div>
            <div class="col text-end">
                <a href="{{ route('projects.create') }}" class="btn btn-primary">Create Project</a>
            </div>
        </div>
        <div class="row">
            @forelse ($projects as $project)
                <div class="col-sm-4">
                    <x-project-card :project="$project" />
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection
