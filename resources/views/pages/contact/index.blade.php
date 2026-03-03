@extends('layouts.app')

@section('title', 'Contact — ' . config('app.name'))
@section('description', 'Get in touch with me. I\'m always open to discussing new projects and opportunities.')

@section('content')
    <div class="pt-28 pb-20 max-w-6xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            {{-- Left Info --}}
            <div>
                <span class="font-mono text-xs text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">Let's
                    Talk</span>
                <h1 class="text-4xl font-display font-bold text-stone-900 dark:text-stone-100 mt-2 mb-4">Get In Touch</h1>
                <p class="text-stone-500 dark:text-stone-400 leading-relaxed mb-8">
                    Have a project idea, want to collaborate, or just want to say hi? I'd love to hear from you. Fill out
                    the form and I'll get back to you as soon as possible.
                </p>

                <div class="space-y-4 mb-10">
                    @if (config('portfolio.social.whatsapp'))
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M380.9 97.1c-41.9-42-97.7-65.1-157-65.1-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480 117.7 449.1c32.4 17.7 68.9 27 106.1 27l.1 0c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3 18.6-68.1-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1s56.2 81.2 56.1 130.5c0 101.8-84.9 184.6-186.6 184.6zM325.1 300.5c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8s-14.3 18-17.6 21.8c-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7s-12.5-30.1-17.1-41.2c-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2s-9.7 1.4-14.8 6.9c-5.1 5.6-19.4 19-19.4 46.3s19.9 53.7 22.6 57.4c2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4s4.6-24.1 3.2-26.4c-1.3-2.5-5-3.9-10.5-6.6z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-mono text-stone-400 uppercase tracking-wide">WhatsApp</p>
                                <a href="{{ config('portfolio.social.whatsapp') }}" target="_blank"
                                    class="text-stone-700 dark:text-stone-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                    {{ config('portfolio.social.whatsapp') }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if (config('portfolio.social.email'))
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 bg-indigo-100 dark:bg-indigo-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-mono text-stone-400 uppercase tracking-wide">Email</p>
                                <a href="mailto:{{ config('portfolio.social.email') }}"
                                    class="text-stone-700 dark:text-stone-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                    {{ config('portfolio.social.email') }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if (config('portfolio.social.github'))
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 bg-stone-100 dark:bg-stone-800 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-stone-700 dark:text-stone-400" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-mono text-stone-400 uppercase tracking-wide">GitHub</p>
                                <a href="{{ config('portfolio.social.github') }}" target="_blank"
                                    class="text-stone-700 dark:text-stone-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                    {{ config('portfolio.social.github') }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if (config('portfolio.social.linkedin'))
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-mono text-stone-400 uppercase tracking-wide">LinkedIn</p>
                                <a href="{{ config('portfolio.social.linkedin') }}" target="_blank"
                                    class="text-stone-700 dark:text-stone-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors text-sm">
                                    Connect on LinkedIn
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Availability note --}}
                <div
                    class="flex items-center gap-3 p-4 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800/50 rounded-xl">
                    <div class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-pulse flex-shrink-0"></div>
                    <p class="text-sm text-emerald-700 dark:text-emerald-400">
                        <strong>Currently available</strong> for new projects and collaborations.
                    </p>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="bg-white dark:bg-stone-800/60 rounded-3xl border border-stone-200 dark:border-stone-700 p-8">
                @if (session('success'))
                    <div
                        class="mb-6 p-4 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-700 rounded-xl">
                        <div class="flex items-center gap-2 text-emerald-700 dark:text-emerald-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="name"
                                class="block text-sm font-medium text-stone-700 dark:text-stone-300 mb-1.5">
                                Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="w-full px-4 py-2.5 bg-stone-50 dark:bg-stone-700/60 border {{ $errors->has('name') ? 'border-red-400' : 'border-stone-200 dark:border-stone-600' }} rounded-xl text-stone-800 dark:text-stone-200 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all text-sm"
                                placeholder="Your name" required>
                            @error('name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email"
                                class="block text-sm font-medium text-stone-700 dark:text-stone-300 mb-1.5">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full px-4 py-2.5 bg-stone-50 dark:bg-stone-700/60 border {{ $errors->has('email') ? 'border-red-400' : 'border-stone-200 dark:border-stone-600' }} rounded-xl text-stone-800 dark:text-stone-200 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all text-sm"
                                placeholder="your@email.com" required>
                            @error('email')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="subject"
                            class="block text-sm font-medium text-stone-700 dark:text-stone-300 mb-1.5">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                            class="w-full px-4 py-2.5 bg-stone-50 dark:bg-stone-700/60 border border-stone-200 dark:border-stone-600 rounded-xl text-stone-800 dark:text-stone-200 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all text-sm"
                            placeholder="Project Inquiry, Collaboration, etc.">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-stone-700 dark:text-stone-300 mb-1.5">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea id="message" name="message" rows="6"
                            class="w-full px-4 py-2.5 bg-stone-50 dark:bg-stone-700/60 border {{ $errors->has('message') ? 'border-red-400' : 'border-stone-200 dark:border-stone-600' }} rounded-xl text-stone-800 dark:text-stone-200 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all text-sm resize-none"
                            placeholder="Tell me about your project or what you'd like to discuss..." required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-all duration-200 hover:shadow-lg hover:shadow-indigo-500/25">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
