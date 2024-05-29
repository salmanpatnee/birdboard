<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectInviteRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectInvitationController extends Controller
{
    public function store(Project $project, ProjectInviteRequest $request)
    {

        $user = User::whereEmail(request('email'))->first();

        $project->invite($user);

        return redirect(route('projects.show', $project->id));
    }
}
