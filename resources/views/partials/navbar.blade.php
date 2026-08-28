{{-- NAVBAR WRAPPER --}}
<div
    x-data="{
        open: false,
        scrolled: false
    }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 20
        })

        window.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                open = false
            }
        })
    "
    @resize.window="if (window.innerWidth >= 1024) open = false"
>

    {{-- NAVBAR --}}
    <nav
    :class="scrolled
        ? 'bg-white/95 backdrop-blur-xl shadow-lg py-3'
        : 'bg-white/80 backdrop-blur-lg py-4 sm:py-5'"
    class="fixed inset-x-0 top-0 z-[100] w-full max-w-full overflow-hidden border-b border-slate-100 transition-all duration-300"
>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex w-full min-w-0 items-center justify-between">

            {{-- LOGO --}}
            <a
                href="#home"
                @click="open = false"
                class="flex min-w-0 items-center gap-2.5 sm:gap-4"
            >

                @if(setting('logo'))
                    <img
                        src="{{ asset('storage/'.setting('logo')) }}"
                        class="h-10 w-10 shrink-0 object-contain sm:h-12 sm:w-12"
                        alt="{{ setting('website_name', 'Bina Insani') }}"
                    >
                @endif

                <div class="min-w-0">
                    <h2 class="truncate text-base font-extrabold text-accent sm:text-xl">
                        {{ setting('website_name', 'Bina Insani') }}
                    </h2>

                    <p class="truncate text-[9px] text-slate-500 sm:text-xs">
                        Migrant Training Center
                    </p>
                </div>

            </a>


            {{-- DESKTOP MENU --}}
            <ul class="hidden lg:flex items-center gap-7 text-sm font-semibold">

                <li>
                    <a href="#home" class="text-slate-700 hover:text-primary transition">
                        Home
                    </a>
                </li>

                <li>
                    <a href="#about" class="text-slate-700 hover:text-primary transition">
                        Tentang
                    </a>
                </li>

                <li>
                    <a href="#programs" class="text-slate-700 hover:text-primary transition">
                        Program
                    </a>
                </li>

                <li>
                    <a href="#why-us" class="text-slate-700 hover:text-primary transition">
                        Keunggulan
                    </a>
                </li>

                <li>
                    <a href="#process" class="text-slate-700 hover:text-primary transition">
                        Alur
                    </a>
                </li>

                <li>
                    <a href="#gallery" class="text-slate-700 hover:text-primary transition">
                        Galeri
                    </a>
                </li>

                <li>
                    <a href="#faq" class="text-slate-700 hover:text-primary transition">
                        FAQ
                    </a>
                </li>

                <li>
                    <a href="#contact" class="text-slate-700 hover:text-primary transition">
                        Kontak
                    </a>
                </li>

            </ul>


            {{-- DESKTOP BUTTON --}}
            <div class="hidden lg:flex items-center gap-3">

                <a
                    href="#programs"
                    class="rounded-xl bg-gradient-to-r from-primary to-blue-800 px-6 py-3 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:shadow-primary/40"
                >
                    Daftar Sekarang
                </a>

            </div>


            {{-- MOBILE BUTTON --}}
            <button
                type="button"
                @click="open = !open"
                :aria-expanded="open"
                aria-label="Toggle navigation menu"
                class="ml-3 flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-white shadow-sm transition hover:bg-slate-50 sm:h-11 sm:w-11 lg:hidden"
            >

                <i
                    x-show="!open"
                    x-transition
                    class="bi bi-list text-2xl text-primary"
                ></i>

                <i
                    x-show="open"
                    x-transition
                    class="bi bi-x-lg text-lg text-primary"
                ></i>

            </button>

        </div>

    </div>

</nav>


    {{-- MOBILE OVERLAY --}}
    <div
        x-show="open"
        x-transition:enter="transition-opacity ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="open = false"
        class="fixed inset-0 z-[90] bg-slate-900/30 backdrop-blur-sm lg:hidden"
        style="display: none;"
    ></div>


    {{-- MOBILE MENU --}}
    <div
    x-show="open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-3"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-3"
    class="fixed left-0 right-0 top-[72px] z-[95] w-full max-w-[100vw] lg:hidden"
    style="display: none;"
>

    <div class="w-full px-3 sm:px-4">

        <div class="mx-auto w-full max-w-lg overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-2xl">


            {{-- HOME --}}
            <a
                href="#home"
                @click="open = false"
                class="block w-full px-5 py-3.5 text-slate-700 font-medium transition hover:bg-indigo-50 hover:text-primary active:bg-indigo-100"
            >
                Home
            </a>


            {{-- TENTANG --}}
            <a
                href="#about"
                @click="open = false"
                class="block w-full px-5 py-3.5 text-slate-700 font-medium transition hover:bg-indigo-50 hover:text-primary active:bg-indigo-100"
            >
                Tentang
            </a>


            {{-- PROGRAM --}}
            <a
                href="#programs"
                @click="open = false"
                class="block w-full px-5 py-3.5 text-slate-700 font-medium transition hover:bg-indigo-50 hover:text-primary active:bg-indigo-100"
            >
                Program
            </a>


            {{-- KEUNGGULAN --}}
            <a
                href="#why-us"
                @click="open = false"
                class="block w-full px-5 py-3.5 text-slate-700 font-medium transition hover:bg-indigo-50 hover:text-primary active:bg-indigo-100"
            >
                Keunggulan
            </a>


            {{-- ALUR --}}
            <a
                href="#process"
                @click="open = false"
                class="block w-full px-5 py-3.5 text-slate-700 font-medium transition hover:bg-indigo-50 hover:text-primary active:bg-indigo-100"
            >
                Alur
            </a>


            {{-- GALERI --}}
            <a
                href="#gallery"
                @click="open = false"
                class="block w-full px-5 py-3.5 text-slate-700 font-medium transition hover:bg-indigo-50 hover:text-primary active:bg-indigo-100"
            >
                Galeri
            </a>


            {{-- FAQ --}}
            <a
                href="#faq"
                @click="open = false"
                class="block w-full px-5 py-3.5 text-slate-700 font-medium transition hover:bg-indigo-50 hover:text-primary active:bg-indigo-100"
            >
                FAQ
            </a>


            {{-- KONTAK --}}
            <a
                href="#contact"
                @click="open = false"
                class="block w-full px-5 py-3.5 text-slate-700 font-medium transition hover:bg-indigo-50 hover:text-primary active:bg-indigo-100"
            >
                Kontak
            </a>


            {{-- DAFTAR --}}
            <div class="w-full px-5 pt-4 pb-2">

                <a
                    href="#programs"
                    @click="open = false"
                    class="block w-full rounded-xl bg-gradient-to-r from-primary to-blue-800 py-3.5 text-center font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:shadow-primary/40"
                >
                    Daftar Sekarang
                </a>

            </div>

        </div>

    </div>

</div>

</div>