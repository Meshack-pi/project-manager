<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectViewController extends Controller
{
    public function show(Project $project): View
    {
        return view('projects.view', [
            'project' => $project,
        ]);
    }
}