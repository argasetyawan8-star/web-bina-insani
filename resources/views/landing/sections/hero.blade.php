
{{-- =========================================================
     HERO SECTION
========================================================= --}}

<section
    id="home"
    class="relative overflow-hidden bg-white pt-24 sm:pt-28 lg:pt-32"
>

    {{-- =====================================================
         BACKGROUND DECORATION
    ====================================================== --}}

    <div
        class="pointer-events-none absolute inset-0 overflow-hidden"
        aria-hidden="true"
    >

        {{-- Blue Glow --}}
        <div
            class="absolute -left-40 -top-32 h-[420px] w-[420px] rounded-full bg-[#2E3192]/10 blur-[110px] sm:h-[520px] sm:w-[520px]"
        ></div>

        {{-- Yellow Glow --}}
        <div
            class="absolute -right-32 top-20 h-[360px] w-[360px] rounded-full bg-[#F6D21A]/15 blur-[100px] sm:h-[450px] sm:w-[450px]"
        ></div>

        {{-- Red Glow --}}
        <div
            class="absolute bottom-[-180px] left-1/3 h-[400px] w-[400px] rounded-full bg-[#ED1C24]/7 blur-[110px]"
        ></div>

        {{-- Subtle Grid --}}
        <div
            class="absolute inset-0 opacity-[0.025]"
            style="
                background-image:
                    linear-gradient(rgba(46,49,146,.8) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(46,49,146,.8) 1px, transparent 1px);
                background-size: 48px 48px;
            "
        ></div>

    </div>



    {{-- =====================================================
         MAIN CONTAINER
    ====================================================== --}}

    <div
        class="relative mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8"
    >

        <div
            class="grid items-center gap-12 py-14 sm:py-16 lg:grid-cols-2 lg:gap-16 lg:py-20 xl:gap-20"
        >


            {{-- =================================================
                 LEFT CONTENT
            ================================================== --}}

            <div
                class="min-w-0 max-w-3xl"
                data-aos="fade-right"
            >

                {{-- =================================================
                     BADGE
                ================================================== --}}

                <span
                    class="inline-flex max-w-full items-center gap-2 rounded-full border border-[#2E3192]/10 bg-[#F6D21A]/25 px-4 py-2 text-xs font-bold text-[#2E3192] shadow-sm sm:px-5 sm:py-2.5 sm:text-sm"
                >

                    <span
                        class="flex h-2.5 w-2.5 shrink-0 rounded-full bg-[#2E3192]"
                    ></span>

                    <span>
                        {{ $hero->badge ?? 'Pelatihan Bahasa Korea & Persiapan EPS-TOPIK' }}
                    </span>

                </span>



                {{-- =================================================
                     TITLE
                ================================================== --}}

                <h1
                    class="mt-6 text-4xl font-black leading-[1.08] tracking-tight text-[#1E293B] sm:mt-8 sm:text-5xl lg:text-6xl xl:text-7xl"
                >

                    {{ $hero->title }}

                    <span
                        class="block bg-gradient-to-r from-[#2E3192] via-[#34389e] to-[#ED1C24] bg-clip-text text-transparent"
                    >
                        {{ $hero->highlight }}
                    </span>

                </h1>



                {{-- =================================================
                     SUBTITLE
                ================================================== --}}

                <p
                    class="mt-6 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base sm:leading-8 lg:text-lg"
                >

                    {{ $hero->subtitle }}

                </p>



                {{-- =================================================
                     CTA
                ================================================== --}}

                <div
                    class="mt-8 flex flex-col gap-3 sm:mt-10 sm:flex-row sm:flex-wrap sm:gap-4"
                >

                    {{-- PRIMARY BUTTON --}}
                    @if ($hero->button_text)

                        <a
                            href="{{ $hero->button_link ?: '#' }}"
                            class="group inline-flex w-full items-center justify-center gap-3 rounded-2xl bg-[#2E3192] px-7 py-4 text-sm font-bold text-white shadow-lg shadow-[#2E3192]/20 transition duration-300 hover:-translate-y-1 hover:bg-[#252879] hover:shadow-xl sm:w-auto sm:px-8 sm:text-base"
                        >

                            <i class="bi bi-mortarboard-fill"></i>

                            <span>
                                {{ $hero->button_text }}
                            </span>

                            <i
                                class="bi bi-arrow-right transition duration-300 group-hover:translate-x-1"
                            ></i>

                        </a>

                    @endif


                    {{-- SECONDARY BUTTON --}}
                    @if ($hero->button2_text)

                        <a
                            href="{{ $hero->button2_link ?: '#about' }}"
                            class="group inline-flex w-full items-center justify-center gap-3 rounded-2xl border border-slate-200 bg-white px-7 py-4 text-sm font-bold text-[#1E293B] shadow-sm transition duration-300 hover:-translate-y-1 hover:border-[#2E3192]/30 hover:text-[#2E3192] hover:shadow-md sm:w-auto sm:px-8 sm:text-base"
                        >

                            <i class="bi bi-info-circle"></i>

                            <span>
                                {{ $hero->button2_text }}
                            </span>

                            <i
                                class="bi bi-arrow-right transition duration-300 group-hover:translate-x-1"
                            ></i>

                        </a>

                    @endif

                </div>



                {{-- =================================================
                     TRUST POINTS
                ================================================== --}}

                <div
                    class="mt-7 grid gap-3 text-xs text-slate-600 sm:grid-cols-3 sm:text-sm"
                >

                    <div class="flex items-center gap-2">

                        <i class="bi bi-check-circle-fill text-green-500"></i>

                        <span>
                            Pelatihan Terarah
                        </span>

                    </div>


                    <div class="flex items-center gap-2">

                        <i class="bi bi-check-circle-fill text-green-500"></i>

                        <span>
                            Persiapan EPS-TOPIK
                        </span>

                    </div>


                    <div class="flex items-center gap-2">

                        <i class="bi bi-check-circle-fill text-green-500"></i>

                        <span>
                            Pendampingan Peserta
                        </span>

                    </div>

                </div>



                {{-- =================================================
                     MINI INFORMATION
                ================================================== --}}

                <div
                    class="mt-9 grid max-w-2xl gap-3 sm:mt-11 sm:grid-cols-2"
                >

                    {{-- PROGRAM --}}
                    <div
                        class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md sm:p-5"
                        data-aos="fade-up"
                        data-aos-delay="150"
                    >

                        <div class="flex items-center gap-3">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]"
                            >

                                <i class="bi bi-book-fill"></i>

                            </div>


                            <div class="min-w-0">

                                <p
                                    class="text-[10px] font-bold uppercase tracking-wider text-slate-400"
                                >
                                    Program Pelatihan
                                </p>

                                <p
                                    class="mt-1 text-sm font-bold text-[#1E293B] sm:text-base"
                                >
                                    Bahasa Korea &amp; EPS-TOPIK
                                </p>

                            </div>

                        </div>

                    </div>



                    {{-- DESTINATION --}}
                    <div
                        class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md sm:p-5"
                        data-aos="fade-up"
                        data-aos-delay="200"
                    >

                        <div class="flex items-center gap-3">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#F6D21A]/25 text-[#2E3192]"
                            >

                                <span class="text-xl">
                                    🇰🇷
                                </span>

                            </div>


                            <div>

                                <p
                                    class="text-[10px] font-bold uppercase tracking-wider text-slate-400"
                                >
                                    Tujuan
                                </p>

                                <p
                                    class="mt-1 text-sm font-bold text-[#1E293B] sm:text-base"
                                >
                                    Korea Selatan
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 RIGHT VISUAL
            ================================================== --}}

            <div
                class="relative mx-auto w-full max-w-xl lg:mx-0"
                data-aos="fade-left"
            >

                {{-- Glow --}}
                <div
                    class="absolute left-1/2 top-1/2 h-[420px] w-[420px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-[#2E3192]/10 blur-[100px]"
                ></div>



                {{-- Main Card --}}
                <div
                    class="relative overflow-hidden rounded-[34px] border border-slate-200 bg-white p-3 shadow-[0_30px_80px_rgba(15,23,42,.12)] sm:rounded-[40px] sm:p-4"
                >

                    <div
                        class="relative overflow-hidden rounded-[28px] bg-gradient-to-br from-[#EEF2FF] via-white to-[#FEFCE8] sm:rounded-[32px]"
                    >

                        {{-- =================================================
                             HERO IMAGE
                        ================================================== --}}

                        @if ($hero?->image)

                            <img
                                src="{{ asset('images/' . $hero->image) }}"
                                alt="{{ $hero->title }}"
                                class="aspect-[4/5] w-full object-cover"
                            >

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#0F172A]/65 via-transparent to-transparent"
                            ></div>

                        @else

                            {{-- =================================================
                                 FALLBACK VISUAL
                            ================================================== --}}

                            <div
                                class="relative flex aspect-[4/5] items-center justify-center overflow-hidden bg-gradient-to-br from-[#EEF2FF] via-white to-[#FEFCE8]"
                            >

                                {{-- Decorative Circle --}}
                                <div
                                    class="absolute -right-20 -top-20 h-72 w-72 rounded-full border-[28px] border-[#2E3192]/10"
                                ></div>

                                <div
                                    class="absolute -bottom-24 -left-20 h-80 w-80 rounded-full border-[30px] border-[#F6D21A]/20"
                                ></div>


                                {{-- Decorative Cross --}}
                                <div
                                    class="absolute right-12 top-1/3 h-14 w-14 rotate-45 rounded-2xl bg-[#ED1C24]/10"
                                ></div>


                                {{-- Logo --}}
                                <div
                                    class="relative text-center"
                                >

                                    <div
                                        class="mx-auto flex h-28 w-28 items-center justify-center rounded-[32px] bg-white shadow-2xl ring-1 ring-slate-100"
                                    >

                                        @if (setting('logo'))

                                            <img
                                                src="{{ asset('images/' . setting('logo')) }}"
                                                alt="Bina Insani"
                                                class="h-20 w-20 object-contain"
                                            >

                                        @else

                                            <span
                                                class="text-4xl font-black text-[#2E3192]"
                                            >
                                                BI
                                            </span>

                                        @endif

                                    </div>


                                    <p
                                        class="mt-6 text-xs font-extrabold uppercase tracking-[0.25em] text-[#2E3192]"
                                    >
                                        Bina Insani
                                    </p>


                                    <p
                                        class="mt-2 text-lg font-bold text-[#1E293B]"
                                    >
                                        Migrant Training Center
                                    </p>

                                </div>

                            </div>

                        @endif



                        {{-- =================================================
                             TOP LEFT BADGE
                        ================================================== --}}

                        <div
                            class="absolute left-4 top-4 rounded-2xl border border-white/70 bg-white/90 px-4 py-3 shadow-lg backdrop-blur-xl sm:left-5 sm:top-5"
                        >

                            <div class="flex items-center gap-3">

                                <span class="text-2xl">
                                    🇰🇷
                                </span>


                                <div>

                                    <p
                                        class="text-[10px] font-bold uppercase tracking-wider text-slate-400"
                                    >
                                        Tujuan
                                    </p>

                                    <p
                                        class="text-sm font-bold text-[#1E293B]"
                                    >
                                        Korea Selatan
                                    </p>

                                </div>

                            </div>

                        </div>



                        {{-- =================================================
                             TOP RIGHT BADGE
                        ================================================== --}}

                        <div
                            class="absolute right-4 top-4 rounded-2xl border border-white/70 bg-white/90 px-4 py-3 shadow-lg backdrop-blur-xl sm:right-5 sm:top-5"
                        >

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#F6D21A] text-[#1E293B]"
                                >

                                    <i class="bi bi-award-fill"></i>

                                </div>


                                <div>

                                    <p
                                        class="text-[10px] font-semibold text-slate-400"
                                    >
                                        Fokus
                                    </p>

                                    <p
                                        class="text-sm font-bold text-[#1E293B]"
                                    >
                                        EPS-TOPIK
                                    </p>

                                </div>

                            </div>

                        </div>



                        {{-- =================================================
                             BOTTOM GLASS CARD
                        ================================================== --}}

                        <div
                            class="absolute inset-x-4 bottom-4 rounded-2xl border border-white/20 bg-[#0F172A]/80 p-5 text-white shadow-xl backdrop-blur-xl sm:inset-x-5 sm:bottom-5 sm:p-6"
                        >

                            <p
                                class="text-[10px] font-bold uppercase tracking-[0.25em] text-[#F6D21A]"
                            >
                                Bina Insani
                            </p>


                            <h3
                                class="mt-2 text-xl font-extrabold leading-tight sm:text-2xl"
                            >
                                Belajar.
                                <span class="text-[#F6D21A]">
                                    Bersiap.
                                </span>
                                Berangkat.
                            </h3>


                            <div
                                class="mt-3 flex items-center gap-2 text-xs text-slate-300 sm:text-sm"
                            >

                                <span
                                    class="h-2 w-2 rounded-full bg-green-400"
                                ></span>

                                Sistem pendaftaran yang mudah dan terarah

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     FLOATING CARD LEFT
                ================================================== --}}

                <div
                    class="absolute -bottom-5 -left-3 hidden rounded-2xl border border-slate-200 bg-white p-4 shadow-xl sm:block lg:-left-7"
                    data-aos="fade-up"
                    data-aos-delay="300"
                >

                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-100 text-green-600"
                        >

                            <i class="bi bi-check-circle-fill"></i>

                        </div>


                        <div>

                            <p class="text-[10px] text-slate-400">
                                Proses
                            </p>

                            <p class="text-sm font-bold text-[#1E293B]">
                                Terstruktur
                            </p>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     FLOATING CARD RIGHT
                ================================================== --}}

                <div
                    class="absolute -right-3 top-[45%] hidden rounded-2xl border border-slate-200 bg-white p-4 shadow-xl sm:block lg:-right-7"
                    data-aos="fade-up"
                    data-aos-delay="400"
                >

                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]"
                        >

                            <i class="bi bi-person-check-fill"></i>

                        </div>


                        <div>

                            <p class="text-[10px] text-slate-400">
                                Peserta
                            </p>

                            <p class="text-sm font-bold text-[#1E293B]">
                                Didampingi
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        


    {{-- =====================================================
         TRANSITION TO ABOUT
    ====================================================== --}}

    <div
        class="pointer-events-none absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-slate-50 to-transparent"
        aria-hidden="true"
    ></div>

</section>