@extends('layouts.landing')

@section('title', 'Kontak')

@section('content')

<section
    class="relative min-h-screen overflow-hidden bg-slate-50 pb-20 pt-28 sm:pb-24 sm:pt-32 lg:pb-28"
>

    {{-- =========================================================
         BACKGROUND
    ========================================================== --}}

    <div
        class="pointer-events-none absolute inset-0 overflow-hidden"
        aria-hidden="true"
    >

        <div
            class="absolute -left-40 top-10 h-96 w-96 rounded-full bg-[#2E3192]/10 blur-3xl"
        ></div>

        <div
            class="absolute -right-40 top-1/3 h-[450px] w-[450px] rounded-full bg-[#F6D21A]/10 blur-3xl"
        ></div>

    </div>



    <div
        class="relative mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8"
    >

        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div
            class="mx-auto max-w-3xl text-center"
            data-aos="fade-up"
        >

            <span
                class="inline-flex items-center gap-2 rounded-full bg-[#F6D21A]/30 px-4 py-2 text-xs font-bold text-[#2E3192] sm:text-sm"
            >

                <i class="bi bi-headset"></i>

                Hubungi Bina Insani

            </span>


            <h1
                class="mt-5 text-4xl font-black leading-tight tracking-tight text-[#1E293B] sm:text-5xl lg:text-6xl"
            >

                Mari Terhubung
                <span
                    class="bg-gradient-to-r from-[#2E3192] to-[#ED1C24] bg-clip-text text-transparent"
                >
                    dengan Kami
                </span>

            </h1>


            <p
                class="mx-auto mt-5 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base sm:leading-8 lg:text-lg"
            >

                Hubungi tim Bina Insani untuk mendapatkan informasi
                mengenai program pelatihan, pendaftaran, pembayaran,
                dan persiapan menuju Korea Selatan.

            </p>

        </div>



        {{-- =====================================================
             CONTACT CARDS
        ====================================================== --}}

        <div
            class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3"
        >

            {{-- WHATSAPP --}}
            <div
                class="group rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl sm:p-7"
                data-aos="fade-up"
            >

                <div
                    class="flex items-center justify-between"
                >

                    <div
                        class="flex h-13 w-13 items-center justify-center rounded-2xl bg-green-100 text-green-600"
                    >

                        <i class="bi bi-whatsapp text-2xl"></i>

                    </div>


                    @if ($contact?->phone)

                        @php
                            $whatsappNumber = preg_replace(
                                '/[^0-9]/',
                                '',
                                $contact->phone
                            );

                            if (str_starts_with($whatsappNumber, '0')) {
                                $whatsappNumber =
                                    '62' . substr($whatsappNumber, 1);
                            }
                        @endphp

                        <a
                            href="https://wa.me/{{ $whatsappNumber }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition hover:bg-green-500 hover:text-white"
                            aria-label="Chat WhatsApp"
                        >

                            <i class="bi bi-arrow-up-right"></i>

                        </a>

                    @endif

                </div>


                <p
                    class="mt-6 text-xs font-bold uppercase tracking-[0.2em] text-slate-400"
                >
                    WhatsApp
                </p>


                @if ($contact?->phone)

                    <h2
                        class="mt-2 break-all text-lg font-bold text-[#1E293B]"
                    >
                        {{ $contact->phone }}
                    </h2>

                    <p
                        class="mt-2 text-sm leading-6 text-slate-500"
                    >
                        Hubungi kami secara langsung melalui WhatsApp.
                    </p>

                @else

                    <h2 class="mt-2 text-lg font-bold text-slate-400">
                        Belum tersedia
                    </h2>

                @endif

            </div>



            {{-- EMAIL --}}
            <div
                class="group rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl sm:p-7"
                data-aos="fade-up"
                data-aos-delay="100"
            >

                <div
                    class="flex items-center justify-between"
                >

                    <div
                        class="flex h-13 w-13 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192]"
                    >

                        <i class="bi bi-envelope-fill text-2xl"></i>

                    </div>


                    @if ($contact?->email)

                        <a
                            href="mailto:{{ $contact->email }}"
                            class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition hover:bg-[#2E3192] hover:text-white"
                            aria-label="Kirim Email"
                        >

                            <i class="bi bi-arrow-up-right"></i>

                        </a>

                    @endif

                </div>


                <p
                    class="mt-6 text-xs font-bold uppercase tracking-[0.2em] text-slate-400"
                >
                    Email
                </p>


                @if ($contact?->email)

                    <h2
                        class="mt-2 break-all text-lg font-bold text-[#1E293B]"
                    >
                        {{ $contact->email }}
                    </h2>

                    <p
                        class="mt-2 text-sm leading-6 text-slate-500"
                    >
                        Kirim pertanyaan atau informasi melalui email.
                    </p>

                @else

                    <h2 class="mt-2 text-lg font-bold text-slate-400">
                        Belum tersedia
                    </h2>

                @endif

            </div>



            {{-- JAM OPERASIONAL --}}
            <div
                class="group rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl sm:p-7"
                data-aos="fade-up"
                data-aos-delay="200"
            >

                <div
                    class="flex h-13 w-13 items-center justify-center rounded-2xl bg-[#F6D21A]/25 text-[#2E3192]"
                >

                    <i class="bi bi-clock-fill text-2xl"></i>

                </div>


                <p
                    class="mt-6 text-xs font-bold uppercase tracking-[0.2em] text-slate-400"
                >
                    Jam Operasional
                </p>


                <h2
                    class="mt-2 text-lg font-bold leading-7 text-[#1E293B]"
                >
                    {{ $contact?->office_hours ?? 'Senin - Sabtu, 08.00 - 17.00 WIB' }}
                </h2>


                <p
                    class="mt-2 text-sm leading-6 text-slate-500"
                >
                    Silakan hubungi kami pada jam operasional.
                </p>

            </div>

        </div>



        {{-- =====================================================
             LOCATION + MAP
        ====================================================== --}}

        @if ($contact?->address)

            <div
                class="mt-10 overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-sm sm:mt-14"
                data-aos="fade-up"
            >

                <div
                    class="grid lg:grid-cols-[.75fr_1.25fr]"
                >

                    {{-- LOCATION INFO --}}
                    <div
                        class="flex flex-col justify-center p-6 sm:p-8 lg:p-10"
                    >

                        <span
                            class="text-xs font-bold uppercase tracking-[0.25em] text-[#2E3192]"
                        >
                            Lokasi Kami
                        </span>


                        <h2
                            class="mt-4 text-2xl font-black leading-tight text-[#1E293B] sm:text-3xl lg:text-4xl"
                        >

                            Temukan Lokasi
                            <span class="text-[#2E3192]">
                                Bina Insani
                            </span>

                        </h2>


                        <p
                            class="mt-4 text-sm leading-7 text-slate-600 sm:text-base sm:leading-8"
                        >

                            Kunjungi lokasi Bina Insani untuk mendapatkan
                            informasi secara langsung dari tim kami.

                        </p>


                        {{-- ADDRESS --}}
                        <div
                            class="mt-7 rounded-2xl bg-slate-50 p-5"
                        >

                            <div
                                class="flex items-start gap-4"
                            >

                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]"
                                >

                                    <i class="bi bi-geo-alt-fill"></i>

                                </div>


                                <div class="min-w-0">

                                    <p
                                        class="text-xs font-bold uppercase tracking-wider text-slate-400"
                                    >
                                        Alamat
                                    </p>


                                    <p
                                        class="mt-2 text-sm leading-7 text-slate-700 sm:text-base"
                                    >
                                        {{ $contact->address }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- MAP BUTTON --}}
                        <a
                            href="https://www.google.com/maps/search/?api=1&query={{ urlencode($contact->address) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-5 inline-flex w-fit items-center gap-2 rounded-xl bg-[#2E3192] px-6 py-3.5 text-sm font-bold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-[#252879]"
                        >

                            <i class="bi bi-map-fill"></i>

                            Buka Google Maps

                            <i class="bi bi-arrow-up-right"></i>

                        </a>

                    </div>



                    {{-- MAP --}}
                    <div
                        class="min-h-[350px] bg-slate-100 lg:min-h-[520px]"
                    >

                        @if ($contact?->maps)

                            <iframe
                                src="https://www.google.com/maps?q={{ urlencode($contact->maps) }}&output=embed"
                                width="100%"
                                height="100%"
                                style="border:0; width:100%; height:100%; min-height:350px;"
                                allowfullscreen
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>

                        @else

                            <div
                                class="flex min-h-[350px] items-center justify-center p-8 text-center"
                            >

                                <div>

                                    <div
                                        class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-white text-[#2E3192] shadow-sm"
                                    >

                                        <i class="bi bi-map text-2xl"></i>

                                    </div>


                                    <h3
                                        class="mt-5 text-lg font-bold text-slate-700"
                                    >
                                        Google Maps Belum Tersedia
                                    </h3>


                                    <p
                                        class="mt-2 text-sm text-slate-500"
                                    >
                                        Lokasi belum dikonfigurasi oleh administrator.
                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        @endif



        {{-- =====================================================
             SOCIAL MEDIA
        ====================================================== --}}

        <div
            class="mt-12 text-center sm:mt-16"
            data-aos="fade-up"
        >

            <p
                class="text-sm font-semibold text-slate-500"
            >
                Temukan informasi terbaru Bina Insani
            </p>


            <div
                class="mt-5 flex flex-wrap justify-center gap-3"
            >

                @if (setting('facebook'))

                    <a
                        href="{{ setting('facebook') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Facebook"
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#2E3192] text-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
                    >
                        <i class="bi bi-facebook"></i>
                    </a>

                @endif


                @if (setting('instagram'))

                    <a
                        href="{{ setting('instagram') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Instagram"
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-pink-600 text-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
                    >
                        <i class="bi bi-instagram"></i>
                    </a>

                @endif


                @if (setting('youtube'))

                    <a
                        href="{{ setting('youtube') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="YouTube"
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-600 text-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
                    >
                        <i class="bi bi-youtube"></i>
                    </a>

                @endif


                @if (setting('tiktok'))

                    <a
                        href="{{ setting('tiktok') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="TikTok"
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-900 text-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
                    >
                        <i class="bi bi-tiktok"></i>
                    </a>

                @endif

            </div>

        </div>



        {{-- =====================================================
             BOTTOM CTA
        ====================================================== --}}

        <div
            class="mt-12 overflow-hidden rounded-[30px] bg-[#2E3192] p-6 text-white shadow-xl sm:mt-16 sm:p-8 lg:p-10"
            data-aos="fade-up"
        >

            <div
                class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between"
            >

                <div>

                    <p
                        class="text-xs font-bold uppercase tracking-[0.2em] text-[#F6D21A]"
                    >
                        Langkah Berikutnya
                    </p>


                    <h2
                        class="mt-2 text-2xl font-black sm:text-3xl"
                    >
                        Sudah Siap Memulai?
                    </h2>


                    <p
                        class="mt-2 max-w-2xl text-sm leading-7 text-blue-100 sm:text-base"
                    >
                        Lihat program pelatihan yang tersedia dan
                        temukan pilihan yang sesuai untukmu.
                    </p>

                </div>


                <a
                    href="{{ route('programs.index') }}"
                    class="group inline-flex items-center justify-center gap-2 rounded-xl bg-[#F6D21A] px-6 py-3.5 text-sm font-bold text-[#1E293B] shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-xl sm:px-7 sm:py-4 sm:text-base"
                >

                    Lihat Program

                    <i
                        class="bi bi-arrow-right transition group-hover:translate-x-1"
                    ></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection
