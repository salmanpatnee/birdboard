@csrf
<div class="mb-3">

    <div class="card bg-white shadow-sm p-2">
        <input type="text" name="title" class="form-control border-0 bg-white" placeholder="Project Title"
            value="{{ old('title', $project->title) }}">
    </div>
</div>
<div class="mb-3">
    <div class="card bg-white shadow-sm p-2">
        <textarea name="description" id="description" class="form-control border-0 bg-white" placeholder="Project Description"
            cols="4" rows="4">{{ old('description', $project->description) }}</textarea>
    </div>
</div>
<div class="mb-3">
    <div class="card bg-white shadow-sm p-2">
        <textarea name="notes" id="notes" class="form-control border-0 bg-white" placeholder="Project Notes"
            cols="4" rows="4">{{ old('notes', $project->notes) }}</textarea>
    </div>
</div>
<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
