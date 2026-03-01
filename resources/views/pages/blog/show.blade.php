@extends('layouts.app')

@section('title', ($post->meta_title ?? $post->title) . ' — ' . config('app.name'))
@section('description', $post->meta_description ?? $post->excerpt)
@section('og_title', $post->meta_title ?? $post->title)
@section('og_description', $post->meta_description ?? $post->excerpt)
@section('og_type', 'article')
@if ($post->og_image || $post->cover_image)
    @section('og_image', $post->og_image_url ?? $post->cover_image_url)
@endif

@section('content')
    <div class="pt-24 pb-20">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

                {{-- Article --}}
                <article class="lg:col-span-3">
                    {{-- Back --}}
                    <a href="{{ route('blog.index') }}"
                        class="inline-flex items-center gap-2 text-sm text-stone-500 dark:text-stone-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors mb-6">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Back to Blog
                    </a>

                    {{-- Meta --}}
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        @if ($post->category)
                            <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}"
                                class="text-xs font-mono font-medium px-2.5 py-1 rounded-full"
                                style="background-color: {{ $post->category->color }}20; color: {{ $post->category->color }}">
                                {{ $post->category->name }}
                            </a>
                        @endif
                        <time class="text-sm text-stone-400 dark:text-stone-500 font-mono">
                            {{ $post->published_at?->format('d M Y') }}
                        </time>
                        <span class="text-stone-300 dark:text-stone-600">·</span>
                        <span class="text-sm text-stone-400 dark:text-stone-500">{{ $post->read_time }} min read</span>
                        <span class="text-stone-300 dark:text-stone-600">·</span>
                        <div class="flex items-center gap-1 text-sm text-stone-400 dark:text-stone-500">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            {{ number_format($post->views) }}
                        </div>
                    </div>

                    {{-- Title --}}
                    <h1 class="text-4xl font-display font-bold text-stone-900 dark:text-stone-100 leading-tight mb-4">
                        {{ $post->title }}</h1>

                    @if ($post->excerpt)
                        <p class="text-xl text-stone-500 dark:text-stone-400 leading-relaxed mb-8">{{ $post->excerpt }}</p>
                    @endif

                    {{-- Cover Image --}}
                    @if ($post->cover_image)
                        <div class="rounded-2xl overflow-hidden mb-10 aspect-video">
                            <img src="{{ $post->cover_image_url }}" alt="{{ $post->title }}"
                                class="w-full h-full object-cover">
                        </div>
                    @endif

                    {{-- TOC --}}
                    @if (count($tableOfContents) > 2)
                        <nav
                            class="bg-stone-50 dark:bg-stone-800/60 border border-stone-200 dark:border-stone-700 rounded-2xl p-5 mb-8">
                            <h4
                                class="font-mono text-xs font-semibold text-stone-500 dark:text-stone-400 uppercase tracking-wider mb-3">
                                Table of Contents</h4>
                            <ol class="space-y-1.5">
                                @foreach ($tableOfContents as $i => $item)
                                    <li class="{{ $item['level'] === 3 ? 'ml-4' : '' }}">
                                        <a href="#{{ $item['id'] }}"
                                            class="text-sm text-stone-600 dark:text-stone-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors flex items-start gap-2">
                                            <span
                                                class="font-mono text-xs text-stone-400 mt-0.5 flex-shrink-0">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                            {{ $item['text'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        </nav>
                    @endif

                    {{-- Content --}}
                    <div
                        class="prose dark:prose-invert prose-indigo max-w-none prose-headings:font-display prose-code:font-mono prose-code:text-indigo-600 dark:prose-code:text-indigo-400 prose-pre:bg-stone-900 prose-pre:border prose-pre:border-stone-700">
                        {!! $post->getRenderedContent() !!}
                    </div>

                    {{-- Tags --}}
                    @if ($post->tags->isNotEmpty())
                        <div class="mt-10 pt-6 border-t border-stone-200 dark:border-stone-700">
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="text-sm text-stone-400 dark:text-stone-500 font-mono">Tags:</span>
                                @foreach ($post->tags as $tag)
                                    <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}"
                                        class="text-xs px-2.5 py-1 bg-stone-100 dark:bg-stone-700 text-stone-600 dark:text-stone-400 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors">
                                        #{{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Share --}}
                    <div
                        class="mt-8 p-5 bg-stone-50 dark:bg-stone-800/60 rounded-2xl border border-stone-200 dark:border-stone-700">
                        <p class="text-sm font-medium text-stone-700 dark:text-stone-300 mb-3">Share this article</p>
                        <div class="flex gap-2">
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->url()) }}"
                                target="_blank"
                                class="flex items-center gap-2 px-4 py-2 bg-sky-500 text-white text-sm font-medium rounded-lg hover:bg-sky-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                </svg>
                                Tweet
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}"
                                target="_blank"
                                class="flex items-center gap-2 px-4 py-2 bg-blue-700 text-white text-sm font-medium rounded-lg hover:bg-blue-800 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                                LinkedIn
                            </a>
                            <button
                                onclick="navigator.clipboard.writeText('{{ request()->url() }}').then(() => alert('URL copied!'))"
                                class="flex items-center gap-2 px-4 py-2 bg-stone-200 dark:bg-stone-700 text-stone-700 dark:text-stone-300 text-sm font-medium rounded-lg hover:bg-stone-300 dark:hover:bg-stone-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                Copy Link
                            </button>
                        </div>
                    </div>
                </article>

                {{-- Sidebar --}}
                <aside class="space-y-6">
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
                                            class="flex items-center justify-between text-sm py-1.5 px-2 rounded-lg transition-colors text-stone-600 dark:text-stone-400 hover:bg-stone-50 dark:hover:bg-stone-700/40">
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
                                        class="text-xs px-2.5 py-1 bg-stone-100 dark:bg-stone-700 text-stone-600 dark:text-stone-400 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors">
                                        #{{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </aside>
            </div>

            {{-- Related Posts --}}
            @if ($relatedPosts->isNotEmpty())
                <div class="mt-16 pt-10 border-t border-stone-200 dark:border-stone-700">
                    <h2 class="text-2xl font-display font-bold text-stone-900 dark:text-stone-100 mb-6">Related Articles
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($relatedPosts as $relatedPost)
                            @include('components.post-card', ['post' => $relatedPost])
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
