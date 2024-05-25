<?php

namespace App\Observers;

use App\Models\Task;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        $task->project->recordsActivity("create_task");
    }

    /**
     * Handle the Task "updated" event.
     */
    public function deleted(Task $task): void
    {
        $task->project->recordsActivity("delete_task");
    }
}
