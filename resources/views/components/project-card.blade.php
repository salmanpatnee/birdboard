@props(['project' => ''])
<div class="card bg-white shadow-sm">
    <div class="card-body">
        <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none text-dark fw-bold">
            <h5 class="card-title">{{ $project->title }}</h5>
        </a>

        <p class="card-text text-secondary mt-3">
            {{ Str::limit($project->description, 50) }}
        </p>
        {{-- <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a> --}}
    </div>
</div>
