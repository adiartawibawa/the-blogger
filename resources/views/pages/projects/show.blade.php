@extends('layouts.app')

@section('title', $project->title . ' — ' . config('app.name'))
@section('description', $project->excerpt ?? Str::limit(strip_tags($project->description), 160))
@section('og_title', $project->title)
@section('og_description', $project->excerpt ?? Str::limit(strip_tags($project->description), 160))
@if ($project->thumbnail)
    @section('og_image', $project->thumbnail_url)
@endif

@section('content')
    <div class="pt-24 pb-20">
        {{-- Hero --}}
        <div class="max-w-6xl mx-auto px-6 lg:px-8 mb-8">
            <a href="{{ route('projects.index') }}"
                class="inline-flex items-center gap-2 text-sm text-stone-500 dark:text-stone-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Projects
            </a>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Main Content --}}
                <div class="lg:col-span-2">
                    @if ($project->isFeatured())
                        <span
                            class="inline-flex items-center gap-1 text-xs font-mono font-medium px-2 py-0.5 bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400 rounded-full mb-3">
                            ★ Featured Project
                        </span>
                    @endif

                    <h1 class="text-4xl font-display font-bold text-stone-900 dark:text-stone-100 mb-4">
                        {{ $project->title }}</h1>

                    @if ($project->excerpt)
                        <p class="text-xl text-stone-500 dark:text-stone-400 leading-relaxed mb-6">{{ $project->excerpt }}
                        </p>
                    @endif

                    {{-- Gallery --}}
                    @if ($project->thumbnail || $project->images->isNotEmpty())
                        <div class="mb-8" x-data="{ activeImage: '{{ $project->thumbnail_url ?? $project->images->first()?->url }}' }">
                            <div class="rounded-2xl overflow-hidden bg-stone-100 dark:bg-stone-800 aspect-video mb-3">
                                <img :src="activeImage" alt="{{ $project->title }}" class="w-full h-full object-cover">
                            </div>
                            @if ($project->images->count() > 1 || ($project->thumbnail && $project->images->isNotEmpty()))
                                <div class="flex gap-2 overflow-x-auto pb-1">
                                    @if ($project->thumbnail)
                                        <button @click="activeImage = '{{ $project->thumbnail_url }}'"
                                            class="flex-shrink-0 w-16 h-12 rounded-lg overflow-hidden ring-2 ring-offset-2 transition-all"
                                            :class="activeImage === '{{ $project->thumbnail_url }}' ? 'ring-indigo-500' :
                                                'ring-transparent'">
                                            <img src="{{ $project->thumbnail_url }}" alt="Main"
                                                class="w-full h-full object-cover">
                                        </button>
                                    @endif
                                    @foreach ($project->images as $image)
                                        <button @click="activeImage = '{{ $image->url }}'"
                                            class="flex-shrink-0 w-16 h-12 rounded-lg overflow-hidden ring-2 ring-offset-2 transition-all"
                                            :class="activeImage === '{{ $image->url }}' ? 'ring-indigo-500' :
                                                'ring-transparent'">
                                            <img src="{{ $image->url }}" alt="{{ $image->alt ?? $project->title }}"
                                                class="w-full h-full object-cover">
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif

                    {{-- Description --}}
                    <div class="prose dark:prose-invert prose-indigo max-w-none">
                        {!! $project->description !!}
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="space-y-5">
                    {{-- Project Info Card --}}
                    <div
                        class="bg-white dark:bg-stone-800/60 rounded-2xl border border-stone-200 dark:border-stone-700 p-5">
                        <h3
                            class="font-semibold text-stone-900 dark:text-stone-100 mb-4 text-sm uppercase tracking-wide font-mono">
                            Project Info</h3>

                        <dl class="space-y-3">
                            @if ($project->role)
                                <div>
                                    <dt
                                        class="text-xs text-stone-400 dark:text-stone-500 font-mono uppercase tracking-wide">
                                        Role</dt>
                                    <dd class="text-sm text-stone-700 dark:text-stone-300 font-medium mt-0.5">
                                        {{ $project->role }}</dd>
                                </div>
                            @endif

                            @if ($project->client)
                                <div>
                                    <dt
                                        class="text-xs text-stone-400 dark:text-stone-500 font-mono uppercase tracking-wide">
                                        Client</dt>
                                    <dd class="text-sm text-stone-700 dark:text-stone-300 mt-0.5">{{ $project->client }}
                                    </dd>
                                </div>
                            @endif

                            @if ($project->completed_at)
                                <div>
                                    <dt
                                        class="text-xs text-stone-400 dark:text-stone-500 font-mono uppercase tracking-wide">
                                        Completed</dt>
                                    <dd class="text-sm text-stone-700 dark:text-stone-300 mt-0.5">
                                        {{ $project->completed_at->format('F Y') }}</dd>
                                </div>
                            @endif

                            <div>
                                <dt class="text-xs text-stone-400 dark:text-stone-500 font-mono uppercase tracking-wide">
                                    Views</dt>
                                <dd class="text-sm text-stone-700 dark:text-stone-300 mt-0.5">
                                    {{ number_format($project->views) }}</dd>
                            </div>
                        </dl>
                    </div>

                    {{-- Technologies --}}
                    @if ($project->technologies->isNotEmpty())
                        <div
                            class="bg-white dark:bg-stone-800/60 rounded-2xl border border-stone-200 dark:border-stone-700 p-5">
                            <h3
                                class="font-semibold text-stone-900 dark:text-stone-100 mb-4 text-sm uppercase tracking-wide font-mono">
                                Tech Stack</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($project->technologies as $tech)
                                    <div
                                        class="flex items-center gap-1.5 px-2.5 py-1.5 bg-stone-50 dark:bg-stone-700/60 rounded-lg border border-stone-200 dark:border-stone-600">
                                        @if ($tech->icon)
                                            <img src="{{ $tech->icon_url }}" alt="{{ $tech->name }}"
                                                class="w-4 h-4 object-contain">
                                        @else
                                            <div class="w-3 h-3 rounded-sm"
                                                style="background-color: {{ $tech->color ?? '#6366f1' }}"></div>
                                        @endif
                                        <span
                                            class="text-xs font-medium text-stone-700 dark:text-stone-300">{{ $tech->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Links --}}
                    <div class="space-y-2.5">
                        @if ($project->demo_url)
                            <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer"
                                class="flex items-center justify-center gap-2 w-full px-4 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-all hover:shadow-lg hover:shadow-indigo-500/25">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                Live Demo
                            </a>
                        @endif
                        @if ($project->repo_url)
                            <a href="{{ $project->repo_url }}" target="_blank" rel="noopener noreferrer"
                                class="flex items-center justify-center gap-2 w-full px-4 py-3 bg-stone-800 dark:bg-stone-700 hover:bg-stone-700 dark:hover:bg-stone-600 text-white font-semibold rounded-xl transition-all">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
                                </svg>
                                View Source
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Related Projects --}}
        @if ($relatedProjects->isNotEmpty())
            <div class="max-w-6xl mx-auto px-6 lg:px-8 mt-16">
                <h2 class="text-2xl font-display font-bold text-stone-900 dark:text-stone-100 mb-6">Related Projects</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($relatedProjects as $project)
                        @include('components.project-card', ['project' => $project])
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
