<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturedProject;
use Illuminate\Contracts\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = FeaturedProject::inRandomOrder();
        $slides = [];
        foreach($projects->take(5)->get() as $project){
            $slides[] = [
                'id' => $project->id,
                'title' => $project->title,
                'link_text' => 'Read More',
                'link_href' => route('projects.single', $project->id),
                'src' => $project->banner_media,
                'type' => 'image'
            ];
        }

        return view('projects.index', ['projects' => $projects->get(), 'slides' => $slides]);
    }

    public function single(int $project_id): View
    {
        return view('projects.single', ['project' => FeaturedProject::find($project_id)]);
    }
}
