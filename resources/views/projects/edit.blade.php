@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('projects.update', $project->id) }}">
            @method('PATCH')
            @include('projects.form', [
                'buttonText' => 'Update Project',
            ])
        </form>
    </div>
@endsection
