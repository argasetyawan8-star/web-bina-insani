<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title') | Bina Insani Admin
    </title>

    


    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body class="bg-slate-100">


{{-- =========================
    SIDEBAR
========================== --}}

<aside class="fixed left-0 top-0 flex h-screen w-72 flex-col border-r border-slate-200 bg-white shadow-lg">


    {{-- LOGO --}}

    <div class="flex h-20 items-center gap-3 border-b px-6">


        <div class="flex h-12 w-12 items-center justify-center rounded-xl text-white shadow">

            <img src="{{ asset('storage/'.setting('logo')) }}" class="h-8 w-auto">

        </div>


        <div>

            <h1 class="text-xl font-extrabold text-Red-500">
                Bina Insani
            </h1>

            <p class="text-xs text-slate-500">
                Admin Panel
            </p>

        </div>

    </div>





    {{-- MENU --}}

    <nav class="flex-1 overflow-y-auto px-4 py-5 space-y-2">


        {{-- MAIN --}}

        <p class="px-3 text-xs font-bold uppercase text-slate-400">
            Main
        </p>



        <a
            href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition
            {{ request()->routeIs('admin.dashboard')
                ? 'bg-blue-600 text-white shadow'
                : 'text-slate-700 hover:bg-slate-100' }}">

            <i class="bi bi-grid-fill"></i>

            Dashboard

        </a>





        {{-- TRANSAKSI --}}

        <p class="mt-6 px-3 text-xs font-bold uppercase text-slate-400">
            Transaksi
        </p>



        <a
            href="{{ route('admin.registrations.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition
            {{ request()->routeIs('admin.registrations.*')
                ? 'bg-blue-600 text-white shadow'
                : 'text-slate-700 hover:bg-slate-100' }}">

            <i class="bi bi-people-fill"></i>

            Data Peserta

        </a>




        <a
            href="{{ route('admin.payments.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition
            {{ request()->routeIs('admin.payments.*')
                ? 'bg-blue-600 text-white shadow'
                : 'text-slate-700 hover:bg-slate-100' }}">

            <i class="bi bi-credit-card-fill"></i>

            Pembayaran

        </a>




        <a
            href="{{ route('admin.reports.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition
            {{ request()->routeIs('admin.reports.*')
                ? 'bg-blue-600 text-white shadow'
                : 'text-slate-700 hover:bg-slate-100' }}">

            <i class="bi bi-file-earmark-bar-graph-fill"></i>

            Laporan

        </a>






        {{-- WEBSITE --}}

        <p class="mt-6 px-3 text-xs font-bold uppercase text-slate-400">
            Website
        </p>




        <a
            href="{{ route('admin.hero.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition
            {{ request()->routeIs('admin.hero.*')
                ? 'bg-blue-600 text-white shadow'
                : 'text-slate-700 hover:bg-slate-100' }}">

            <i class="bi bi-stars"></i>

            Hero Website

        </a>




        <a
            href="{{ route('admin.about.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition
            {{ request()->routeIs('admin.about.*')
                ? 'bg-blue-600 text-white shadow'
                : 'text-slate-700 hover:bg-slate-100' }}">

            <i class="bi bi-person-badge"></i>

            About Website

        </a>





        <a
            href="{{ route('admin.programs.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition
            {{ request()->routeIs('admin.programs.*')
                ? 'bg-blue-600 text-white shadow'
                : 'text-slate-700 hover:bg-slate-100' }}">

            <i class="bi bi-mortarboard-fill"></i>

            Program Diklat

        </a>





        <a
            href="{{ route('admin.gallery.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition
            {{ request()->routeIs('admin.gallery.*')
                ? 'bg-blue-600 text-white shadow'
                : 'text-slate-700 hover:bg-slate-100' }}">

            <i class="bi bi-images"></i>

            Gallery Website

        </a>





        <a
            href="{{ route('admin.faqs.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition
            {{ request()->routeIs('admin.faqs.*')
                ? 'bg-blue-600 text-white shadow'
                : 'text-slate-700 hover:bg-slate-100' }}">

            <i class="bi bi-question-circle"></i>

            FAQ Website

        </a>





        <a
            href="{{ route('admin.contact.index') }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition
            {{ request()->routeIs('admin.contact.*')
                ? 'bg-blue-600 text-white shadow'
                : 'text-slate-700 hover:bg-slate-100' }}">

            <i class="bi bi-telephone"></i>

            Contact Website

        </a>

             <li>
    <a href="{{ route('admin.payment-setting.index') }}"
       class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-700 hover:bg-blue-50 hover:text-blue-600">

        <i class="bi bi-credit-card-fill"></i>

        Pengaturan Pembayaran

    </a>
</li>

    </nav>

   






    {{-- BOTTOM MENU --}}

    <div class="border-t bg-white p-4">


        <a
            href="{{ route('admin.settings.index') }}"
            class="mb-2 flex items-center gap-3 rounded-xl px-4 py-3 text-slate-700 transition hover:bg-slate-100">

            <i class="bi bi-gear-fill"></i>

            Pengaturan

        </a>





        <form action="{{ route('logout') }}" method="POST">

            @csrf


            <button
                class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-red-600 transition hover:bg-red-50">

                <i class="bi bi-box-arrow-right"></i>

                Logout

            </button>


        </form>


    </div>


</aside>






{{-- =========================
    MAIN
========================== --}}

<main class="ml-72 min-h-screen">



    {{-- NAVBAR --}}

    <header class="sticky top-0 z-30 flex h-20 items-center justify-between border-b border-slate-200 bg-white px-8 shadow-sm">



        <div>

            <h2 class="text-2xl font-bold text-slate-800">

                @yield('title')

            </h2>


            <p class="text-sm text-slate-500">

                Bina Insani Admin Dashboard

            </p>


        </div>





        <div class="flex items-center gap-4">


            <div class="text-right">

                <h4 class="font-semibold text-slate-800">

                    {{ Auth::user()->name }}

                </h4>


                <p class="text-xs text-slate-500">

                    Administrator

                </p>


            </div>





            <div
                class="flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-indigo-500 font-bold text-white shadow">


                {{ strtoupper(substr(Auth::user()->name,0,1)) }}


            </div>


        </div>


    </header>





    {{-- CONTENT --}}

    <div class="p-8">


        @yield('content')


    </div>



</main>



</body>

</html>