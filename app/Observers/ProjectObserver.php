<?php

namespace App\Observers;

use App\Models\Project;


class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        $project->recordsActivity('create_project');
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(Project $project): void
    {
        $project->recordsActivity('update_project');
    }
}
