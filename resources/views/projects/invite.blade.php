<div class="card bg-white shadow-sm p-3 mt-3">
    <h3 class="h5 mb-3">Invite a User</h3>
    <form action="{{ route('invites.store', $project->id) }}" method="POST">
        @csrf
        <input type="email" name="email" class="form-control mb-3">
        <button type="submit" class="btn btn-primary">Invite</button>
    </form>
    @include('projects.errors', ['bag' => 'invitations'])
</div>
