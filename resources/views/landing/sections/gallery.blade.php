{{-- =========================================================
     ALUMNI GALLERY
========================================================= --}}

<section
    id="gallery"
    class="relative overflow-hidden bg-white py-20 sm:py-24 lg:py-28"
>

    {{-- =====================================================
         BACKGROUND
    ====================================================== --}}
    <div
        class="pointer-events-none absolute inset-0 overflow-hidden"
        aria-hidden="true"
    >
        <div
            class="absolute -left-32 top-20 h-72 w-72 rounded-full bg-[#2E3192]/8 blur-3xl"
        ></div>

        <div
            class="absolute -right-32 bottom-10 h-80 w-80 rounded-full bg-[#F6D21A]/10 blur-3xl"
        ></div>
    </div>


    {{-- =====================================================
         CONTAINER
    ====================================================== --}}
    <div
        class="relative mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8"
    >

        {{-- =================================================
             HEADER
        ================================================== --}}
        <div
            class="mx-auto max-w-3xl text-center"
            data-aos="fade-up"
        >

            <span
                class="inline-flex items-center gap-2 text-sm font-bold text-[#2E3192]"
            >
                <span class="h-2 w-2 rounded-full bg-[#F6D21A]"></span>
                JEJAK ALUMNI
            </span>

            <h2
                class="mt-4 text-3xl font-black tracking-tight text-[#1E293B] sm:text-4xl lg:text-5xl"
            >
                Mereka Telah

                <span
                    class="bg-gradient-to-r from-[#2E3192] to-[#ED1C24] bg-clip-text text-transparent"
                >
                    Melangkah ke Korea
                </span>
            </h2>

            <p
                class="mx-auto mt-5 max-w-2xl text-sm leading-7 text-slate-500 sm:text-base sm:leading-8"
            >
                Beberapa dokumentasi alumni Bina Insani yang telah melalui
                proses persiapan dan melanjutkan perjalanan menuju Korea Selatan.
            </p>

        </div>


        {{-- =================================================
             GALLERY
        ================================================== --}}
        @if ($galleries->count() > 0)

            <div
                class="mt-12 columns-1 gap-5 space-y-5 sm:mt-14 sm:columns-2 sm:space-y-5 lg:mt-16 lg:columns-3"
            >

                @foreach ($galleries as $index => $gallery)

                    @php
                        $imageUrl = str_starts_with($gallery->image, 'https://res.cloudinary.com/')
                            ? $gallery->image
                            : asset('images/' . $gallery->image);
                    @endphp

                    <a
                        href="{{ $imageUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="group relative block overflow-hidden rounded-[24px] bg-slate-100 break-inside-avoid"
                        data-aos="fade-up"
                        data-aos-delay="{{ min($index * 80, 400) }}"
                    >

                        {{-- IMAGE --}}
                        <img
                            src="{{ $imageUrl }}"
                            alt="{{ $gallery->title ?? 'Dokumentasi Alumni Bina Insani' }}"
                            class="h-auto w-full object-cover transition duration-700 ease-out group-hover:scale-[1.04]"
                        >


                        {{-- SUBTLE OVERLAY --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-[#0F172A]/70 via-transparent to-transparent opacity-0 transition duration-500 group-hover:opacity-100"
                        ></div>


                        {{-- OPEN BUTTON --}}
                        <div
                            class="absolute right-4 top-4 flex h-10 w-10 translate-y-2 items-center justify-center rounded-full bg-white/90 text-[#1E293B] opacity-0 shadow-lg backdrop-blur transition duration-300 group-hover:translate-y-0 group-hover:opacity-100"
                        >
                            <i class="bi bi-arrow-up-right"></i>
                        </div>


                        {{-- CAPTION --}}
                        <div
                            class="absolute inset-x-4 bottom-4 translate-y-3 opacity-0 transition duration-300 group-hover:translate-y-0 group-hover:opacity-100"
                        >

                            <div
                                class="rounded-2xl border border-white/15 bg-[#0F172A]/55 p-4 backdrop-blur-md"
                            >

                                <div
                                    class="flex items-center gap-3"
                                >

                                    <div
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#F6D21A] text-[#1E293B]"
                                    >
                                        <i class="bi bi-airplane-fill text-sm"></i>
                                    </div>

                                    <div>

                                        <p
                                            class="text-xs font-semibold text-white"
                                        >
                                            Alumni Bina Insani
                                        </p>

                                        <p
                                            class="mt-0.5 text-[11px] text-white/70"
                                        >
                                            Korea Selatan
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </a>

                @endforeach

            </div>


            {{-- =================================================
                 BOTTOM MESSAGE
            ================================================== --}}
            <div
                class="mx-auto mt-10 max-w-4xl text-center sm:mt-14"
                data-aos="fade-up"
            >

                <div
                    class="mx-auto mb-5 h-px w-16 bg-[#F6D21A]"
                ></div>

                <p
                    class="text-lg font-bold leading-7 text-[#1E293B] sm:text-2xl sm:leading-9"
                >
                    Setiap perjalanan besar

                    <span class="text-[#2E3192]">
                        dimulai dari satu langkah.
                    </span>
                </p>

                <p
                    class="mx-auto mt-3 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base"
                >
                    Persiapkan langkahmu bersama Bina Insani melalui
                    program pelatihan yang tersedia.
                </p>

                <a
                    href="{{ route('programs.index') }}"
                    class="group mt-6 inline-flex items-center gap-2 rounded-xl bg-[#2E3192] px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#2E3192]/15 transition duration-300 hover:-translate-y-1 hover:bg-[#252879] hover:shadow-xl sm:px-7 sm:py-4 sm:text-base"
                >
                    Lihat Program

                    <i
                        class="bi bi-arrow-right transition duration-300 group-hover:translate-x-1"
                    ></i>
                </a>

            </div>

        @else

            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}
            <div
                class="mx-auto mt-12 max-w-2xl rounded-[28px] border border-slate-200 bg-slate-50 px-6 py-16 text-center sm:mt-14 sm:py-20"
                data-aos="fade-up"
            >

                <div
                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192]"
                >
                    <i class="bi bi-images text-2xl"></i>
                </div>

                <h3
                    class="mt-5 text-xl font-bold text-[#1E293B] sm:text-2xl"
                >
                    Dokumentasi Alumni Belum Tersedia
                </h3>

                <p
                    class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500"
                >
                    Dokumentasi alumni akan ditampilkan setelah
                    ditambahkan melalui panel administrasi.
                </p>

            </div>

        @endif

    </div>

</section>