<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Technology;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::with('technologies', 'images')
            ->featured()
            ->orWhere('status', 'published')
            ->orderBy('sort_order')
            ->limit(6)
            ->get();

        $latestPosts = Post::with('category', 'tags')
            ->published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        $featuredTechnologies = Technology::where('is_featured', true)
            ->orderBy('sort_order')
            ->get();

        return view('pages.home.index', compact(
            'featuredProjects',
            'latestPosts',
            'featuredTechnologies'
        ));
    }
}
