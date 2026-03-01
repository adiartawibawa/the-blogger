<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('technologies', 'images')
            ->published()
            ->orderBy('sort_order');

        // Filter by technology
        if ($request->filled('tech')) {
            $query->whereHas('technologies', function ($q) use ($request) {
                $q->where('slug', $request->tech);
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->whereHas('technologies', function ($q) use ($request) {
                $q->where('category', $request->category);
            });
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                    ->orWhere('excerpt', 'like', "%{$request->search}%")
                    ->orWhere('description', 'like', "%{$request->search}%");
            });
        }

        $projects = $query->paginate(12)->withQueryString();
        $technologies = Technology::orderBy('name')->get();
        $categories = Technology::select('category')->distinct()->pluck('category');

        return view('pages.projects.index', compact('projects', 'technologies', 'categories'));
    }

    public function show(string $slug)
    {
        $project = Project::with('technologies', 'images')
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        $project->incrementViews();

        $relatedProjects = Project::with('technologies', 'images')
            ->published()
            ->where('id', '!=', $project->id)
            ->whereHas('technologies', function ($q) use ($project) {
                $q->whereIn('technologies.id', $project->technologies->pluck('id'));
            })
            ->limit(3)
            ->get();

        return view('pages.projects.show', compact('project', 'relatedProjects'));
    }
}
