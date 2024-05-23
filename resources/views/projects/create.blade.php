@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            <div class="mb-3">

                <div class="card bg-white shadow-sm p-2">
                    <input type="text" name="title" class="form-control border-0 bg-white" placeholder="Project Title">
                </div>
            </div>
            <div class="mb-3">
                <div class="card bg-white shadow-sm p-2">
                    <textarea name="description" id="description" class="form-control border-0 bg-white" placeholder="Project Description"
                        cols="30" rows="10"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Project</button>
        </form>
    </div>
@endsection
