<header
    x-data="{ open: false, scrolled: false }"
    @scroll.window="scrolled = window.pageYOffset > 20"
    class="fixed top-0 left-0 right-0 z-50"
>

    <nav
        :class="scrolled
            ? 'bg-white/80 backdrop-blur-xl shadow-lg border border-slate-200/70'
            : 'bg-white/60 backdrop-blur-lg border border-white/30'"
        class="mx-auto mt-4 flex max-w-7xl items-center justify-between rounded-2xl px-6 py-4 transition-all duration-300">

        {{-- Logo --}}
        <a href="/" class="flex items-center gap-3">

            <div
                class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 text-white shadow-lg">

                <i class="bi bi-mortarboard-fill text-lg"></i>

            </div>

            <div>

                <h1 class="text-lg font-bold text-slate-800">

                    Bina Insani

                </h1>

                <p class="text-xs text-slate-500">

                    Korea Training Center

                </p>

            </div>

        </a>

        {{-- Desktop Menu --}}
        <ul class="hidden items-center gap-8 lg:flex">

            <li>
                <a href="#programs"
                    class="font-medium text-slate-600 transition hover:text-blue-600">
                    Program
                </a>
            </li>

            <li>
                <a href="#process"
                    class="font-medium text-slate-600 transition hover:text-blue-600">
                    Alur
                </a>
            </li>

            <li>
                <a href="#galery"
                    class="font-medium text-slate-600 transition hover:text-blue-600">
                    Gallery
                </a>
            </li>

            <li>
                <a href="#faq"
                    class="font-medium text-slate-600 transition hover:text-blue-600">
                    FAQ
                </a>
            </li>

            <li>
                <a href="#contact"
                    class="font-medium text-slate-600 transition hover:text-blue-600">
                    Kontak
                </a>
            </li>

        </ul>

        {{-- Desktop Button --}}
        <div class="hidden lg:block">

            <a href="#programs"
                class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                Daftar Sekarang

            </a>

        </div>

        {{-- Mobile Button --}}
        <button
            @click="open=!open"
            class="rounded-xl border border-slate-200 p-2 lg:hidden">

            <i class="bi bi-list text-2xl"></i>

        </button>

    </nav>

    {{-- Mobile Menu --}}
    <div
        x-show="open"
        x-transition
        @click.outside="open=false"
        class="mx-4 mt-3 rounded-2xl bg-white/90 p-5 shadow-xl backdrop-blur-xl lg:hidden">

        <div class="space-y-5">

            <a href="#programs" @click="open=false" class="block font-medium text-slate-700">
                Program
            </a>

            <a href="#process" @click="open=false" class="block font-medium text-slate-700">
                Alur
            </a>

            <a href="#galery" @click="open=false" class="block font-medium text-slate-700">
                Gallery
            </a>

            <a href="#faq" @click="open=false" class="block font-medium text-slate-700">
                FAQ
            </a>

            <a href="#contact" @click="open=false" class="block font-medium text-slate-700">
                Kontak
            </a>

            <a href="#programs"
                class="mt-3 block rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 py-3 text-center font-semibold text-white">

                Daftar Sekarang

            </a>

        </div>

    </div>

</header>