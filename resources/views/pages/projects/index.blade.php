@extends('layouts.app')

@section('title', 'Projects — ' . config('app.name'))
@section('description', 'Explore my portfolio of projects — web applications, APIs, and more.')

@section('content')
    <div class="pt-28 pb-20 max-w-6xl mx-auto px-6 lg:px-8">
        {{-- Header --}}
        <div class="mb-12">
            <span class="font-mono text-xs text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">Portfolio</span>
            <h1 class="text-4xl font-display font-bold text-stone-900 dark:text-stone-100 mt-1 mb-3">My Projects</h1>
            <p class="text-stone-500 dark:text-stone-400 max-w-xl">A collection of projects I've built — from side
                experiments to production applications.</p>
        </div>

        {{-- Filters --}}
        <div class="mb-8 flex flex-col sm:flex-row gap-4" x-data="{ showFilters: false }">
            {{-- Search --}}
            <form method="GET" action="{{ route('projects.index') }}" class="flex-1 flex gap-2">
                @if (request('tech'))
                    <input type="hidden" name="tech" value="{{ request('tech') }}">
                @endif

                <div class="relative flex-1">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-stone-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search projects..."
                        class="w-full pl-10 pr-4 py-2.5 bg-white dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-xl text-sm text-stone-700 dark:text-stone-300 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                </div>
                <button type="submit"
                    class="px-4 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-medium hover:bg-indigo-700 transition-colors">Search</button>
            </form>

            {{-- Technology Filter --}}
            @if ($technologies->isNotEmpty())
                <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-hide">
                    <a href="{{ route('projects.index', request()->except('tech')) }}"
                        class="whitespace-nowrap text-xs font-medium px-3 py-1.5 rounded-lg transition-colors {{ !request('tech') ? 'bg-indigo-600 text-white' : 'bg-stone-100 dark:bg-stone-800 text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-700' }}">
                        All
                    </a>
                    @foreach ($technologies as $tech)
                        <a href="{{ route('projects.index', array_merge(request()->except('tech'), ['tech' => $tech->slug])) }}"
                            class="whitespace-nowrap text-xs font-medium px-3 py-1.5 rounded-lg transition-colors {{ request('tech') === $tech->slug ? 'bg-indigo-600 text-white' : 'bg-stone-100 dark:bg-stone-800 text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-700' }}">
                            {{ $tech->name }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Projects Grid --}}
        @if ($projects->isEmpty())
            <div class="text-center py-20">
                <svg class="w-16 h-16 mx-auto mb-4 text-stone-300 dark:text-stone-700" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-lg font-semibold text-stone-500 dark:text-stone-400 mb-2">No projects found</h3>
                <p class="text-stone-400 dark:text-stone-500 text-sm">Try adjusting your filters or search terms.</p>
                <a href="{{ route('projects.index') }}"
                    class="mt-4 inline-block text-indigo-600 dark:text-indigo-400 text-sm font-medium hover:underline">Clear
                    filters</a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach ($projects as $project)
                    @include('components.project-card', ['project' => $project])
                @endforeach
            </div>

            {{-- Pagination --}}
            {{ $projects->links() }}
        @endif
    </div>
@endsection
