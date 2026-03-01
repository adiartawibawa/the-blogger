<article
    class="group bg-white dark:bg-stone-800/50 rounded-2xl overflow-hidden border border-stone-200 dark:border-stone-700/60 hover:border-indigo-300 dark:hover:border-indigo-700/60 transition-all duration-300 hover:shadow-xl hover:shadow-indigo-500/10 hover:-translate-y-1 flex flex-col">
    {{-- Cover Image --}}
    <a href="{{ route('blog.show', $post->slug) }}"
        class="block overflow-hidden aspect-video bg-stone-100 dark:bg-stone-800">
        @if ($post->cover_image)
            <img src="{{ $post->cover_image_url }}" alt="{{ $post->title }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
        @else
            <div class="w-full h-full flex items-center justify-center"
                style="background: linear-gradient(135deg, {{ $post->category?->color ?? '#6366f1' }}20, {{ $post->category?->color ?? '#8b5cf6' }}20)">
                <svg class="w-10 h-10 text-indigo-300 dark:text-indigo-700" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
        @endif
    </a>

    <div class="p-5 flex flex-col flex-1">
        {{-- Meta --}}
        <div class="flex items-center gap-2 mb-3">
            @if ($post->category)
                <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}"
                    class="text-xs font-mono font-medium px-2 py-0.5 rounded-full transition-colors"
                    style="background-color: {{ $post->category->color }}20; color: {{ $post->category->color }}">
                    {{ $post->category->name }}
                </a>
            @endif
            <span class="text-stone-400 dark:text-stone-500 text-xs">{{ $post->read_time }} min read</span>
        </div>

        {{-- Title --}}
        <h3
            class="font-bold text-stone-900 dark:text-stone-100 text-lg mb-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors leading-snug flex-1">
            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
        </h3>

        {{-- Excerpt --}}
        @if ($post->excerpt)
            <p class="text-stone-500 dark:text-stone-400 text-sm leading-relaxed mb-4">
                {{ Str::limit($post->excerpt, 100) }}
            </p>
        @endif

        {{-- Footer --}}
        <div class="flex items-center justify-between pt-4 border-t border-stone-100 dark:border-stone-700/50 mt-auto">
            <time class="text-xs text-stone-400 dark:text-stone-500 font-mono">
                {{ $post->published_at?->format('d M Y') }}
            </time>
            <div class="flex items-center gap-1 text-xs text-stone-400 dark:text-stone-500">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                {{ number_format($post->views) }}
            </div>
        </div>
    </div>
</article>
