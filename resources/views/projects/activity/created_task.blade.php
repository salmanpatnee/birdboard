<div>
    {{ $activity->owner->name }} created "{{ $activity->subject->body }}"
    <small class="text-muted"> {{ $activity->created_at->diffForHumans(null, true) }}</small>
</div>
