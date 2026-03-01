<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" x-data="{ open: false, scrolled: false }"
    @scroll.window="scrolled = window.scrollY > 20">
    <div :class="scrolled ?
        'bg-stone-50/90 dark:bg-stone-950/90 backdrop-blur-md border-b border-stone-200/60 dark:border-stone-800/60 shadow-sm' :
        'bg-transparent'"
        class="transition-all duration-300">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div
                        class="w-8 h-8 bg-indigo-600 dark:bg-indigo-500 rounded-lg flex items-center justify-center group-hover:rotate-12 transition-transform duration-300">
                        <span class="text-white font-mono font-bold text-sm">
                            {{ strtoupper(substr(config('portfolio.owner_name', 'D'), 0, 1)) }}
                        </span>
                    </div>
                    <span class="font-mono text-sm font-bold tracking-tight text-stone-900 dark:text-stone-100">
                        {{ config('portfolio.owner_name', 'DevPortfolio') }}
                    </span>
                </a>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center gap-1">
                    @foreach ([['route' => 'home', 'label' => 'Home'], ['route' => 'about', 'label' => 'About'], ['route' => 'projects.index', 'label' => 'Projects'], ['route' => 'blog.index', 'label' => 'Blog'], ['route' => 'contact.index', 'label' => 'Contact']] as $item)
                        <a href="{{ route($item['route']) }}"
                            class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200
                              {{ request()->routeIs(str_replace('.index', '.*', $item['route'])) ||
                              (request()->routeIs('home') && $item['route'] === 'home')
                                  ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-950/50'
                                  : 'text-stone-600 dark:text-stone-400 hover:text-stone-900 dark:hover:text-stone-100 hover:bg-stone-100 dark:hover:bg-stone-800/50' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

                {{-- Right Actions --}}
                <div class="flex items-center gap-2">
                    {{-- Dark Mode Toggle --}}
                    <button @click="darkMode = !darkMode"
                        class="w-9 h-9 flex items-center justify-center rounded-lg text-stone-500 dark:text-stone-400 hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors"
                        aria-label="Toggle dark mode">
                        <svg x-show="!darkMode" class="w-4 h-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg x-show="darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </button>

                    {{-- Mobile Menu Button --}}
                    <button @click="open = !open"
                        class="md:hidden w-9 h-9 flex items-center justify-center rounded-lg hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors">
                        <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-end="opacity-0 -translate-y-2"
            class="md:hidden border-t border-stone-200 dark:border-stone-800 bg-stone-50 dark:bg-stone-950">
            <div class="px-6 py-4 space-y-1">
                @foreach ([['route' => 'home', 'label' => 'Home'], ['route' => 'about', 'label' => 'About'], ['route' => 'projects.index', 'label' => 'Projects'], ['route' => 'blog.index', 'label' => 'Blog'], ['route' => 'contact.index', 'label' => 'Contact']] as $item)
                    <a href="{{ route($item['route']) }}" @click="open = false"
                        class="block px-4 py-2.5 text-sm font-medium rounded-lg transition-all
                          {{ request()->routeIs(str_replace('.index', '.*', $item['route']))
                              ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-950/50'
                              : 'text-stone-600 dark:text-stone-400 hover:bg-stone-100 dark:hover:bg-stone-800' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>
