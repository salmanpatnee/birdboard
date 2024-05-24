@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('projects.store') }}">
            @include('projects.form', [
                'project' => new App\Models\Project(),
                'buttonText' => 'Add new Project',
            ])
        </form>
    </div>
@endsection
