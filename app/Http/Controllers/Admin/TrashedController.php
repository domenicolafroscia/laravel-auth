<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class TrashedController extends Controller
{
    public function index() {

        $projects = Project::onlyTrashed()->get();

        return view('admin.projects.trashed', compact('projects'));
        
    }

    public function restore($id) {

        $project = Project::withTrashed()->find($id)->restore();

        return redirect()->route('admin.projects.index');        // ->with('message', 'The project: ' . '"' . $project->title . ':' . '"' . ' ' . 'it was restored successfully');

    }

    public function defDestroy(Project $project) {

        $project->delete();

        return redirect()->route('admin.projects.trashed');
    }
}
