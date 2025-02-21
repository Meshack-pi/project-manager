<?php

use Closure;
use Illuminate\Http\Request;
use App\Models\Project;

class CheckProjectAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        $projectId = $request->route('project'); // Ensure your route has {project}

        $project = Project::find($projectId);

        // Check if project exists and user is the owner
        if (!$project || $project->owner_id !== $user->id) {
            abort(403, 'Unauthorized Access to this Project');
        }

        return $next($request);
    }
}

