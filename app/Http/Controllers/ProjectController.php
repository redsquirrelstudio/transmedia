<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturedProject;
use Illuminate\Contracts\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('projects.index', ['projects' => FeaturedProject::orderBy('created_at', 'desc')->get()]);
    }

    public function single(int $project_id): View
    {
        return view('projects.single', ['project' => FeaturedProject::find($project_id)]);
    }
}
