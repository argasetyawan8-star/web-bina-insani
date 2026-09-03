{{-- =========================================================
     NAVBAR WRAPPER
========================================================= --}}

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


    {{-- =========================================================
         NAVBAR
    ========================================================== --}}

    <nav
        :class="
            scrolled
                ? 'bg-white/95 backdrop-blur-xl shadow-lg py-3'
                : 'bg-white/80 backdrop-blur-lg py-4 sm:py-5'
        "

        class="fixed inset-x-0 top-0 z-[100] w-full border-b border-slate-100 transition-all duration-300"
    >

        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex w-full min-w-0 items-center justify-between gap-4">


                {{-- =====================================================
                     LOGO
                ====================================================== --}}

                <a
                    href="{{ route('home') }}"
                    @click="open = false"
                    class="flex min-w-0 shrink-0 items-center gap-2.5 sm:gap-4"
                >

                    @if (setting('logo'))

                        <img
                            src="{{ asset('storage/' . setting('logo')) }}"
                            class="h-10 w-10 shrink-0 object-contain sm:h-12 sm:w-12"
                            alt="{{ setting('website_name', 'Bina Insani') }}"
                        >

                    @else

                        <img
                            src="{{ asset('images/gallery/BI.png') }}"
                            class="h-10 w-10 shrink-0 object-contain sm:h-12 sm:w-12"
                            alt="{{ setting('website_name', 'Bina Insani') }}"
                        >

                    @endif


                    <div class="min-w-0">

                        <h2 class="truncate text-sm font-extrabold text-accent sm:text-xl">
                            {{ setting('website_name', 'Bina Insani') }}
                        </h2>

                        <p class="truncate text-[8px] text-slate-500 sm:text-xs">
                            Migrant Training Center
                        </p>

                    </div>

                </a>



                {{-- =====================================================
                     DESKTOP MENU
                ====================================================== --}}

                <ul class="hidden items-center gap-6 text-sm font-semibold lg:flex xl:gap-8">


                    {{-- HOME --}}
                    <li>
                        <a
                            href="{{ route('home') }}"
                            class="text-slate-700 transition hover:text-primary"
                        >
                            Home
                        </a>
                    </li>


                    {{-- PROGRAM --}}
                    <li>
                        <a
                            href="{{ route('programs.index') }}"
                            class="text-slate-700 transition hover:text-primary"
                        >
                            Program
                        </a>
                    </li>


                    {{-- FAQ --}}
                    <li>
                        <a
                            href="{{ route('faq.index') }}"
                            class="text-slate-700 transition hover:text-primary"
                        >
                            FAQ
                        </a>
                    </li>


                    {{-- KONTAK --}}
                    <li>
                        <a
                            href="{{ route('contact.public') }}"
                            class="text-slate-700 transition hover:text-primary"
                        >
                            Kontak
                        </a>
                    </li>

                </ul>



                {{-- =====================================================
                     DESKTOP AUTH
                ====================================================== --}}

                <div class="hidden items-center gap-3 lg:flex">

                    @auth

                        {{-- ADMIN --}}
                        @if (Auth::user()->hasRole('admin'))

                            <a
                                href="{{ route('admin.dashboard') }}"
                                class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary to-blue-800 px-5 py-3 font-bold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-primary/40"
                            >

                                <i class="bi bi-speedometer2"></i>

                                Dashboard Admin

                            </a>


                        {{-- PESERTA --}}
                        @elseif (Auth::user()->hasRole('peserta'))

                            <a
                                href="{{ route('dashboard') }}"
                                class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary to-blue-800 px-5 py-3 font-bold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-primary/40"
                            >

                                <i class="bi bi-person-circle"></i>

                                Dashboard

                            </a>


                        {{-- USER TANPA ROLE --}}
                        @else

                            <span
                                class="inline-flex items-center gap-2 rounded-xl bg-slate-100 px-4 py-3 text-sm font-semibold text-slate-600"
                            >

                                <i class="bi bi-person-circle"></i>

                                {{ Auth::user()->name }}

                            </span>

                        @endif


                        {{-- LOGOUT --}}
                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                            class="inline"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="inline-flex items-center gap-2 rounded-xl border border-red-200 bg-white px-5 py-3 font-bold text-red-600 transition duration-300 hover:-translate-y-1 hover:bg-red-50 hover:shadow-md"
                            >

                                <i class="bi bi-box-arrow-right"></i>

                                Logout

                            </button>

                        </form>


                    @else

                        {{-- LOGIN --}}
                        <a
                            href="{{ route('login') }}"
                            class="inline-flex items-center gap-2 rounded-xl border border-primary px-5 py-3 font-bold text-primary transition duration-300 hover:-translate-y-1 hover:bg-primary hover:text-white"
                        >

                            

                            Login

                        </a>

                    @endauth

                </div>



                {{-- =====================================================
                     MOBILE BUTTON
                ====================================================== --}}

                <button
                    type="button"
                    @click="open = !open"
                    :aria-expanded="open.toString()"
                    aria-label="Toggle navigation menu"
                    class="ml-auto flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-white shadow-sm transition hover:bg-slate-50 sm:h-11 sm:w-11 lg:hidden"
                >

                    {{-- HAMBURGER --}}
                    <i
                        x-show="!open"
                        x-transition
                        class="bi bi-list text-2xl text-primary"
                    ></i>


                    {{-- CLOSE --}}
                    <i
                        x-show="open"
                        x-transition
                        class="bi bi-x-lg text-lg text-primary"
                    ></i>

                </button>

            </div>

        </div>

    </nav>



    {{-- =========================================================
         MOBILE OVERLAY
    ========================================================== --}}

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
        aria-hidden="true"
    ></div>



    {{-- =========================================================
         MOBILE MENU
    ========================================================== --}}

    <div
        x-show="open"

        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-3"
        x-transition:enter-end="opacity-100 translate-y-0"

        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-3"

        class="fixed left-0 right-0 top-[72px] z-[95] w-full lg:hidden"

        style="display: none;"
    >

        <div class="w-full px-3 sm:px-4">

            <div class="mx-auto w-full max-w-lg overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-2xl">


                {{-- =====================================================
                     HOME
                ====================================================== --}}

                <a
                    href="{{ route('home') }}"
                    @click="open = false"
                    class="block w-full px-5 py-3.5 font-medium text-slate-700 transition hover:bg-indigo-50 hover:text-primary"
                >

                    <span class="flex items-center gap-3">

                        <i class="bi bi-house"></i>

                        Home

                    </span>

                </a>



                {{-- =====================================================
                     PROGRAM
                ====================================================== --}}

                <a
                    href="{{ route('programs.index') }}"
                    @click="open = false"
                    class="block w-full px-5 py-3.5 font-medium text-slate-700 transition hover:bg-indigo-50 hover:text-primary"
                >

                    <span class="flex items-center gap-3">

                        <i class="bi bi-mortarboard"></i>

                        Program

                    </span>

                </a>



                {{-- =====================================================
                     FAQ
                ====================================================== --}}

                <a
                    href="{{ route('faq.index') }}"
                    @click="open = false"
                    class="block w-full px-5 py-3.5 font-medium text-slate-700 transition hover:bg-indigo-50 hover:text-primary"
                >

                    <span class="flex items-center gap-3">

                        <i class="bi bi-question-circle"></i>

                        FAQ

                    </span>

                </a>



                {{-- =====================================================
                     KONTAK
                ====================================================== --}}

                <a
                    href="{{ route('contact.public') }}"
                    @click="open = false"
                    class="block w-full px-5 py-3.5 font-medium text-slate-700 transition hover:bg-indigo-50 hover:text-primary"
                >

                    <span class="flex items-center gap-3">

                        <i class="bi bi-telephone"></i>

                        Kontak

                    </span>

                </a>



                {{-- =====================================================
                     AUTH
                ====================================================== --}}

                <div class="border-t border-slate-100 px-5 py-4">

                    @auth

                        {{-- ADMIN --}}
                        @if (Auth::user()->hasRole('admin'))

                            <div class="space-y-3">

                                <a
                                    href="{{ route('admin.dashboard') }}"
                                    @click="open = false"
                                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-primary to-blue-800 py-3.5 font-bold text-white shadow-lg transition hover:-translate-y-0.5"
                                >

                                    <i class="bi bi-speedometer2"></i>

                                    Dashboard Admin

                                </a>


                                <form
                                    method="POST"
                                    action="{{ route('logout') }}"
                                    class="w-full"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        @click="open = false"
                                        class="flex w-full items-center justify-center gap-2 rounded-xl border border-red-200 bg-white py-3.5 font-bold text-red-600 transition hover:bg-red-50"
                                    >

                                        <i class="bi bi-box-arrow-right"></i>

                                        Logout

                                    </button>

                                </form>

                            </div>


                        {{-- PESERTA --}}
                        @elseif (Auth::user()->hasRole('peserta'))

                            <div class="space-y-3">

                                <a
                                    href="{{ route('dashboard') }}"
                                    @click="open = false"
                                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-primary to-blue-800 py-3.5 font-bold text-white shadow-lg transition hover:-translate-y-0.5"
                                >

                                    <i class="bi bi-person-circle"></i>

                                    Dashboard Peserta

                                </a>


                                <form
                                    method="POST"
                                    action="{{ route('logout') }}"
                                    class="w-full"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        @click="open = false"
                                        class="flex w-full items-center justify-center gap-2 rounded-xl border border-red-200 bg-white py-3.5 font-bold text-red-600 transition hover:bg-red-50"
                                    >

                                        <i class="bi bi-box-arrow-right"></i>

                                        Logout

                                    </button>

                                </form>

                            </div>


                        {{-- USER TANPA ROLE --}}
                        @else

                            <div class="space-y-3">

                                <div
                                    class="flex items-center justify-center gap-2 rounded-xl bg-slate-100 py-3.5 text-sm font-semibold text-slate-600"
                                >

                                    <i class="bi bi-person-circle"></i>

                                    {{ Auth::user()->name }}

                                </div>


                                <form
                                    method="POST"
                                    action="{{ route('logout') }}"
                                    class="w-full"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        @click="open = false"
                                        class="flex w-full items-center justify-center gap-2 rounded-xl border border-red-200 bg-white py-3.5 font-bold text-red-600 transition hover:bg-red-50"
                                    >

                                        <i class="bi bi-box-arrow-right"></i>

                                        Logout

                                    </button>

                                </form>

                            </div>

                        @endif


                    @else

                        {{-- LOGIN --}}
                        <a
                            href="{{ route('login') }}"
                            @click="open = false"
                            class="flex w-full items-center justify-center gap-2 rounded-xl border border-primary py-3.5 font-bold text-primary transition hover:bg-primary hover:text-white"
                        >

                            <i class="bi bi-box-arrow-in-right"></i>

                            Login

                        </a>

                    @endauth

                </div>

            </div>

        </div>

    </div>

</div>
