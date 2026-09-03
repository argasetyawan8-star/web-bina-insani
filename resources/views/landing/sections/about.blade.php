{{-- =========================================================
     ABOUT / TENTANG BINA INSANI
========================================================= --}}

<section
    id="about"
    class="relative overflow-hidden bg-white py-20 sm:py-24 lg:py-28"
>

    {{-- =====================================================
         BACKGROUND DECORATION
    ====================================================== --}}

    <div
        class="pointer-events-none absolute -left-40 top-10 h-96 w-96 rounded-full bg-[#2E3192]/8 blur-3xl"
        aria-hidden="true"
    ></div>

    <div
        class="pointer-events-none absolute -right-40 top-1/3 h-96 w-96 rounded-full bg-[#F6D21A]/10 blur-3xl"
        aria-hidden="true"
    ></div>

    <div
        class="pointer-events-none absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-[#ED1C24]/5 blur-3xl"
        aria-hidden="true"
    ></div>



    <div class="relative mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">


        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div
            class="mx-auto max-w-3xl text-center"
            data-aos="fade-up"
        >

            <span
                class="inline-flex items-center gap-2 rounded-full border border-[#2E3192]/10 bg-[#2E3192]/5 px-4 py-2 text-xs font-bold text-[#2E3192] sm:text-sm"
            >

                <i class="bi bi-building-fill"></i>

                Tentang Bina Insani

            </span>


            <h2
                class="mt-5 text-3xl font-black leading-tight tracking-tight text-[#1E293B] sm:text-4xl lg:text-5xl"
            >

                Mengenal Lebih Dekat
                <span
                    class="bg-gradient-to-r from-[#2E3192] via-[#34389e] to-[#ED1C24] bg-clip-text text-transparent"
                >
                    Bina Insani
                </span>

            </h2>


            <p
                class="mx-auto mt-5 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base sm:leading-8 lg:text-lg"
            >

                Lembaga pelatihan yang membantu calon pekerja Indonesia
                mempersiapkan diri melalui pembelajaran Bahasa Korea,
                persiapan EPS-TOPIK, dan pendampingan proses pendaftaran.

            </p>

        </div>



        {{-- =====================================================
             INTRO CONTENT
        ====================================================== --}}

        <div
            class="mt-12 grid items-center gap-10 lg:grid-cols-2 lg:gap-16 lg:mt-16"
        >


            {{-- =================================================
                 IMAGE
            ================================================== --}}

            <div
                class="relative"
                data-aos="fade-right"
            >

                {{-- Decorative Shape --}}
                <div
                    class="absolute -left-4 -top-4 h-24 w-24 rounded-3xl bg-[#F6D21A]/30 sm:-left-6 sm:-top-6 sm:h-32 sm:w-32"
                ></div>

                <div
                    class="absolute -bottom-6 -right-5 h-32 w-32 rounded-full bg-[#2E3192]/10 blur-2xl sm:h-40 sm:w-40"
                ></div>


                {{-- Image Container --}}
                <div
                    class="relative overflow-hidden rounded-[30px] border border-slate-200 bg-slate-100 p-2 shadow-[0_25px_70px_rgba(15,23,42,.12)] sm:rounded-[38px] sm:p-3"
                >

                    <div
                        class="relative overflow-hidden rounded-[24px] sm:rounded-[30px]"
                    >

                        @if ($about?->image)

                            <img
                                src="{{ asset('images/' . $about->image) }}"
                                alt="Tentang Bina Insani"
                                class="aspect-[4/3] w-full object-cover transition duration-700 hover:scale-105"
                            >

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#0F172A]/70 via-transparent to-transparent"
                            ></div>

                        @else

                            <div
                                class="flex aspect-[4/3] items-center justify-center bg-gradient-to-br from-[#0F172A] via-[#172554] to-[#2E3192]"
                            >

                                <div class="text-center text-white">

                                    <div
                                        class="mx-auto flex h-24 w-24 items-center justify-center rounded-3xl bg-white/10 backdrop-blur"
                                    >

                                        @if (setting('logo'))

                                            <img
                                                src="{{ asset('storage/' . setting('logo')) }}"
                                                alt="Bina Insani"
                                                class="h-16 w-16 object-contain"
                                            >

                                        @else

                                            <span class="text-3xl font-black">
                                                BI
                                            </span>

                                        @endif

                                    </div>

                                    <p
                                        class="mt-5 text-xs font-bold uppercase tracking-[0.25em] text-[#F6D21A]"
                                    >
                                        Bina Insani
                                    </p>

                                    <p class="mt-2 text-lg font-bold">
                                        Migrant Training Center
                                    </p>

                                </div>

                            </div>

                        @endif


                        {{-- Floating Badge --}}
                        <div
                            class="absolute bottom-4 left-4 rounded-2xl border border-white/20 bg-[#0F172A]/75 px-4 py-3 text-white shadow-xl backdrop-blur-xl sm:bottom-6 sm:left-6 sm:px-5 sm:py-4"
                        >

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F6D21A] text-[#1E293B]"
                                >
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>

                                <div>

                                    <p class="text-[10px] uppercase tracking-wider text-slate-300">
                                        Fokus
                                    </p>

                                    <p class="text-sm font-bold sm:text-base">
                                        Pelatihan Bahasa Korea
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 TEXT
            ================================================== --}}

            <div
                class="min-w-0"
                data-aos="fade-left"
            >

                


                <h3
                    class="mt-3 text-2xl font-black leading-tight text-[#1E293B] sm:text-3xl lg:text-4xl"
                >

                    Membantu Mempersiapkan
                    <span class="text-[#2E3192]">
                        Langkahmu
                    </span>

                </h3>


                {{-- CMS DESCRIPTION --}}
                <div class="mt-5 space-y-4 sm:mt-6">

                    @if ($about?->description)

                        <p
                            class="text-sm leading-7 text-slate-600 sm:text-base sm:leading-8"
                        >
                            {{ $about->description }}
                        </p>

                    @else

                        <p
                            class="text-sm leading-7 text-slate-600 sm:text-base sm:leading-8"
                        >
                            Bina Insani hadir sebagai lembaga pelatihan
                            yang membantu masyarakat Indonesia mempersiapkan
                            kemampuan Bahasa Korea dan memahami tahapan
                            persiapan menuju peluang kerja di Korea Selatan.
                        </p>

                        <p
                            class="text-sm leading-7 text-slate-600 sm:text-base sm:leading-8"
                        >
                            Melalui program pelatihan yang terstruktur,
                            peserta mendapatkan pembelajaran yang lebih
                            terarah serta informasi mengenai proses
                            pendaftaran, dokumen, dan tahapan persiapan
                            lainnya.
                        </p>

                    @endif

                </div>


                {{-- =================================================
                     HIGHLIGHTS
                ================================================== --}}

                <div class="mt-7 grid gap-3 sm:mt-8 sm:grid-cols-2">


                    {{-- 01 --}}
                    <div
                        class="rounded-2xl border border-slate-200 bg-slate-50 p-4 transition duration-300 hover:-translate-y-1 hover:bg-white hover:shadow-md sm:p-5"
                    >

                        <div class="flex items-start gap-3">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]"
                            >

                                <i class="bi bi-book-fill"></i>

                            </div>

                            <div>

                                <h4 class="text-sm font-bold text-[#1E293B] sm:text-base">
                                    Pembelajaran Bahasa Korea
                                </h4>

                                <p class="mt-1 text-xs leading-5 text-slate-500 sm:text-sm">
                                    Materi pembelajaran disusun agar peserta dapat belajar secara bertahap.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- 02 --}}
                    <div
                        class="rounded-2xl border border-slate-200 bg-slate-50 p-4 transition duration-300 hover:-translate-y-1 hover:bg-white hover:shadow-md sm:p-5"
                    >

                        <div class="flex items-start gap-3">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#F6D21A]/25 text-[#2E3192]"
                            >

                                <i class="bi bi-award-fill"></i>

                            </div>

                            <div>

                                <h4 class="text-sm font-bold text-[#1E293B] sm:text-base">
                                    Persiapan EPS-TOPIK
                                </h4>

                                <p class="mt-1 text-xs leading-5 text-slate-500 sm:text-sm">
                                    Membantu peserta mempersiapkan kemampuan menghadapi tahapan ujian.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- 03 --}}
                    <div
                        class="rounded-2xl border border-slate-200 bg-slate-50 p-4 transition duration-300 hover:-translate-y-1 hover:bg-white hover:shadow-md sm:p-5"
                    >

                        <div class="flex items-start gap-3">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-green-100 text-green-600"
                            >

                                <i class="bi bi-person-check-fill"></i>

                            </div>

                            <div>

                                <h4 class="text-sm font-bold text-[#1E293B] sm:text-base">
                                    Pendampingan Peserta
                                </h4>

                                <p class="mt-1 text-xs leading-5 text-slate-500 sm:text-sm">
                                    Informasi dan pendampingan selama proses pendaftaran.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- 04 --}}
                    <div
                        class="rounded-2xl border border-slate-200 bg-slate-50 p-4 transition duration-300 hover:-translate-y-1 hover:bg-white hover:shadow-md sm:p-5"
                    >

                        <div class="flex items-start gap-3">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#ED1C24]/10 text-[#ED1C24]"
                            >

                                <i class="bi bi-globe2"></i>

                            </div>

                            <div>

                                <h4 class="text-sm font-bold text-[#1E293B] sm:text-base">
                                    Persiapan Internasional
                                </h4>

                                <p class="mt-1 text-xs leading-5 text-slate-500 sm:text-sm">
                                    Mempersiapkan peserta menuju peluang kerja di Korea Selatan.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
             WHAT WE DO
        ====================================================== --}}

        <div
            class="mt-16 border-t border-slate-200 pt-14 sm:mt-20 sm:pt-16"
        >

            <div
                class="grid gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:items-start lg:gap-16"
            >


                {{-- LEFT --}}
                <div
                    data-aos="fade-right"
                >

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-[#F6D21A]/25 px-4 py-2 text-xs font-bold text-[#2E3192] sm:text-sm"
                    >

                        <i class="bi bi-compass-fill"></i>

                        Apa yang Kami Bantu

                    </span>


                    <h3
                        class="mt-5 text-2xl font-black leading-tight text-[#1E293B] sm:text-3xl lg:text-4xl"
                    >

                        Dari Persiapan
                        <span class="text-[#2E3192]">
                            Hingga Siap Melangkah
                        </span>

                    </h3>


                    <p
                        class="mt-4 text-sm leading-7 text-slate-600 sm:text-base sm:leading-8"
                    >

                        Bina Insani berfokus membantu peserta memahami
                        proses persiapan secara lebih terarah, mulai dari
                        pembelajaran hingga tahapan administrasi pendaftaran.

                    </p>

                </div>



                {{-- RIGHT --}}
                <div
                    class="grid gap-4 sm:grid-cols-2"
                    data-aos="fade-left"
                >

                    {{-- CARD --}}
                    <div
                        class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-[#2E3192]/20 hover:shadow-lg sm:p-6"
                    >

                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]"
                        >
                            <i class="bi bi-journal-text"></i>
                        </div>

                        <h4 class="mt-4 font-bold text-[#1E293B]">
                            Program Pelatihan
                        </h4>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Pilihan program disediakan sesuai kebutuhan
                            dan waktu belajar peserta.
                        </p>

                    </div>


                    <div
                        class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-[#F6D21A]/40 hover:shadow-lg sm:p-6"
                    >

                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#F6D21A]/25 text-[#2E3192]"
                        >
                            <i class="bi bi-file-earmark-check-fill"></i>
                        </div>

                        <h4 class="mt-4 font-bold text-[#1E293B]">
                            Administrasi
                        </h4>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Proses pendaftaran dan dokumen dibuat lebih
                            mudah dipahami peserta.
                        </p>

                    </div>


                    <div
                        class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-green-200 hover:shadow-lg sm:p-6"
                    >

                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-100 text-green-600"
                        >
                            <i class="bi bi-person-lines-fill"></i>
                        </div>

                        <h4 class="mt-4 font-bold text-[#1E293B]">
                            Pendampingan
                        </h4>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Peserta mendapatkan informasi mengenai
                            tahapan yang sedang dijalani.
                        </p>

                    </div>


                    <div
                        class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-[#ED1C24]/20 hover:shadow-lg sm:p-6"
                    >

                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#ED1C24]/10 text-[#ED1C24]"
                        >
                            <i class="bi bi-globe-americas"></i>
                        </div>

                        <h4 class="mt-4 font-bold text-[#1E293B]">
                            Persiapan Ke Korea
                        </h4>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Membantu peserta memperoleh gambaran yang
                            lebih jelas mengenai proses persiapan.
                        </p>

                    </div>

                </div>

            </div>

        </div>



        

    </div>

</section>
