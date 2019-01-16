<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectTasksController extends Controller
{
    /**
     * Add task to the given project.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        request()->validate(['body' => 'required']);

        $project->addTask(request('body'));

        return redirect($project->path());
    }
}
