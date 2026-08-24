{{-- ABOUT SECTION --}}
<section
    id="about"
    class="bg-[#F8FAFC] py-16 sm:py-20 lg:py-24"
>

    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-20">


            {{-- IMAGE --}}
            <div
                class="relative min-w-0"
                data-aos="fade-right"
            >

                {{-- Background Decoration --}}
                <div
                    class="absolute -left-6 -top-6 h-24 w-24 rounded-full bg-[#F6D21A]/40 blur-3xl sm:-left-8 sm:-top-8 sm:h-32 sm:w-32"
                ></div>

                <div
                    class="absolute -bottom-8 right-0 h-28 w-28 rounded-full bg-[#2E3192]/20 blur-3xl sm:-bottom-10 sm:h-40 sm:w-40"
                ></div>


                {{-- IMAGE --}}
                <div
                    class="relative overflow-hidden rounded-[24px] shadow-2xl sm:rounded-[32px]"
                >

                    <img
                        src="{{ $about && $about->image
                            ? asset('storage/'.$about->image)
                            : asset('images/about-default.jpg') }}"
                        alt="About Bina Insani"
                        class="h-auto w-full rounded-[24px] object-cover sm:rounded-[32px]"
                    >

                </div>


                {{-- FLOATING CARD --}}
                <div
                    class="absolute bottom-4 right-3 w-[calc(100%-24px)] max-w-[280px] rounded-2xl bg-white p-4 shadow-2xl sm:bottom-8 sm:-right-8 sm:w-64 sm:rounded-3xl sm:p-6"
                >

                    <div class="flex items-center gap-3 sm:gap-4">

                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#2E3192] text-white sm:h-14 sm:w-14 sm:rounded-2xl"
                        >

                            <i class="bi bi-award-fill text-xl sm:text-2xl"></i>

                        </div>


                        <div class="min-w-0">

                            <h4
                                class="text-base font-bold text-[#1E293B] sm:text-lg"
                            >
                                Terakreditasi
                            </h4>

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Lembaga Pelatihan Resmi
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- CONTENT --}}
            <div
                class="min-w-0"
                data-aos="fade-left"
            >

                {{-- LABEL --}}
                <span
                    class="inline-flex items-center gap-2 rounded-full bg-[#2E3192]/10 px-3 py-2 text-xs font-semibold text-[#2E3192] sm:px-4 sm:text-sm"
                >
                    Tentang Kami
                </span>


                {{-- TITLE --}}
                <h2
                    class="mt-6 text-3xl font-extrabold leading-tight text-[#1E293B] sm:mt-8 sm:text-4xl lg:text-5xl"
                >

                    Persiapkan Masa Depanmu

                    <span
                        class="bg-gradient-to-r from-[#2E3192] to-[#ED1C24] bg-clip-text text-transparent"
                    >
                        Bersama Bina Insani
                    </span>

                </h2>


                {{-- DESCRIPTION --}}
                <div class="mt-6 sm:mt-8">

                    <p
                        class="text-base leading-7 text-slate-600 sm:text-lg sm:leading-8"
                    >
                        Bina Insani merupakan lembaga pelatihan Bahasa Korea
                        yang membantu calon pekerja Indonesia agar siap
                        mengikuti seleksi EPS-TOPIK hingga proses
                        penempatan kerja ke Korea Selatan.
                    </p>


                    <p
                        class="mt-5 text-base leading-7 text-slate-600 sm:mt-6 sm:text-lg sm:leading-8"
                    >
                        Kami menghadirkan sistem pelatihan yang modern,
                        pengajar berpengalaman, simulasi ujian,
                        serta pendampingan penuh mulai dari pendaftaran,
                        pelatihan, hingga keberangkatan.
                    </p>

                </div>


                {{-- FEATURES --}}
                <div class="mt-8 space-y-4 sm:mt-10 sm:space-y-5">


                    {{-- FEATURE 1 --}}
                    <div class="flex items-start gap-3 sm:gap-4">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192] sm:h-12 sm:w-12"
                        >
                            <i class="bi bi-check-circle-fill"></i>
                        </div>


                        <div class="min-w-0">

                            <h4
                                class="text-sm font-bold text-[#1E293B] sm:text-base"
                            >
                                Pengajar Berpengalaman
                            </h4>

                            <p
                                class="mt-1 text-sm leading-6 text-slate-500"
                            >
                                Dibimbing instruktur profesional dan alumni Korea.
                            </p>

                        </div>

                    </div>


                    {{-- FEATURE 2 --}}
                    <div class="flex items-start gap-3 sm:gap-4">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#ED1C24]/10 text-[#ED1C24] sm:h-12 sm:w-12"
                        >
                            <i class="bi bi-translate"></i>
                        </div>


                        <div class="min-w-0">

                            <h4
                                class="text-sm font-bold text-[#1E293B] sm:text-base"
                            >
                                Fokus Persiapan EPS-TOPIK
                            </h4>

                            <p
                                class="mt-1 text-sm leading-6 text-slate-500"
                            >
                                Materi disusun sesuai standar ujian resmi Korea.
                            </p>

                        </div>

                    </div>


                    {{-- FEATURE 3 --}}
                    <div class="flex items-start gap-3 sm:gap-4">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#F6D21A]/30 text-[#2E3192] sm:h-12 sm:w-12"
                        >
                            <i class="bi bi-globe2"></i>
                        </div>


                        <div class="min-w-0">

                            <h4
                                class="text-sm font-bold text-[#1E293B] sm:text-base"
                            >
                                Pendampingan Sampai Berangkat
                            </h4>

                            <p
                                class="mt-1 text-sm leading-6 text-slate-500"
                            >
                                Mulai registrasi hingga proses penempatan kerja.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- STATS --}}
                <div
                    class="mt-8 grid grid-cols-3 gap-2 sm:mt-12 sm:gap-6"
                >

                    {{-- STAT 1 --}}
                    <div
                        class="rounded-2xl bg-[#2E3192]/10 p-3 text-center sm:rounded-3xl sm:p-6"
                    >

                        <h3
                            class="text-2xl font-bold text-[#2E3192] sm:text-4xl"
                        >
                            10+
                        </h3>

                        <p
                            class="mt-1 text-xs text-slate-600 sm:mt-2 sm:text-sm"
                        >
                            Tahun
                        </p>

                    </div>


                    {{-- STAT 2 --}}
                    <div
                        class="rounded-2xl bg-[#F6D21A]/30 p-3 text-center sm:rounded-3xl sm:p-6"
                    >

                        <h3
                            class="text-2xl font-bold text-[#2E3192] sm:text-4xl"
                        >
                            5000+
                        </h3>

                        <p
                            class="mt-1 text-xs text-slate-600 sm:mt-2 sm:text-sm"
                        >
                            Alumni
                        </p>

                    </div>


                    {{-- STAT 3 --}}
                    <div
                        class="rounded-2xl bg-[#ED1C24]/10 p-3 text-center sm:rounded-3xl sm:p-6"
                    >

                        <h3
                            class="text-2xl font-bold text-[#ED1C24] sm:text-4xl"
                        >
                            95%
                        </h3>

                        <p
                            class="mt-1 text-xs text-slate-600 sm:mt-2 sm:text-sm"
                        >
                            Lulus
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>