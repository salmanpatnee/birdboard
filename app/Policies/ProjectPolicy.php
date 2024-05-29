<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Project $project): bool
    {
        return $user->is($project->owner) || $project->members->contains($user);
    }

    public function manage(User $user, Project $project): bool
    {
        return $user->is($project->owner);
    }


    public function delete(User $user, Project $project): bool
    {
        return $user->is($project->owner);
    }
}
