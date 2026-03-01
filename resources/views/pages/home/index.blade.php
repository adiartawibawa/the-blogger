@extends('layouts.app')

@section('title', config('portfolio.owner_name') . ' — ' . config('portfolio.owner_title'))
@section('description', config('portfolio.owner_bio'))

@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-screen flex items-center pt-16 overflow-hidden">
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
                        </div>
                    </div>
                </div>

                {{-- Code Card --}}
                <div class="relative hidden lg:block">
                    <div class="relative bg-stone-900 rounded-2xl overflow-hidden shadow-2xl border border-stone-700/50">
                        <div class="flex items-center gap-2 px-4 py-3 bg-stone-800 border-b border-stone-700">
                            <div class="flex gap-1.5">
                                <div class="w-3 h-3 rounded-full bg-red-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500/80"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500/80"></div>
                            </div>
                            <span class="font-mono text-xs text-stone-400 ml-2">profile.ts</span>
                        </div>
                        <div class="p-6 font-mono text-sm">
                            <div class="space-y-1 leading-relaxed">
                                <div><span class="text-violet-400">const</span> <span class="text-blue-300">developer</span>
                                    <span class="text-stone-400">=</span> <span class="text-yellow-300">{</span>
                                </div>
                                <div class="ml-4">
                                    <span class="text-green-400">name</span>
                                    <span class="text-stone-400">:</span>
                                    <span class="text-amber-300">"{{ config('portfolio.owner_name', 'Your Name') }}"</span>
                                    <span class="text-stone-400">,</span>
                                </div>
                                <div class="ml-4">
                                    <span class="text-green-400">role</span>
                                    <span class="text-stone-400">:</span>
                                    <span
                                        class="text-amber-300">"{{ config('portfolio.owner_title', 'Full Stack Developer') }}"</span>
                                    <span class="text-stone-400">,</span>
                                </div>
                                <div class="ml-4"><span class="text-green-400">passion</span><span
                                        class="text-stone-400">:</span> <span class="text-amber-300">"Building great
                                        things"</span><span class="text-stone-400">,</span></div>
                                <div class="ml-4"><span class="text-green-400">skills</span><span class="text-stone-400">:
                                        [</span></div>
                                <div class="ml-8"><span class="text-amber-300">"Laravel"</span><span
                                        class="text-stone-400">,</span> <span class="text-amber-300">"Vue.js"</span><span
                                        class="text-stone-400">,</span></div>
                                <div class="ml-8"><span class="text-amber-300">"TypeScript"</span><span
                                        class="text-stone-400">,</span> <span class="text-amber-300">"MySQL"</span></div>
                                <div class="ml-4"><span class="text-stone-400">],</span></div>
                                <div class="ml-4"><span class="text-green-400">coffee</span><span
                                        class="text-stone-400">:</span> <span class="text-orange-400">Infinity</span><span
                                        class="text-stone-400">,</span></div>
                                <div class="ml-4"><span class="text-green-400">available</span><span
                                        class="text-stone-400">:</span> <span class="text-emerald-400">true</span></div>
                                <div><span class="text-yellow-300">}</span></div>
                            </div>
                        </div>
                    </div>

                    {{-- Floating badges --}}
                    <div
                        class="absolute -top-3 -right-3 bg-white dark:bg-stone-800 rounded-xl px-3 py-1.5 shadow-lg border border-stone-200 dark:border-stone-700">
                        <span class="text-xs font-mono font-bold text-indigo-600 dark:text-indigo-400">// Open to
                            work</span>
                    </div>
                    <div
                        class="absolute -bottom-3 -left-3 bg-white dark:bg-stone-800 rounded-xl px-3 py-1.5 shadow-lg border border-stone-200 dark:border-stone-700">
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
        <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">
            <div class="bg-gradient-to-br from-indigo-600 to-violet-600 rounded-3xl p-12 relative overflow-hidden">
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
