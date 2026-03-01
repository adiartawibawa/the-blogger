@extends('layouts.app')

@section('title', 'About — ' . config('app.name'))
@section('description', 'Learn more about me — my skills, experience, and passion for building great software.')

@section('content')
    <div class="pt-28 pb-20 max-w-6xl mx-auto px-6 lg:px-8">
        {{-- Hero --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start mb-20">
            <div>
                <span class="font-mono text-xs text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">About
                    Me</span>
                <h1 class="text-4xl font-display font-bold text-stone-900 dark:text-stone-100 mt-2 mb-6">
                    Crafting digital experiences with purpose.
                </h1>
                <div
                    class="prose dark:prose-invert prose-stone max-w-none text-stone-600 dark:text-stone-400 leading-relaxed space-y-4">
                    <p>{{ config('portfolio.owner_bio', 'I\'m a passionate developer who loves turning complex problems into elegant, user-friendly solutions. With a focus on clean code and thoughtful design, I build applications that make a real difference.') }}
                    </p>
                    <p>When I'm not coding, you'll find me exploring new technologies, contributing to open source, or
                        writing about my experiences on this blog.</p>
                </div>

                <div class="mt-8 flex gap-4">
                    <a href="{{ route('contact.index') }}"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition-all hover:shadow-lg hover:shadow-indigo-500/25">
                        Get In Touch
                    </a>
                    @if (config('portfolio.social.github'))
                        <a href="{{ config('portfolio.social.github') }}" target="_blank"
                            class="inline-flex items-center gap-2 px-5 py-2.5 border border-stone-300 dark:border-stone-700 text-stone-700 dark:text-stone-300 font-semibold rounded-xl hover:border-indigo-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all">
                            View GitHub
                        </a>
                    @endif
                </div>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-2 gap-4">
                @php
                    $stats = [
                        ['label' => 'Projects Completed', 'value' => \App\Models\Project::published()->count() . '+'],
                        ['label' => 'Articles Written', 'value' => \App\Models\Post::published()->count() . '+'],
                        ['label' => 'Technologies', 'value' => \App\Models\Technology::count() . '+'],
                        ['label' => 'Cup of Coffee', 'value' => '∞'],
                    ];
                @endphp
                @foreach ($stats as $stat)
                    <div
                        class="bg-white dark:bg-stone-800/60 rounded-2xl border border-stone-200 dark:border-stone-700 p-6 text-center">
                        <div class="text-3xl font-display font-bold text-indigo-600 dark:text-indigo-400 mb-1">
                            {{ $stat['value'] }}</div>
                        <div class="text-sm text-stone-500 dark:text-stone-400">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Skills / Technologies --}}
        @if ($technologies->isNotEmpty())
            <div class="mb-20">
                <div class="mb-8">
                    <span
                        class="font-mono text-xs text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">Skills</span>
                    <h2 class="text-3xl font-display font-bold text-stone-900 dark:text-stone-100 mt-1">Tech Stack</h2>
                </div>

                <div class="space-y-8">
                    @foreach ($technologies as $category => $techs)
                        <div>
                            <h3
                                class="text-sm font-mono font-semibold text-stone-500 dark:text-stone-400 uppercase tracking-widest mb-4">
                                {{ \App\Models\Technology::categories()[$category] ?? ucfirst($category) }}
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                                @foreach ($techs as $tech)
                                    <div
                                        class="flex items-center gap-3 p-3 bg-white dark:bg-stone-800/60 rounded-xl border border-stone-200 dark:border-stone-700">
                                        @if ($tech->icon)
                                            <img src="{{ $tech->icon_url }}" alt="{{ $tech->name }}"
                                                class="w-8 h-8 object-contain flex-shrink-0">
                                        @else
                                            <div class="w-8 h-8 rounded-lg flex-shrink-0"
                                                style="background-color: {{ $tech->color ?? '#6366f1' }}20">
                                                <div class="w-full h-full rounded-lg"
                                                    style="background-color: {{ $tech->color ?? '#6366f1' }}40"></div>
                                            </div>
                                        @endif
                                        <div class="flex-1 min-w-0">
                                            <div class="text-sm font-medium text-stone-800 dark:text-stone-200">
                                                {{ $tech->name }}</div>
                                            <div
                                                class="mt-1 h-1 bg-stone-100 dark:bg-stone-700 rounded-full overflow-hidden">
                                                <div class="h-full rounded-full bg-indigo-500"
                                                    style="width: {{ $tech->proficiency }}%"></div>
                                            </div>
                                        </div>
                                        <span
                                            class="text-xs font-mono text-stone-400 flex-shrink-0">{{ $tech->proficiency }}%</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Experience --}}
        @if (!empty($experiences))
            <div>
                <div class="mb-8">
                    <span
                        class="font-mono text-xs text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">Journey</span>
                    <h2 class="text-3xl font-display font-bold text-stone-900 dark:text-stone-100 mt-1">Experience</h2>
                </div>

                <div class="relative pl-6">
                    <div class="absolute left-0 top-0 bottom-0 w-px bg-stone-200 dark:bg-stone-700"></div>
                    <div class="space-y-8">
                        @foreach ($experiences as $exp)
                            <div class="relative">
                                <div
                                    class="absolute -left-6 -translate-x-1/2 w-3 h-3 bg-indigo-600 rounded-full border-2 border-stone-50 dark:border-stone-950 mt-1.5">
                                </div>
                                <div
                                    class="bg-white dark:bg-stone-800/60 rounded-2xl border border-stone-200 dark:border-stone-700 p-6 ml-4">
                                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-2 mb-2">
                                        <div>
                                            <h3 class="font-bold text-stone-900 dark:text-stone-100">
                                                {{ $exp['role'] ?? '' }}</h3>
                                            <p class="text-indigo-600 dark:text-indigo-400 text-sm">
                                                {{ $exp['company'] ?? '' }}</p>
                                        </div>
                                        <span
                                            class="font-mono text-xs text-stone-400 dark:text-stone-500 whitespace-nowrap">{{ $exp['period'] ?? '' }}</span>
                                    </div>
                                    @if (!empty($exp['description']))
                                        <p class="text-stone-500 dark:text-stone-400 text-sm leading-relaxed">
                                            {{ $exp['description'] }}</p>
                                    @endif
                                    @if (!empty($exp['technologies']))
                                        <div class="flex flex-wrap gap-1.5 mt-3">
                                            @foreach ($exp['technologies'] as $t)
                                                <span
                                                    class="text-xs px-2 py-0.5 bg-indigo-50 dark:bg-indigo-950/40 text-indigo-700 dark:text-indigo-400 rounded-md font-mono">{{ $t }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
