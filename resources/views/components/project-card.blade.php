<article
    class="group bg-white dark:bg-stone-800/50 rounded-2xl overflow-hidden border border-stone-200 dark:border-stone-700/60 hover:border-indigo-300 dark:hover:border-indigo-700/60 transition-all duration-300 hover:shadow-xl hover:shadow-indigo-500/10 hover:-translate-y-1 flex flex-col">
    {{-- Thumbnail --}}
    <a href="{{ route('projects.show', $project->slug) }}"
        class="block overflow-hidden aspect-video bg-stone-100 dark:bg-stone-800">
        @if ($project->thumbnail)
            <img src="{{ $project->thumbnail_url }}" alt="{{ $project->title }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
        @else
            <div
                class="w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-50 to-violet-50 dark:from-indigo-950/50 dark:to-violet-950/50">
                <svg class="w-12 h-12 text-indigo-300 dark:text-indigo-700" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                </svg>
            </div>
        @endif
    </a>

    <div class="p-5 flex flex-col flex-1">
        {{-- Status badge --}}
        @if ($project->isFeatured())
            <div class="flex items-center gap-1.5 mb-3">
                <span
                    class="inline-flex items-center gap-1 text-xs font-mono font-medium px-2 py-0.5 bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400 rounded-full">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                    </svg>
                    Featured
                </span>
            </div>
        @endif

        {{-- Title --}}
        <h3
            class="font-bold text-stone-900 dark:text-stone-100 text-lg mb-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
            <a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a>
        </h3>

        {{-- Excerpt --}}
        @if ($project->excerpt)
            <p class="text-stone-500 dark:text-stone-400 text-sm leading-relaxed mb-4 flex-1">
                {{ Str::limit($project->excerpt, 100) }}
            </p>
        @endif

        {{-- Technologies --}}
        @if ($project->technologies->isNotEmpty())
            <div class="flex flex-wrap gap-1.5 mb-4">
                @foreach ($project->technologies->take(4) as $tech)
                    <span
                        class="text-xs px-2 py-0.5 bg-stone-100 dark:bg-stone-700/60 text-stone-600 dark:text-stone-400 rounded-md font-mono">
                        {{ $tech->name }}
                    </span>
                @endforeach
                @if ($project->technologies->count() > 4)
                    <span
                        class="text-xs px-2 py-0.5 bg-stone-100 dark:bg-stone-700/60 text-stone-500 dark:text-stone-500 rounded-md font-mono">
                        +{{ $project->technologies->count() - 4 }}
                    </span>
                @endif
            </div>
        @endif

        {{-- Links --}}
        <div class="flex items-center gap-2 mt-auto pt-4 border-t border-stone-100 dark:border-stone-700/50">
            <a href="{{ route('projects.show', $project->slug) }}"
                class="flex-1 text-center text-xs font-semibold px-3 py-2 bg-stone-100 dark:bg-stone-700/60 text-stone-700 dark:text-stone-300 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors">
                Detail
            </a>
            @if ($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer"
                    class="flex items-center gap-1 text-xs font-semibold px-3 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    Demo
                </a>
            @endif
            @if ($project->repo_url)
                <a href="{{ $project->repo_url }}" target="_blank" rel="noopener noreferrer"
                    class="flex items-center justify-center w-8 h-8 bg-stone-800 dark:bg-stone-700 text-white rounded-lg hover:bg-stone-700 dark:hover:bg-stone-600 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
                    </svg>
                </a>
            @endif
        </div>
    </div>
</article>
