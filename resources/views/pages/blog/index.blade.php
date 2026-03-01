@extends('layouts.app')

@section('title', 'Blog — ' . config('app.name'))
@section('description', 'Articles, tutorials, and technical insights from my development journey.')

@section('content')
    <div class="pt-28 pb-20 max-w-6xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-3">
                <div class="mb-10">
                    <span class="font-mono text-xs text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">Knowledge
                        Sharing</span>
                    <h1 class="text-4xl font-display font-bold text-stone-900 dark:text-stone-100 mt-1 mb-3">Blog</h1>
                    <p class="text-stone-500 dark:text-stone-400">Thoughts, tutorials, and technical deep-dives on web
                        development.</p>
                </div>

                {{-- Search --}}
                <form method="GET" action="{{ route('blog.index') }}" class="relative mb-8">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('tag'))
                        <input type="hidden" name="tag" value="{{ request('tag') }}">
                    @endif
                    <div class="relative">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-stone-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search articles..."
                            class="w-full pl-12 pr-4 py-3 bg-white dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-xl text-stone-700 dark:text-stone-300 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        <button type="submit"
                            class="absolute right-3 top-1/2 -translate-y-1/2 px-4 py-1.5 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                            Search
                        </button>
                    </div>
                </form>

                {{-- Active filter indicator --}}
                @if (request('category') || request('tag') || request('search'))
                    <div class="flex items-center gap-2 mb-6">
                        <span class="text-sm text-stone-500 dark:text-stone-400">Filtering by:</span>
                        @if (request('category'))
                            @php $cat = $categories->firstWhere('slug', request('category')); @endphp
                            @if ($cat)
                                <span class="inline-flex items-center gap-1 text-xs font-medium px-2.5 py-1 rounded-full"
                                    style="background-color: {{ $cat->color }}20; color: {{ $cat->color }}">
                                    {{ $cat->name }}
                                    <a href="{{ route('blog.index', request()->except('category')) }}"
                                        class="hover:opacity-70">×</a>
                                </span>
                            @endif
                        @endif
                        @if (request('tag'))
                            @php $tag = $tags->firstWhere('slug', request('tag')); @endphp
                            @if ($tag)
                                <span
                                    class="inline-flex items-center gap-1 text-xs font-medium px-2.5 py-1 bg-stone-100 dark:bg-stone-700 text-stone-600 dark:text-stone-400 rounded-full">
                                    #{{ $tag->name }}
                                    <a href="{{ route('blog.index', request()->except('tag')) }}"
                                        class="hover:opacity-70">×</a>
                                </span>
                            @endif
                        @endif
                        @if (request('search'))
                            <span
                                class="text-xs text-stone-500 dark:text-stone-400 italic">"{{ request('search') }}"</span>
                        @endif
                        <a href="{{ route('blog.index') }}"
                            class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline ml-1">Clear all</a>
                    </div>
                @endif

                {{-- Posts Grid --}}
                @if ($posts->isEmpty())
                    <div class="text-center py-20">
                        <svg class="w-16 h-16 mx-auto mb-4 text-stone-300 dark:text-stone-700" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="text-lg font-semibold text-stone-500 dark:text-stone-400 mb-2">No articles found</h3>
                        <a href="{{ route('blog.index') }}"
                            class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Clear filters</a>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        @foreach ($posts as $post)
                            @include('components.post-card', ['post' => $post])
                        @endforeach
                    </div>
                    {{ $posts->links() }}
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Categories --}}
                @if ($categories->isNotEmpty())
                    <div
                        class="bg-white dark:bg-stone-800/60 rounded-2xl border border-stone-200 dark:border-stone-700 p-5">
                        <h3
                            class="font-semibold text-stone-900 dark:text-stone-100 text-sm uppercase tracking-wide font-mono mb-4">
                            Categories</h3>
                        <ul class="space-y-2">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('blog.index', ['category' => $category->slug]) }}"
                                        class="flex items-center justify-between text-sm py-1.5 px-2 rounded-lg transition-colors {{ request('category') === $category->slug ? 'bg-indigo-50 dark:bg-indigo-950/40 text-indigo-700 dark:text-indigo-400 font-medium' : 'text-stone-600 dark:text-stone-400 hover:bg-stone-50 dark:hover:bg-stone-700/40' }}">
                                        <div class="flex items-center gap-2">
                                            <div class="w-2 h-2 rounded-full"
                                                style="background-color: {{ $category->color }}"></div>
                                            {{ $category->name }}
                                        </div>
                                        <span
                                            class="text-xs text-stone-400 dark:text-stone-500">{{ $category->posts_count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Tags --}}
                @if ($tags->isNotEmpty())
                    <div
                        class="bg-white dark:bg-stone-800/60 rounded-2xl border border-stone-200 dark:border-stone-700 p-5">
                        <h3
                            class="font-semibold text-stone-900 dark:text-stone-100 text-sm uppercase tracking-wide font-mono mb-4">
                            Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($tags as $tag)
                                <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}"
                                    class="text-xs px-2.5 py-1 rounded-lg transition-colors {{ request('tag') === $tag->slug ? 'bg-indigo-600 text-white' : 'bg-stone-100 dark:bg-stone-700 text-stone-600 dark:text-stone-400 hover:bg-indigo-100 dark:hover:bg-indigo-900/30 hover:text-indigo-700 dark:hover:text-indigo-400' }}">
                                    #{{ $tag->name }}
                                    <span class="opacity-60 ml-0.5">{{ $tag->posts_count }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
