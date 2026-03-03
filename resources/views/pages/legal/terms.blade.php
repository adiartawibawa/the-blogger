@extends('layouts.app')

@section('title', 'Terms of Service — ' . config('app.name'))
@section('description', 'The legal terms and conditions governing the professional use of the ' . config('app.name') . '
    website.')

    @push('meta')
        {{-- Mencegah halaman legal mendominasi hasil pencarian --}}
        <meta name="robots" content="noindex, follow">
    @endpush

@section('content')
    <div class="py-20 pt-28 pb-20 max-w-6xl mx-auto px-6 lg:px-8">
        <header class="mb-12 border-b border-stone-200 dark:border-stone-800 pb-8">
            <h1 class="text-3xl font-bold text-stone-900 dark:text-stone-100 mb-2 font-mono tracking-tight">
                Terms of Service
            </h1>
            <p class="text-xs text-stone-500 font-mono uppercase tracking-widest">
                Effective Date: March 3, 2026
            </p>
        </header>

        <div class="prose prose-stone dark:prose-invert max-w-none text-sm leading-relaxed">
            <section class="mb-10">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">1. Acceptance of Terms</h2>
                <p>
                    By accessing and utilizing this website, you acknowledge that you have read, understood, and agree to be
                    bound by these Terms of Service and all applicable laws and regulations. If you do not agree with any of
                    these terms, you are prohibited from using or accessing this site.
                </p>
            </section>

            <section class="mb-10">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">2. Intellectual Property Rights</h2>
                <p>
                    All content displayed on this website—including but not limited to source code, project designs,
                    graphics, text, and technical documentation—is the exclusive intellectual property of
                    <strong>{{ config('portfolio.owner_name') }}</strong>, unless otherwise specified.
                </p>
                <ul class="list-disc pl-5 space-y-3 mt-4">
                    <li>Permission is granted to electronically copy and print hard copy portions of this site for the sole
                        purpose of evaluating professional qualifications.</li>
                    <li>Any unauthorized reproduction, distribution, or commercial exploitation of these materials without
                        prior written consent is strictly prohibited and may result in legal action.</li>
                </ul>
            </section>

            <section class="mb-10">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">3. Disclaimer of Warranties</h2>
                <p>
                    The materials on this website are provided on an "as is" and "as available" basis.
                    <strong>{{ config('portfolio.owner_name') }}</strong> makes no warranties, expressed or implied, and
                    hereby disclaims and negates all other warranties, including without limitation, implied warranties or
                    conditions of merchantability or fitness for a particular purpose.
                </p>
            </section>

            <section class="mb-10">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">4. Limitation of Liability</h2>
                <p>
                    In no event shall the owner be liable for any damages (including, without limitation, damages for loss
                    of data or profit, or due to business interruption) arising out of the use or inability to use the
                    materials on this website, even if notified orally or in writing of the possibility of such damage.
                </p>
            </section>

            <section class="mb-10">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">5. External Linkages</h2>
                <p>
                    This portfolio may contain links to external sites (e.g., GitHub, LinkedIn, or external project demos).
                    The inclusion of any link does not imply endorsement. Use of any such linked website is at the user's
                    own risk.
                </p>
            </section>

            <section class="pt-6 border-t border-stone-200 dark:border-stone-800">
                <h2 class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">6. Governing Law</h2>
                <p>
                    These terms and conditions are governed by and construed in accordance with the laws of Indonesia, and
                    you irrevocably submit to the exclusive jurisdiction of the courts in that location.
                </p>
            </section>
        </div>
    </div>
@endsection
