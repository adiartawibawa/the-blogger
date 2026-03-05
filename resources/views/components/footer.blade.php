<footer class="bg-stone-100 dark:bg-stone-900 border-t border-stone-200 dark:border-stone-800 mt-24 bg-pattern">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 py-12">
        {{-- Main Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-12">

            {{-- Column 1: Brand --}}
            <div class="col-span-1 sm:col-span-2 md:col-span-1">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-7 h-7 bg-indigo-600 dark:bg-indigo-500 rounded-md flex items-center justify-center">
                        <span class="text-white font-mono font-bold text-xs">
                            {{ strtoupper(substr(config('portfolio.owner_name', 'D'), 0, 1)) }}
                        </span>
                    </div>
                    <span class="font-mono font-bold text-stone-900 dark:text-stone-100">
                        {{ config('portfolio.owner_name', 'DevPortfolio') }}
                    </span>
                </div>
                <p class="text-stone-500 dark:text-stone-400 text-sm leading-relaxed max-w-xs">
                    {{ config('portfolio.owner_bio', 'Building beautiful & functional web experiences.') }}
                </p>
            </div>

            {{-- Column 2: Quick Links --}}
            <div>
                <h4 class="font-semibold text-stone-900 dark:text-stone-100 text-sm mb-4">Navigasi</h4>
                <ul class="space-y-2">
                    @foreach ([['route' => 'home', 'label' => 'Home'], ['route' => 'about', 'label' => 'About'], ['route' => 'projects.index', 'label' => 'Projects'], ['route' => 'blog.index', 'label' => 'Blog'], ['route' => 'contact.index', 'label' => 'Contact']] as $item)
                        <li>
                            <a href="{{ route($item['route']) }}"
                                class="text-stone-500 dark:text-stone-400 hover:text-indigo-600 dark:hover:text-indigo-400 text-sm transition-colors">
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 3: Legal (New Section) --}}
            <div>
                <h4 class="font-semibold text-stone-900 dark:text-stone-100 text-sm mb-4">Legal</h4>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('privacy') }}"
                            class="text-stone-500 dark:text-stone-400 hover:text-indigo-600 dark:hover:text-indigo-400 text-sm transition-colors">
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}"
                            class="text-stone-500 dark:text-stone-400 hover:text-indigo-600 dark:hover:text-indigo-400 text-sm transition-colors">
                            Terms of Service
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Column 4: Social Links --}}
            <div>
                <h4 class="font-semibold text-stone-900 dark:text-stone-100 text-sm mb-4">Connect</h4>
                <div class="flex flex-wrap gap-2">
                    {{-- GitHub --}}
                    @if (config('portfolio.social.github'))
                        <a href="{{ config('portfolio.social.github') }}" target="_blank" rel="noopener noreferrer"
                            class="w-9 h-9 bg-stone-200 dark:bg-stone-800 rounded-lg flex items-center justify-center text-stone-600 dark:text-stone-400 hover:bg-indigo-100 dark:hover:bg-indigo-900/40 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all"
                            title="GitHub">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
                            </svg>
                        </a>
                    @endif

                    {{-- LinkedIn --}}
                    @if (config('portfolio.social.linkedin'))
                        <a href="{{ config('portfolio.social.linkedin') }}" target="_blank" rel="noopener noreferrer"
                            class="w-9 h-9 bg-stone-200 dark:bg-stone-800 rounded-lg flex items-center justify-center text-stone-600 dark:text-stone-400 hover:bg-blue-100 dark:hover:bg-blue-900/40 hover:text-blue-600 dark:hover:text-blue-400 transition-all"
                            title="LinkedIn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                    @endif

                    {{-- Email --}}
                    @if (config('portfolio.social.email'))
                        <a href="mailto:{{ config('portfolio.social.email') }}"
                            class="w-9 h-9 bg-stone-200 dark:bg-stone-800 rounded-lg flex items-center justify-center text-stone-600 dark:text-stone-400 hover:bg-indigo-100 dark:hover:bg-indigo-900/40 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all"
                            title="Email">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div
            class="border-t border-stone-200 dark:border-stone-800 pt-6 flex flex-row md:flex-row items-center justify-between gap-4">
            <p class="text-stone-400 dark:text-stone-500 text-xs tracking-tighter font-mono">
                &copy; {{ date('Y') }} {{ config('portfolio.owner_name', 'DevPortfolio') }}. All rights reserved.
            </p>
            <div
                class="flex items-center gap-1.5 text-stone-400 dark:text-stone-500 text-xs tracking-tighter font-mono">
                <span>Built with</span>
                <span class="text-red-500/80 animate-pulse text-xs">♥</span>
                <span>Laravel & Tailwind</span>
            </div>
        </div>
    </div>
</footer>
