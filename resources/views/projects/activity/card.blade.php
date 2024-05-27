<div class="card bg-white shadow-sm p-3 mt-3">
                    @foreach ($project->activity as $activity)
                        @include('projects.activity.'.$activity->type)
                    @endforeach
                </div>