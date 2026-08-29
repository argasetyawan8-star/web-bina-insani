<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title') | Bina Insani Admin
    </title>


    {{-- =========================================================
         BOOTSTRAP ICONS
    ========================================================== --}}

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
    >


    {{-- =========================================================
         VITE
    ========================================================== --}}

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('styles')

</head>



<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">


{{-- =============================================================
     SIDEBAR
============================================================== --}}

<aside
    class="fixed left-0 top-0 z-40 flex h-screen w-72 flex-col border-r border-slate-200 bg-white shadow-lg"
>


    {{-- =========================================================
         LOGO / BRAND
    ========================================================== --}}

    <div
        class="flex h-20 shrink-0 items-center gap-3 border-b border-slate-200 px-6"
    >

        {{-- LOGO --}}
        <div
            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-slate-50 shadow-sm"
        >

            @if(setting('logo'))

                <img
                    src="{{ asset('storage/'.setting('logo')) }}"
                    alt="Bina Insani"
                    class="h-9 w-9 object-contain"
                >

            @else

                <img
                    src="{{ asset('gallery/BI.png') }}"
                    alt="Bina Insani"
                    class="h-9 w-9 object-contain"
                >

            @endif

        </div>


        {{-- BRAND TEXT --}}
        <div class="min-w-0">

            <h1
                class="truncate text-xl font-extrabold text-[#ED1C24]"
            >
                Bina Insani
            </h1>

            <p
                class="text-xs text-slate-500"
            >
                Admin Panel
            </p>

        </div>

    </div>



    {{-- =========================================================
         SIDEBAR MENU
    ========================================================== --}}

    <nav
        class="flex-1 space-y-1 overflow-y-auto px-4 py-5"
    >


        {{-- =====================================================
             MAIN
        ====================================================== --}}

        <p
            class="mb-3 px-3 text-[11px] font-bold uppercase tracking-[0.18em] text-slate-400"
        >
            Main
        </p>


        {{-- DASHBOARD --}}
        <a
            href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
            {{ request()->routeIs('admin.dashboard')
                ? 'bg-[#2E3192] text-white shadow-md'
                : 'text-slate-700 hover:bg-[#2E3192]/5 hover:text-[#2E3192]' }}"
        >

            <i class="bi bi-grid-fill text-lg"></i>

            <span>
                Dashboard
            </span>

        </a>



        {{-- =====================================================
             TRANSAKSI
        ====================================================== --}}

        <p
            class="mb-3 mt-7 px-3 text-[11px] font-bold uppercase tracking-[0.18em] text-slate-400"
        >
            Transaksi
        </p>


        {{-- DATA PESERTA --}}
        <a
            href="{{ route('admin.registrations.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
            {{ request()->routeIs('admin.registrations.*')
                ? 'bg-[#2E3192] text-white shadow-md'
                : 'text-slate-700 hover:bg-[#2E3192]/5 hover:text-[#2E3192]' }}"
        >

            <i class="bi bi-people-fill text-lg"></i>

            <span>
                Data Peserta
            </span>

        </a>


        {{-- PEMBAYARAN --}}
        <a
            href="{{ route('admin.payments.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
            {{ request()->routeIs('admin.payments.*')
                ? 'bg-[#2E3192] text-white shadow-md'
                : 'text-slate-700 hover:bg-[#2E3192]/5 hover:text-[#2E3192]' }}"
        >

            <i class="bi bi-credit-card-fill text-lg"></i>

            <span>
                Pembayaran
            </span>

        </a>


        {{-- LAPORAN --}}
        <a
            href="{{ route('admin.reports.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
            {{ request()->routeIs('admin.reports.*')
                ? 'bg-[#2E3192] text-white shadow-md'
                : 'text-slate-700 hover:bg-[#2E3192]/5 hover:text-[#2E3192]' }}"
        >

            <i class="bi bi-file-earmark-bar-graph-fill text-lg"></i>

            <span>
                Laporan
            </span>

        </a>



        {{-- =====================================================
             WEBSITE
        ====================================================== --}}

        <p
            class="mb-3 mt-7 px-3 text-[11px] font-bold uppercase tracking-[0.18em] text-slate-400"
        >
            Website
        </p>


        {{-- HERO --}}
        <a
            href="{{ route('admin.hero.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
            {{ request()->routeIs('admin.hero.*')
                ? 'bg-[#2E3192] text-white shadow-md'
                : 'text-slate-700 hover:bg-[#2E3192]/5 hover:text-[#2E3192]' }}"
        >

            <i class="bi bi-stars text-lg"></i>

            <span>
                Hero Website
            </span>

        </a>


        {{-- ABOUT --}}
        <a
            href="{{ route('admin.about.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
            {{ request()->routeIs('admin.about.*')
                ? 'bg-[#2E3192] text-white shadow-md'
                : 'text-slate-700 hover:bg-[#2E3192]/5 hover:text-[#2E3192]' }}"
        >

            <i class="bi bi-person-badge text-lg"></i>

            <span>
                About Website
            </span>

        </a>


        {{-- PROGRAM --}}
        <a
            href="{{ route('admin.programs.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
            {{ request()->routeIs('admin.programs.*')
                ? 'bg-[#2E3192] text-white shadow-md'
                : 'text-slate-700 hover:bg-[#2E3192]/5 hover:text-[#2E3192]' }}"
        >

            <i class="bi bi-mortarboard-fill text-lg"></i>

            <span>
                Program Diklat
            </span>

        </a>


        {{-- GALLERY --}}
        <a
            href="{{ route('admin.gallery.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
            {{ request()->routeIs('admin.gallery.*')
                ? 'bg-[#2E3192] text-white shadow-md'
                : 'text-slate-700 hover:bg-[#2E3192]/5 hover:text-[#2E3192]' }}"
        >

            <i class="bi bi-images text-lg"></i>

            <span>
                Gallery Website
            </span>

        </a>


        {{-- FAQ --}}
        <a
            href="{{ route('admin.faqs.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
            {{ request()->routeIs('admin.faqs.*')
                ? 'bg-[#2E3192] text-white shadow-md'
                : 'text-slate-700 hover:bg-[#2E3192]/5 hover:text-[#2E3192]' }}"
        >

            <i class="bi bi-question-circle text-lg"></i>

            <span>
                FAQ Website
            </span>

        </a>


        {{-- CONTACT --}}
        <a
            href="{{ route('admin.contact.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
            {{ request()->routeIs('admin.contact.*')
                ? 'bg-[#2E3192] text-white shadow-md'
                : 'text-slate-700 hover:bg-[#2E3192]/5 hover:text-[#2E3192]' }}"
        >

            <i class="bi bi-telephone text-lg"></i>

            <span>
                Contact Website
            </span>

        </a>


        {{-- PAYMENT SETTING --}}
        <a
            href="{{ route('admin.payment-setting.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
            {{ request()->routeIs('admin.payment-setting.*')
                ? 'bg-[#2E3192] text-white shadow-md'
                : 'text-slate-700 hover:bg-[#2E3192]/5 hover:text-[#2E3192]' }}"
        >

            <i class="bi bi-credit-card-fill text-lg"></i>

            <span>
                Pengaturan Pembayaran
            </span>

        </a>


        {{-- WEBSITE SETTINGS --}}
        <a
            href="{{ route('admin.settings.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
            {{ request()->routeIs('admin.settings.*')
                ? 'bg-[#2E3192] text-white shadow-md'
                : 'text-slate-700 hover:bg-[#2E3192]/5 hover:text-[#2E3192]' }}"
        >

            <i class="bi bi-gear-fill text-lg"></i>

            <span>
                Footer & Pengaturan
            </span>

        </a>

    </nav>



</aside>



{{-- =============================================================
     MAIN
============================================================== --}}

<main
    class="ml-72 min-h-screen"
>


    {{-- =========================================================
         TOP NAVBAR
    ========================================================== --}}

    <header
        class="sticky top-0 z-30 flex h-20 items-center justify-between border-b border-slate-200 bg-white/95 px-6 shadow-sm backdrop-blur sm:px-8"
    >


        {{-- PAGE TITLE --}}
        <div class="min-w-0">

            <h2
                class="truncate text-xl font-extrabold text-slate-800 sm:text-2xl"
            >
                @yield('title')
            </h2>

            <p
                class="mt-0.5 hidden text-sm text-slate-500 sm:block"
            >
                Bina Insani Admin Dashboard
            </p>

        </div>



        {{-- =====================================================
             PROFILE DROPDOWN
        ====================================================== --}}

        <div
            x-data="{ open: false }"
            class="relative"
        >


            {{-- PROFILE BUTTON --}}
            <button
                type="button"
                @click="open = !open"
                @click.outside="open = false"
                class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white px-2.5 py-2 transition hover:border-[#2E3192]/20 hover:bg-slate-50"
            >

                {{-- AVATAR --}}
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-[#2E3192] to-blue-600 font-bold text-white shadow-sm"
                >
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>


                {{-- USER INFO --}}
                <div class="hidden text-left sm:block">

                    <p
                        class="max-w-[140px] truncate text-sm font-bold text-slate-800"
                    >
                        {{ Auth::user()->name }}
                    </p>

                    <p
                        class="text-xs text-slate-500"
                    >
                        Administrator
                    </p>

                </div>


                <i
                    class="bi bi-chevron-down hidden text-xs text-slate-400 transition sm:block"
                    :class="open ? 'rotate-180' : ''"
                ></i>

            </button>



            {{-- =================================================
                 DROPDOWN
            ================================================== --}}

            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                x-cloak
                class="absolute right-0 mt-3 w-64 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl"
            >


                {{-- USER HEADER --}}
                <div
                    class="border-b border-slate-100 bg-slate-50 px-5 py-4"
                >

                    <p
                        class="text-xs font-semibold uppercase tracking-wider text-slate-400"
                    >
                        Akun Admin
                    </p>

                    <p
                        class="mt-1 truncate font-bold text-slate-800"
                    >
                        {{ Auth::user()->name }}
                    </p>

                    <p
                        class="mt-0.5 truncate text-xs text-slate-500"
                    >
                        {{ Auth::user()->email }}
                    </p>

                </div>



                {{-- MENU --}}
                <div class="p-2">


                    {{-- PROFIL --}}
                    <a
                        href="{{ route('admin.profile.index') }}"
                        class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-slate-700 transition hover:bg-[#2E3192]/5 hover:text-[#2E3192]"
                    >

                        <span
                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#2E3192]/10 text-[#2E3192]"
                        >
                            <i class="bi bi-person-circle"></i>
                        </span>

                        <span>
                            Profil Saya
                        </span>

                    </a>



                    {{-- PASSWORD --}}
                    <a
                        href="{{ route('admin.password.edit') }}"
                        class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-slate-700 transition hover:bg-[#2E3192]/5 hover:text-[#2E3192]"
                    >

                        <span
                            class="flex h-9 w-9 items-center justify-center rounded-lg bg-yellow-100 text-yellow-700"
                        >
                            <i class="bi bi-key-fill"></i>
                        </span>

                        <span>
                            Ubah Password
                        </span>

                    </a>



                    {{-- DIVIDER --}}
                    <div
                        class="my-2 border-t border-slate-100"
                    ></div>



                    {{-- LOGOUT --}}
                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-red-500 transition hover:bg-red-50"
                        >

                            <span
                                class="flex h-9 w-9 items-center justify-center rounded-lg bg-red-50 text-red-500"
                            >
                                <i class="bi bi-box-arrow-right"></i>
                            </span>

                            <span>
                                Keluar
                            </span>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </header>



    {{-- =========================================================
         CONTENT
    ========================================================== --}}

    <div
        class="p-5 sm:p-6 lg:p-8"
    >

        @yield('content')

    </div>


</main>



@stack('scripts')

</body>

</html>
