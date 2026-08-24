{{-- HERO SECTION --}}
<section
    id="home"
    class="relative overflow-hidden bg-white py-20 sm:py-24 lg:py-28"
>

    {{-- Background Decoration --}}
    <div class="absolute inset-0 -z-10 overflow-hidden">

        <div
            class="absolute -left-32 -top-40 h-72 w-72 rounded-full bg-[#2E3192]/20 blur-3xl sm:h-96 sm:w-96"
        ></div>

        <div
            class="absolute -right-32 top-40 h-80 w-80 rounded-full bg-[#F6D21A]/20 blur-3xl sm:right-0 sm:h-[450px] sm:w-[450px]"
        ></div>

        <div
            class="absolute bottom-0 left-1/3 h-64 w-64 rounded-full bg-[#ED1C24]/10 blur-3xl sm:h-80 sm:w-80"
        ></div>

    </div>


    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">


            {{-- LEFT CONTENT --}}
            <div
                data-aos="fade-right"
                class="min-w-0"
            >

                {{-- BADGE --}}
                <span
                    class="inline-flex max-w-full items-center gap-2 rounded-full bg-[#F6D21A]/30 px-3 py-2 text-xs font-semibold text-[#2E3192] sm:px-4 sm:text-sm"
                >
                    🇰🇷
                    <span>
                        Program Resmi Penempatan Korea Selatan
                    </span>
                </span>


                {{-- TITLE --}}
                <h1
                    class="mt-6 text-4xl font-extrabold leading-[1.15] text-[#1E293B] sm:mt-8 sm:text-5xl lg:text-7xl"
                >

                    {{ $hero->title }}

                    <span
                        class="bg-gradient-to-r from-[#2E3192] to-[#ED1C24] bg-clip-text text-transparent"
                    >
                        {{ $hero->highlight }}
                    </span>

                </h1>


                {{-- SUBTITLE --}}
                <p
                    class="mt-6 max-w-2xl text-base leading-7 text-slate-600 sm:mt-8 sm:text-lg sm:leading-8"
                >
                    {{ $hero->subtitle }}
                </p>


                {{-- BUTTON --}}
                <div
                    class="mt-8 flex flex-col gap-3 sm:mt-10 sm:flex-row sm:flex-wrap sm:gap-4"
                >

                    @if($hero->button_text)

                        <a
                            href="{{ $hero->button_link }}"
                            class="w-full rounded-2xl bg-[#2E3192] px-6 py-3.5 text-center font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:bg-[#252879] sm:w-auto sm:px-8 sm:py-4"
                        >
                            {{ $hero->button_text }}
                        </a>

                    @endif


                    @if($hero->button2_text)

                        <a
                            href="{{ $hero->button2_link }}"
                            class="w-full rounded-2xl border border-slate-300 bg-white px-6 py-3.5 text-center font-semibold text-[#1E293B] transition hover:border-[#2E3192] hover:bg-[#F8FAFC] sm:w-auto sm:px-8 sm:py-4"
                        >
                            {{ $hero->button2_text }}
                        </a>

                    @endif

                </div>


                {{-- STATISTIC --}}
                <div
                    class="mt-10 grid grid-cols-3 gap-3 sm:mt-14 sm:gap-8"
                >

                    <div class="min-w-0">

                        <h2
                            class="text-2xl font-bold text-[#2E3192] sm:text-4xl"
                        >
                            5000+
                        </h2>

                        <p class="mt-1 text-xs text-slate-600 sm:mt-2 sm:text-sm">
                            Alumni
                        </p>

                    </div>


                    <div class="min-w-0">

                        <h2
                            class="text-2xl font-bold text-[#2E3192] sm:text-4xl"
                        >
                            95%
                        </h2>

                        <p class="mt-1 text-xs text-slate-600 sm:mt-2 sm:text-sm">
                            Lulus EPS
                        </p>

                    </div>


                    <div class="min-w-0">

                        <h2
                            class="text-2xl font-bold text-[#2E3192] sm:text-4xl"
                        >
                            10+
                        </h2>

                        <p class="mt-1 text-xs leading-5 text-slate-600 sm:mt-2 sm:text-sm"
                        >
                            Tahun Pengalaman
                        </p>

                    </div>

                </div>

            </div>


            {{-- RIGHT DASHBOARD MOCKUP --}}
            <div
                class="relative min-w-0 w-full"
                data-aos="fade-left"
            >

                <div
                    class="w-full overflow-hidden rounded-[24px] border border-slate-200 bg-white shadow-[0_20px_60px_rgba(46,49,146,0.12)] sm:rounded-[32px] sm:shadow-[0_30px_80px_rgba(46,49,146,0.15)]"
                >

                    {{-- HEADER --}}
                    <div
                        class="flex items-center justify-between gap-3 border-b px-4 py-4 sm:px-8 sm:py-6"
                    >

                        <div class="min-w-0">

                            <h3
                                class="truncate text-base font-bold text-[#1E293B] sm:text-xl"
                            >
                                Dashboard Pendaftaran
                            </h3>

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Platform Bina Insani
                            </p>

                        </div>


                        <span
                            class="shrink-0 rounded-full bg-[#2E3192]/10 px-3 py-1.5 text-xs font-semibold text-[#2E3192] sm:px-4 sm:py-2 sm:text-sm"
                        >
                            Online
                        </span>

                    </div>


                    {{-- DASHBOARD CONTENT --}}
                    <div class="space-y-4 p-4 sm:space-y-6 sm:p-8">


                        {{-- PROGRAM --}}
                        <div
                            class="rounded-2xl bg-[#F8FAFC] p-4 sm:p-5"
                        >

                            <div class="flex items-center justify-between gap-3">

                                <div class="min-w-0">

                                    <p class="text-xs text-slate-500 sm:text-sm">
                                        Program
                                    </p>

                                    <h3
                                        class="mt-1 truncate text-sm font-bold text-[#1E293B] sm:text-base"
                                    >
                                        Diklat Intensif
                                    </h3>

                                </div>


                                <span
                                    class="shrink-0 text-sm font-bold text-[#2E3192]"
                                >
                                    Aktif
                                </span>

                            </div>

                        </div>


                        {{-- PROGRESS --}}
                        <div
                            class="rounded-2xl bg-[#F8FAFC] p-4 sm:p-5"
                        >

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Progress Pendaftaran
                            </p>

                            <div
                                class="mt-3 h-2.5 overflow-hidden rounded-full bg-slate-200 sm:mt-4 sm:h-3"
                            >

                                <div
                                    class="h-full w-3/4 rounded-full bg-gradient-to-r from-[#2E3192] to-[#F6D21A]"
                                ></div>

                            </div>

                            <p
                                class="mt-2 text-xs font-semibold text-[#1E293B] sm:mt-3 sm:text-sm"
                            >
                                75% Selesai
                            </p>

                        </div>


                        {{-- DOCUMENT + PAYMENT --}}
                        <div class="grid grid-cols-2 gap-3 sm:gap-4">

                            <div
                                class="rounded-2xl bg-[#2E3192]/10 p-4 sm:p-5"
                            >

                                <p class="text-xs text-slate-500 sm:text-sm">
                                    Dokumen
                                </p>

                                <h3
                                    class="mt-1 text-lg font-bold text-[#2E3192] sm:mt-2 sm:text-2xl"
                                >
                                    Lengkap
                                </h3>

                            </div>


                            <div
                                class="rounded-2xl bg-[#F6D21A]/30 p-4 sm:p-5"
                            >

                                <p class="text-xs text-slate-500 sm:text-sm">
                                    Pembayaran
                                </p>

                                <h3
                                    class="mt-1 text-lg font-bold text-[#1E293B] sm:mt-2 sm:text-2xl"
                                >
                                    Siap
                                </h3>

                            </div>

                        </div>


                        {{-- CTA --}}
                        <a
                            href="#programs"
                            class="block w-full rounded-2xl bg-[#2E3192] py-3.5 text-center text-sm font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:bg-[#252879] sm:py-4 sm:text-lg"
                        >
                            Mulai Pendaftaran
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>