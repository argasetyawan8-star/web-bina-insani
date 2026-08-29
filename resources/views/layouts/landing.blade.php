<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    {{-- =========================================================
        PAGE TITLE
    ========================================================== --}}
    <title>
        @yield('title', 'Bina Insani Platform')
        | {{ setting('website_name', 'Bina Insani Platform') }}
    </title>

    {{-- =========================================================
        SEO
    ========================================================== --}}
    <meta
        name="description"
        content="Platform Pendaftaran Pelatihan Bahasa Korea dan Persiapan Kerja ke Korea Selatan."
    >

    <meta
        name="theme-color"
        content="#2E3192"
    >

    {{-- =========================================================
        FAVICON
    ========================================================== --}}
    @php
        $favicon = setting('favicon');
    @endphp

    @if ($favicon)
        <link
            rel="icon"
            type="image/png"
            href="{{ asset('storage/' . $favicon) }}"
        >
    @else
        <link
            rel="icon"
            type="image/png"
            href="{{ asset('gallery/BI.png') }}"
        >
    @endif

    {{-- =========================================================
        VITE
    ========================================================== --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    {{-- =========================================================
        GOOGLE FONTS
    ========================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- =========================================================
        BOOTSTRAP ICONS
    ========================================================== --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    {{-- =========================================================
        AOS ANIMATION
    ========================================================== --}}
    <link
        href="https://unpkg.com/aos@2.3.4/dist/aos.css"
        rel="stylesheet"
    >

    {{-- =========================================================
        BASE STYLE
    ========================================================== --}}
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>

    {{-- =========================================================
        PAGE-SPECIFIC HEAD
    ========================================================== --}}
    @stack('styles')

</head>

<body class="bg-slate-50 text-slate-800 antialiased">

    {{-- =========================================================
        BACKGROUND DECORATION
    ========================================================== --}}
    <div
        class="fixed inset-0 -z-50 overflow-hidden pointer-events-none"
        aria-hidden="true"
    >
        <div
            class="absolute -top-52 -left-44 h-[500px] w-[500px] rounded-full bg-blue-200 opacity-60 blur-[140px]"
        ></div>

        <div
            class="absolute top-1/3 -right-40 h-[450px] w-[450px] rounded-full bg-indigo-200 opacity-60 blur-[140px]"
        ></div>

        <div
            class="absolute bottom-0 left-1/3 h-[350px] w-[350px] rounded-full bg-sky-100 blur-[120px]"
        ></div>
    </div>


    {{-- =========================================================
        NAVBAR
    ========================================================== --}}
    @include('partials.navbar')


    {{-- =========================================================
        MAIN CONTENT
    ========================================================== --}}
    <main>
        @yield('content')
    </main>


    {{-- =========================================================
        FOOTER
    ========================================================== --}}
    @include('partials.footer')


    {{-- =========================================================
        BACK TO TOP BUTTON
    ========================================================== --}}
    <button
        id="backToTop"
        type="button"
        aria-label="Kembali ke atas"
        class="fixed bottom-6 right-6 z-40 hidden h-12 w-12 items-center justify-center rounded-full bg-blue-600 text-white shadow-xl transition duration-300 hover:scale-105 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200"
    >
        <i class="bi bi-arrow-up text-lg"></i>
    </button>


    {{-- =========================================================
        AOS SCRIPT
    ========================================================== --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            /*
            |--------------------------------------------------------------------------
            | AOS INITIALIZATION
            |--------------------------------------------------------------------------
            */

            if (typeof AOS !== 'undefined') {
                AOS.init({
                    once: true,
                    duration: 700,
                    easing: 'ease-out',
                    offset: 80,
                });
            }


            /*
            |--------------------------------------------------------------------------
            | BACK TO TOP
            |--------------------------------------------------------------------------
            */

            const backToTop = document.getElementById('backToTop');

            if (!backToTop) {
                return;
            }

            const toggleBackToTop = () => {
                if (window.scrollY > 500) {
                    backToTop.classList.remove('hidden');
                    backToTop.classList.add('flex');
                } else {
                    backToTop.classList.add('hidden');
                    backToTop.classList.remove('flex');
                }
            };

            window.addEventListener(
                'scroll',
                toggleBackToTop,
                { passive: true }
            );

            toggleBackToTop();

            backToTop.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth',
                });
            });

        });
    </script>


    {{-- =========================================================
        PAGE-SPECIFIC SCRIPTS
    ========================================================== --}}
    @stack('scripts')

</body>

</html>