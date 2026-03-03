@extends('layouts.app')

@section('title', 'Privacy Policy — ' . config('app.name'))
@section('description', 'Information regarding the collection, use, and management of personal data on ' .
    config('app.name') . '.')

    @push('meta')
        {{-- Mencegah halaman legal mendominasi hasil pencarian --}}
        <meta name="robots" content="noindex, follow">
    @endpush

@section('content')
    <div class="py-20 pt-28 pb-20 max-w-6xl mx-auto px-6 lg:px-8">
        <header class="mb-12 border-b border-stone-200 dark:border-stone-800 pb-8">
            <h1 class="text-3xl font-bold text-stone-900 dark:text-stone-100 mb-2 font-mono tracking-tight">
                Privacy Policy
            </h1>
            <p class="text-xs text-stone-500 font-mono uppercase tracking-widest">
                Last Updated: March 3, 2026
            </p>
        </header>

        <div class="prose prose-stone dark:prose-invert max-w-none text-sm leading-relaxed">
            <section class="mb-10">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">Introduction</h2>
                <p>
                    This Privacy Policy describes how your personal information is collected, used, and protected when you
                    visit this portfolio website. I am committed to ensuring that your privacy is protected in accordance
                    with global data protection standards, including <strong>GDPR</strong> and <strong>CCPA</strong>.
                </p>
            </section>

            <section class="mb-10">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">1. Information Collection</h2>
                <p>I only collect information that you voluntarily provide through the following methods:</p>
                <ul class="list-disc pl-5 space-y-3">
                    <li>
                        <strong>Contact Information:</strong> When you utilize the contact form, I collect your name, email
                        address, and the specific content of your inquiry.
                    </li>
                    <li>
                        <strong>Usage Data:</strong> This website employs analytical tools (e.g., Google Analytics) to
                        collect non-identifiable information such as IP addresses, browser types, and page interaction data
                        to optimize system performance.
                    </li>
                </ul>
            </section>

            <section class="mb-10">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">2. Use of Information</h2>
                <p>Data collected is used strictly for the following operational purposes:</p>
                <ul class="list-disc pl-5 space-y-3">
                    <li>To facilitate professional communication and respond to inquiries.</li>
                    <li>To monitor website traffic and improve the overall user experience.</li>
                    <li><strong>Note:</strong> I do not sell, trade, or transfer your personal information to third-party
                        entities for marketing purposes.</li>
                </ul>
            </section>

            <section class="mb-10">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">3. Cookies</h2>
                <p>
                    This website utilizes cookies to enhance navigation. You may opt to disable cookies via your browser
                    settings; however, please be advised that this may restrict access to certain functionalities of the
                    site.
                </p>
            </section>

            <section class="mb-10">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">4. Data Security</h2>
                <p>
                    Standard industrial security protocols are implemented to safeguard your personal information. Data
                    transmission is encrypted, and access is strictly limited to the authorized site administrator.
                </p>
            </section>

            <section class="pt-6 border-t border-stone-200 dark:border-stone-800">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">5. Consent</h2>
                <p>By accessing and utilizing this website, you hereby acknowledge and consent to the terms outlined in this
                    Privacy Policy.</p>
            </section>
        </div>
    </div>
@endsection
