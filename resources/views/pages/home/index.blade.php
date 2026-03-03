@extends('layouts.app')

@section('title', config('portfolio.owner_name') . ' — ' . config('portfolio.owner_title'))
@section('description', config('portfolio.owner_bio'))

@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-screen flex items-center pt-16 overflow-hidden bg-pattern">
        {{-- Background decorations --}}
        <div
            class="absolute top-1/4 -right-32 w-96 h-96 bg-indigo-200/30 dark:bg-indigo-900/20 rounded-full blur-3xl pointer-events-none">
        </div>
        <div
            class="absolute bottom-1/4 -left-32 w-80 h-80 bg-violet-200/30 dark:bg-violet-900/20 rounded-full blur-3xl pointer-events-none">
        </div>

        <div class="max-w-6xl mx-auto px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Text Content --}}
                <div class="space-y-8">
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span
                                class="font-mono text-xs text-stone-500 dark:text-stone-400 tracking-widest uppercase">Available
                                for work</span>
                        </div>
                        <h1
                            class="text-5xl lg:text-6xl xl:text-7xl font-display font-bold text-stone-900 dark:text-stone-100 leading-none tracking-tight">
                            {{ config('portfolio.owner_name', 'Your Name') }}
                        </h1>
                        <div class="flex items-center gap-3">
                            <div class="h-px flex-1 max-w-12 bg-indigo-500"></div>
                            <p class="text-indigo-600 dark:text-indigo-400 font-mono text-sm font-medium tracking-wide">
                                {{ config('portfolio.owner_title', 'Full Stack Developer') }}
                            </p>
                        </div>
                    </div>

                    <p class="text-stone-600 dark:text-stone-400 text-lg leading-relaxed max-w-lg">
                        {{ config('portfolio.owner_bio', 'Passionate developer building amazing web experiences with clean code and creative solutions.') }}
                    </p>

                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('projects.index') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-all duration-200 hover:shadow-lg hover:shadow-indigo-500/25 hover:-translate-y-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0l-7 7m7-7l-7-7" />
                            </svg>
                            View My Work
                        </a>
                        <a href="{{ route('contact.index') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 border border-stone-300 dark:border-stone-700 text-stone-700 dark:text-stone-300 hover:border-indigo-400 dark:hover:border-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400 font-semibold rounded-xl transition-all duration-200">
                            Get In Touch
                        </a>
                    </div>

                    {{-- Social Links --}}
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-mono text-stone-400 uppercase tracking-widest">Find me on</span>
                        <div class="flex gap-2">
                            @if (config('portfolio.social.github'))
                                <a href="{{ config('portfolio.social.github') }}" target="_blank"
                                    class="text-stone-400 hover:text-stone-700 dark:hover:text-stone-200 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
                                    </svg>
                                </a>
                            @endif
                            @if (config('portfolio.social.linkedin'))
                                <a href="{{ config('portfolio.social.linkedin') }}" target="_blank"
                                    class="text-stone-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </a>
                            @endif
                            @if (config('portfolio.social.whatsapp'))
                                <a href="{{ config('portfolio.social.whatsapp') }}" target="_blank"
                                    class="text-stone-400 hover:text-green-600 dark:hover:text-green-400 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M380.9 97.1c-41.9-42-97.7-65.1-157-65.1-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480 117.7 449.1c32.4 17.7 68.9 27 106.1 27l.1 0c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3 18.6-68.1-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1s56.2 81.2 56.1 130.5c0 101.8-84.9 184.6-186.6 184.6zM325.1 300.5c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8s-14.3 18-17.6 21.8c-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7s-12.5-30.1-17.1-41.2c-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2s-9.7 1.4-14.8 6.9c-5.1 5.6-19.4 19-19.4 46.3s19.9 53.7 22.6 57.4c2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4s4.6-24.1 3.2-26.4c-1.3-2.5-5-3.9-10.5-6.6z" />
                                    </svg>
                                </a>
                            @endif
                            @if (config('portfolio.social.instagram'))
                                <a href="{{ config('portfolio.social.instagram') }}" target="_blank"
                                    class="text-stone-400 hover:text-red-600 dark:hover:text-red-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M224.3 141a115 115 0 1 0 -.6 230 115 115 0 1 0 .6-230zm-.6 40.4a74.6 74.6 0 1 1 .6 149.2 74.6 74.6 0 1 1 -.6-149.2zm93.4-45.1a26.8 26.8 0 1 1 53.6 0 26.8 26.8 0 1 1 -53.6 0zm129.7 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM399 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Code Card --}}
                <div class="relative hidden lg:block">
                    {{-- Main Code Card --}}
                    <div
                        class="relative bg-white dark:bg-stone-900 rounded-2xl overflow-hidden shadow-2xl border border-stone-200 dark:border-stone-700/50 transition-colors duration-300">
                        {{-- Terminal Header --}}
                        <div
                            class="flex items-center gap-2 px-4 py-3 bg-stone-50 dark:bg-stone-800 border-b border-stone-200 dark:border-stone-700 transition-colors duration-300">
                            <div class="flex gap-1.5">
                                <div class="w-3 h-3 rounded-full bg-red-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500/80"></div>
                            </div>
                            <span class="font-mono text-xs text-stone-500 dark:text-stone-400 ml-2">profile.ts</span>
                        </div>

                        {{-- Code Content --}}
                        <div class="p-8 pb-10 font-mono text-sm transition-colors duration-300">
                            <div class="space-y-1 leading-relaxed">
                                <div>
                                    <span class="text-violet-600 dark:text-violet-400">const</span>
                                    <span class="text-blue-600 dark:text-blue-300">developer</span>
                                    <span class="text-stone-500 dark:text-stone-400">=</span>
                                    <span class="text-yellow-600 dark:text-yellow-300">{</span>
                                </div>
                                <div class="ml-4">
                                    <span class="text-green-600 dark:text-green-400">name</span>
                                    <span class="text-stone-500 dark:text-stone-400">:</span>
                                    <span
                                        class="text-amber-600 dark:text-amber-300">"{{ config('portfolio.owner_name', 'Your Name') }}"</span>
                                    <span class="text-stone-500 dark:text-stone-400">,</span>
                                </div>
                                <div class="ml-4">
                                    <span class="text-green-600 dark:text-green-400">role</span>
                                    <span class="text-stone-500 dark:text-stone-400">:</span>
                                    <span
                                        class="text-amber-600 dark:text-amber-300">"{{ config('portfolio.owner_title', 'Full Stack Developer') }}"</span>
                                    <span class="text-stone-500 dark:text-stone-400">,</span>
                                </div>
                                <div class="ml-4">
                                    <span class="text-green-600 dark:text-green-400">passion</span>
                                    <span class="text-stone-500 dark:text-stone-400">:</span>
                                    <span
                                        class="text-amber-600 dark:text-amber-300">"{{ config('portfolio.owner_passion', 'Building great things') }}"</span>
                                    <span class="text-stone-500 dark:text-stone-400">,</span>
                                </div>
                                @php
                                    $skills = config('portfolio.owner_skill', []);
                                @endphp

                                <div class="ml-4 wrap-break-word">
                                    <span class="text-green-600 dark:text-green-400">skills</span>
                                    <span class="text-stone-500 dark:text-stone-400">: [</span>


                                    <div class="ml-8 space-y-1">
                                        @foreach ($skills as $skill)
                                            <span class="text-amber-600 dark:text-amber-300">"{{ $skill }}"</span>
                                            @if (!$loop->last)
                                                <span class="text-stone-500 dark:text-stone-400">, </span>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="ml-4">
                                        <span class="text-stone-500 dark:text-stone-400">]</span>
                                    </div>
                                </div>

                                <div class="ml-4">
                                    <span class="text-green-600 dark:text-green-400">coffee</span>
                                    <span class="text-stone-500 dark:text-stone-400">:</span>
                                    <span
                                        class="inline-flex gap-2 items-center justify-center text-amber-600 dark:text-amber-400">
                                        Infinity
                                        <i>
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 275.353 275.353"
                                                xml:space="preserve"
                                                class="text-orange-600 dark:text-orange-400 w-6 h-auto">
                                                <g>
                                                    <g>
                                                        <g>
                                                            <g>
                                                                <path fill="currentColor"
                                                                    d="M229.784,199.712c27.269,0,45.568-29.692,45.568-57.419c0-20.117-12.418-22.843-24.562-22.843
                                                                                                                                                         c-3.468,0-7.21,0.234-11.167,0.479c-3.195,0.176-6.507,0.332-9.848,0.41l0.039-0.889H1.514c0,42.959,24.132,80.321,59.686,99.49
                                                                                                                                                         C24.787,221.333,0,226.043,0,231.445c0,7.865,51.782,14.196,115.659,14.196s115.649-6.331,115.649-14.196
                                                                                                                                                         c0-5.432-24.904-10.132-61.454-12.516c10.63-5.725,20.263-13.004,28.529-21.641
                                                                                                                                                         C208.026,199.712,219.448,199.712,229.784,199.712z M229.364,128.272c3.683-0.088,7.289-0.244,10.737-0.469
                                                                                                                                                         c3.83-0.205,7.464-0.42,10.698-0.42c11.509,0,16.658,2.159,16.658,14.909c0,23.419-15.466,49.515-37.664,49.515
                                                                                                                                                         c-9.751,0-18.3-0.205-25.285-1.358C218.559,173.196,227.537,151.731,229.364,128.272z M98.982,97.203
                                                                                                                                                         c-0.557-0.547-13.414-13.922,0.156-30.327c16.58-20,0.01-37-0.156-37.166l-3.595,3.595c0.557,0.537,13.414,13.932-0.166,30.327
                                                                                                                                                         c-16.58,20.029-0.01,37.039,0.166,37.195L98.982,97.203z M118.737,97.203c-0.557-0.547-13.414-13.922,0.166-30.327
                                                                                                                                                         c16.56-20,0-37-0.166-37.166l-3.605,3.595c0.557,0.537,13.414,13.932-0.156,30.327c-16.56,20.039-0.01,37.039,0.166,37.205
                                                                                                                                                         L118.737,97.203z M140.251,97.203c-0.557-0.547-13.414-13.922,0.156-30.327c16.57-20,0-37-0.156-37.166l-3.615,3.595
                                                                                                                                                         c0.547,0.537,13.424,13.932-0.166,30.327c-16.56,20.039,0,37.039,0.176,37.205L140.251,97.203z" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </i>
                                    </span>
                                    <span class="text-stone-500 dark:text-stone-400">,</span>
                                </div>

                                <div class="ml-4">
                                    <span class="text-green-600 dark:text-green-400">available</span>
                                    <span class="text-stone-500 dark:text-stone-400">:</span>
                                    <span class="text-emerald-600 dark:text-emerald-400">true</span>
                                </div>
                                <div><span class="text-yellow-600 dark:text-yellow-300">}</span></div>
                            </div>
                        </div>
                    </div>

                    {{-- Floating badges --}}
                    <div
                        class="absolute -top-3 -right-3 bg-white dark:bg-stone-800 rounded-xl px-3 py-1.5 shadow-lg border border-stone-200 dark:border-stone-700 transition-colors duration-300">
                        <span class="text-xs font-mono font-bold text-indigo-600 dark:text-indigo-400">// Open to
                            work</span>
                    </div>
                    <div
                        class="absolute -bottom-3 -left-3 bg-white dark:bg-stone-800 rounded-xl px-3 py-1.5 shadow-lg border border-stone-200 dark:border-stone-700 transition-colors duration-300">
                        <span class="text-xs font-mono font-bold text-green-600 dark:text-green-400">✓ All tests
                            passing</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1 animate-bounce">
            <span class="text-xs font-mono text-stone-400 tracking-widest">SCROLL</span>
            <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </section>

    {{-- Featured Projects --}}
    <section class="py-20 max-w-6xl mx-auto px-6 lg:px-8">
        <div class="flex items-end justify-between mb-12">
            <div>
                <span
                    class="font-mono text-xs text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">Portfolio</span>
                <h2 class="text-3xl font-display font-bold text-stone-900 dark:text-stone-100 mt-1">Featured Projects</h2>
            </div>
            <a href="{{ route('projects.index') }}"
                class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:underline flex items-center gap-1">
                View all <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        @if ($featuredProjects->isEmpty())
            <div class="text-center py-16 text-stone-400 dark:text-stone-600">
                <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0l-7 7m7-7l-7-7" />
                </svg>
                <p class="font-mono text-sm">No projects yet. Check back soon!</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($featuredProjects as $project)
                    @include('components.project-card', ['project' => $project])
                @endforeach
            </div>
        @endif
    </section>

    {{-- Latest Blog Posts --}}
    <section class="py-20 bg-stone-100/80 dark:bg-stone-900/50">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <div class="flex items-end justify-between mb-12">
                <div>
                    <span
                        class="font-mono text-xs text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">Knowledge
                        Sharing</span>
                    <h2 class="text-3xl font-display font-bold text-stone-900 dark:text-stone-100 mt-1">Latest Articles
                    </h2>
                </div>
                <a href="{{ route('blog.index') }}"
                    class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:underline flex items-center gap-1">
                    View all <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            @if ($latestPosts->isEmpty())
                <div class="text-center py-16 text-stone-400 dark:text-stone-600">
                    <p class="font-mono text-sm">No articles yet. Stay tuned!</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($latestPosts as $post)
                        @include('components.post-card', ['post' => $post])
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- Technologies --}}
    @if ($featuredTechnologies->isNotEmpty())
        <section class="py-20 max-w-6xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="font-mono text-xs text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">Stack</span>
                <h2 class="text-3xl font-display font-bold text-stone-900 dark:text-stone-100 mt-1">Technologies I Use</h2>
            </div>

            <div class="flex flex-wrap justify-center gap-3">
                @foreach ($featuredTechnologies as $tech)
                    <div
                        class="group flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-xl hover:border-indigo-300 dark:hover:border-indigo-700 transition-all duration-200 hover:shadow-md hover:-translate-y-0.5">
                        @if ($tech->icon)
                            <img src="{{ $tech->icon_url }}" alt="{{ $tech->name }}" class="w-5 h-5 object-contain">
                        @else
                            <div class="w-5 h-5 rounded" style="background-color: {{ $tech->color ?? '#6366f1' }}"></div>
                        @endif
                        <span class="text-sm font-medium text-stone-700 dark:text-stone-300">{{ $tech->name }}</span>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 text-center">
            <div
                class="bg-gradient-to-br from-indigo-600 to-rose-600 rounded-3xl p-12 relative overflow-hidden bg-pattern-cta">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl">
                </div>
                <div class="relative">
                    <span class="font-mono text-indigo-200 text-xs tracking-widest uppercase">Let's collaborate</span>
                    <h2 class="text-3xl font-display font-bold text-white mt-2 mb-4">Have a project in mind?</h2>
                    <p class="text-indigo-100 mb-8 max-w-md mx-auto">I'm always open to discussing new projects, creative
                        ideas, or opportunities to be part of your visions.</p>
                    <a href="{{ route('contact.index') }}"
                        class="inline-flex items-center gap-2 px-8 py-3.5 bg-white text-indigo-600 font-bold rounded-xl hover:bg-indigo-50 transition-all duration-200 hover:shadow-lg hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Get In Touch
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
