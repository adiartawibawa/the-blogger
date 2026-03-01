<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('category', 'tags')
            ->published()
            ->latest('published_at');

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('tag')) {
            $query->whereHas('tags', fn($q) => $q->where('slug', $request->tag));
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                    ->orWhere('excerpt', 'like', "%{$request->search}%")
                    ->orWhere('content', 'like', "%{$request->search}%");
            });
        }

        $posts = $query->paginate(9)->withQueryString();
        $categories = Category::withCount(['posts' => fn($q) => $q->published()])->get();
        $tags = Tag::withCount(['posts' => fn($q) => $q->published()])->having('posts_count', '>', 0)->get();
        $featuredPosts = Post::published()->featured()->latest('published_at')->limit(3)->get();

        return view('pages.blog.index', compact('posts', 'categories', 'tags', 'featuredPosts'));
    }

    public function show(string $slug)
    {
        $post = Post::with('category', 'tags')
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        $post->incrementViews();

        $tableOfContents = $post->generateTableOfContents();
        $relatedPosts = $post->getRelatedPosts(3);
        $categories = Category::withCount(['posts' => fn($q) => $q->published()])->get();
        $tags = Tag::withCount(['posts' => fn($q) => $q->published()])->having('posts_count', '>', 0)->get();

        return view('pages.blog.show', compact('post', 'tableOfContents', 'relatedPosts', 'categories', 'tags'));
    }
}
