@props(['project' => ''])
<div class="card bg-white shadow-sm">
    <div class="card-body">
        <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none text-dark fw-bold">
            <h5 class="card-title">{{ $project->title }}</h5>
        </a>

        <p class="card-text text-secondary mt-3">
            {{ Str::limit($project->description, 50) }}
        </p>
        <div class="text-end">
            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-danger btn btn-link text-decoration-none">Delete</button>
            </form>
        </div>
    </div>
</div>
