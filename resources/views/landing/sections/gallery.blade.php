{{-- GALLERY SECTION --}}

<section id="gallery-section" class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24">

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute -left-32 -top-32 h-72 w-72 rounded-full bg-[#2E3192]/10 blur-3xl sm:h-96 sm:w-96"></div>

        <div class="absolute -bottom-32 -right-32 h-72 w-72 rounded-full bg-[#F6D21A]/10 blur-3xl sm:h-96 sm:w-96"></div>
    </div>


    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- HEADING --}}
        <div
            id="gallery"
            class="mx-auto max-w-3xl text-center"
            data-aos="fade-up"
        >

            {{-- Badge --}}
            <span
                class="inline-flex items-center gap-2 rounded-full bg-[#2E3192]/10 px-3 py-1.5 text-xs font-semibold text-[#2E3192] sm:px-4 sm:py-2 sm:text-sm"
            >
                <i class="bi bi-images"></i>
                Dokumentasi
            </span>


            {{-- Title --}}
            <h2
                class="mt-5 text-3xl font-extrabold leading-tight text-[#1E293B] sm:mt-6 sm:text-4xl lg:text-5xl"
            >

                Alumni Bina Insani

                <span
                    class="block bg-gradient-to-r from-[#2E3192] to-[#ED1C24] bg-clip-text text-transparent"
                >
                    Yang Sudah Berhasil Berangkat ke Korea
                </span>

            </h2>


            {{-- Description --}}
            <p
                class="mx-auto mt-5 max-w-2xl text-sm leading-7 text-slate-600 sm:mt-6 sm:text-base sm:leading-8 lg:text-lg"
            >
                Beberapa dokumentasi Alumni Bina Insani yang telah berhasil
                berangkat ke Korea Selatan untuk bekerja dan meningkatkan
                kualitas hidup mereka. Semoga menjadi inspirasi bagi calon
                peserta lainnya.
            </p>

        </div>



        {{-- GALLERY --}}
        <div
            class="mt-12 grid grid-cols-1 gap-5 sm:mt-16 sm:grid-cols-2 sm:gap-6 lg:mt-20 lg:grid-cols-3"
        >

            @forelse($galleries as $gallery)

                <div
                    data-aos="zoom-in"
                    class="group relative overflow-hidden rounded-2xl shadow-lg sm:rounded-[28px]"
                >

                    {{-- IMAGE --}}
                    <img
                        src="{{ asset('storage/'.$gallery->image) }}"
                        class="h-64 w-full object-cover transition duration-700 group-hover:scale-110 sm:h-72 lg:h-80"
                        alt="Dokumentasi Alumni Bina Insani"
                    >


                    {{-- Overlay --}}
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-[#2E3192]/90 via-black/30 to-transparent opacity-0 transition duration-500 group-hover:opacity-100"
                    ></div>


                    {{-- Content --}}
                    <div
                        class="absolute bottom-0 left-0 right-0 translate-y-8 p-4 text-white opacity-0 transition duration-500 group-hover:translate-y-0 group-hover:opacity-100 sm:p-6"
                    >

                        <div
                            class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-[#F6D21A]/90 text-[#2E3192] backdrop-blur sm:mb-4 sm:h-14 sm:w-14 sm:rounded-2xl"
                        >
                            <i class="bi bi-camera-fill text-xl sm:text-2xl"></i>
                        </div>


                        <h3 class="text-lg font-bold sm:text-2xl">
                            Dokumentasi Alumni
                        </h3>


                        <p class="mt-1 text-sm text-white/90 sm:mt-2">
                            Bina Insani Training Center
                        </p>

                    </div>

                </div>


            @empty

                <div
                    class="col-span-full py-16 text-center text-sm text-slate-500 sm:py-20 sm:text-base"
                >
                    Belum ada foto yang diupload.
                </div>

            @endforelse

        </div>



        {{-- BOTTOM CARD --}}
        <div
            class="mt-12 rounded-3xl bg-gradient-to-r from-[#2E3192] via-[#2E3192] to-[#ED1C24] p-6 text-center text-white shadow-2xl sm:mt-16 sm:rounded-[32px] sm:p-10 lg:mt-20 lg:p-12"
            data-aos="fade-up"
        >

            <h3
                class="text-2xl font-bold leading-tight sm:text-3xl lg:text-4xl"
            >
                Bergabunglah Bersama Ribuan Alumni
            </h3>


            <p
                class="mx-auto mt-4 max-w-2xl text-sm leading-6 text-white/80 sm:mt-5 sm:text-base sm:leading-7 lg:text-lg"
            >
                Jadilah bagian dari peserta Bina Insani yang telah berhasil
                mempersiapkan diri menuju kesempatan kerja di Korea Selatan.
            </p>


            <a
                href="#programs"
                class="mt-6 inline-flex items-center rounded-xl bg-[#F6D21A] px-6 py-3 text-sm font-bold text-[#2E3192] shadow-lg transition hover:scale-105 sm:mt-8 sm:rounded-2xl sm:px-8 sm:py-4 sm:text-base"
            >
                Daftar Sekarang

                <i class="bi bi-arrow-right ms-2 sm:ms-3"></i>
            </a>

        </div>

    </div>

</section>