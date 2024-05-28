<div>
    {{ $activity->owner->name }} created a Project
    <small class="text-muted"> {{ $activity->created_at->diffForHumans(null, true) }}</small>
</div>
