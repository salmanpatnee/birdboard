<div>
    @if (count($activity->changes['after']) == 1)
        {{ $activity->owner->name }} updated {{ key($activity->changes['after']) }} of the Project
    @else
        {{ $activity->owner->name }} updated Project
    @endif
    <small class="text-muted"> {{ $activity->created_at->diffForHumans(null, true) }}</small>
</div>
