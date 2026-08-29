@extends('layouts.landing')

@section('title', 'FAQ')

@section('content')

<section
    class="relative min-h-screen overflow-hidden bg-slate-50 pb-20 pt-28 sm:pb-24 sm:pt-32 lg:pb-28"
>

    {{-- =========================================================
         BACKGROUND DECORATION
    ========================================================== --}}

    <div
        class="pointer-events-none absolute inset-0 overflow-hidden"
        aria-hidden="true"
    >
        <div
            class="absolute -left-40 top-10 h-96 w-96 rounded-full bg-[#2E3192]/10 blur-3xl"
        ></div>

        <div
            class="absolute -right-40 top-1/3 h-[450px] w-[450px] rounded-full bg-[#F6D21A]/12 blur-3xl"
        ></div>

        <div
            class="absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-[#ED1C24]/5 blur-3xl"
        ></div>
    </div>



    <div
        class="relative mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8"
    >

        {{-- =====================================================
             HERO FAQ
        ====================================================== --}}

        <div
            class="grid items-center gap-10 lg:grid-cols-[1fr_.8fr] lg:gap-16"
        >

            {{-- LEFT --}}
            <div
                data-aos="fade-right"
            >

                <span
                    class="inline-flex items-center gap-2 rounded-full bg-[#F6D21A]/30 px-4 py-2 text-xs font-bold text-[#2E3192] sm:text-sm"
                >
                    <i class="bi bi-question-circle-fill"></i>
                    Frequently Asked Questions
                </span>


                <h1
                    class="mt-5 text-4xl font-black leading-[1.08] tracking-tight text-[#1E293B] sm:text-5xl lg:text-6xl"
                >
                    Semua yang Perlu
                    <span
                        class="block bg-gradient-to-r from-[#2E3192] to-[#ED1C24] bg-clip-text text-transparent"
                    >
                        Kamu Ketahui
                    </span>
                </h1>


                <p
                    class="mt-6 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base sm:leading-8 lg:text-lg"
                >
                    Temukan jawaban atas pertanyaan yang sering diajukan
                    mengenai program pelatihan, proses pendaftaran,
                    dokumen, pembayaran, hingga tahapan persiapan
                    menuju Korea Selatan.
                </p>


                {{-- QUICK TOPICS --}}
                <div
                    class="mt-8 grid gap-3 sm:grid-cols-3"
                >

                    <div
                        class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm"
                    >
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]"
                        >
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                        <p
                            class="mt-3 text-sm font-bold text-[#1E293B]"
                        >
                            Program
                        </p>

                        <p
                            class="mt-1 text-xs leading-5 text-slate-500"
                        >
                            Pelatihan & jadwal
                        </p>
                    </div>


                    <div
                        class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm"
                    >
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F6D21A]/25 text-[#2E3192]"
                        >
                            <i class="bi bi-file-earmark-check-fill"></i>
                        </div>

                        <p
                            class="mt-3 text-sm font-bold text-[#1E293B]"
                        >
                            Pendaftaran
                        </p>

                        <p
                            class="mt-1 text-xs leading-5 text-slate-500"
                        >
                            Dokumen & tahapan
                        </p>
                    </div>


                    <div
                        class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm"
                    >
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-100 text-green-600"
                        >
                            <i class="bi bi-credit-card-fill"></i>
                        </div>

                        <p
                            class="mt-3 text-sm font-bold text-[#1E293B]"
                        >
                            Pembayaran
                        </p>

                        <p
                            class="mt-1 text-xs leading-5 text-slate-500"
                        >
                            Metode & verifikasi
                        </p>
                    </div>

                </div>

            </div>



            {{-- RIGHT VISUAL --}}
            <div
                class="relative"
                data-aos="fade-left"
            >

                <div
                    class="relative overflow-hidden rounded-[32px] bg-[#0F172A] p-6 shadow-[0_30px_80px_rgba(15,23,42,.15)] sm:p-8 lg:p-10"
                >

                    {{-- Decoration --}}
                    <div
                        class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-[#2E3192]/50 blur-3xl"
                    ></div>

                    <div
                        class="absolute -bottom-24 -left-20 h-64 w-64 rounded-full bg-[#F6D21A]/10 blur-3xl"
                    ></div>


                    <div
                        class="relative"
                    >

                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 text-[#F6D21A]"
                        >
                            <i class="bi bi-chat-square-text-fill text-2xl"></i>
                        </div>


                        <p
                            class="mt-7 text-xs font-bold uppercase tracking-[0.25em] text-[#F6D21A]"
                        >
                            Pusat Informasi
                        </p>


                        <h2
                            class="mt-3 text-2xl font-black leading-tight text-white sm:text-3xl"
                        >
                            Cari tahu sebelum
                            kamu mendaftar.
                        </h2>


                        <p
                            class="mt-4 text-sm leading-7 text-slate-300 sm:text-base"
                        >
                            Kami merangkum informasi penting agar kamu
                            dapat memahami proses pendaftaran dengan lebih
                            mudah dan tidak bingung saat mempersiapkan
                            dokumen maupun pembayaran.
                        </p>


                        <div class="mt-7 space-y-3">

                            <div
                                class="flex items-center gap-3 rounded-xl border border-white/10 bg-white/5 p-3"
                            >
                                <i class="bi bi-check-circle-fill text-green-400"></i>
                                <span class="text-sm text-slate-200">
                                    Informasi program
                                </span>
                            </div>

                            <div
                                class="flex items-center gap-3 rounded-xl border border-white/10 bg-white/5 p-3"
                            >
                                <i class="bi bi-check-circle-fill text-green-400"></i>
                                <span class="text-sm text-slate-200">
                                    Persyaratan pendaftaran
                                </span>
                            </div>

                            <div
                                class="flex items-center gap-3 rounded-xl border border-white/10 bg-white/5 p-3"
                            >
                                <i class="bi bi-check-circle-fill text-green-400"></i>
                                <span class="text-sm text-slate-200">
                                    Informasi pembayaran
                                </span>
                            </div>

                            <div
                                class="flex items-center gap-3 rounded-xl border border-white/10 bg-white/5 p-3"
                            >
                                <i class="bi bi-check-circle-fill text-green-400"></i>
                                <span class="text-sm text-slate-200">
                                    Tahapan proses peserta
                                </span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
             INFORMATION STRIP
        ====================================================== --}}

        <div
            class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4"
            data-aos="fade-up"
        >

            <div
                class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"
            >
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Fokus
                </p>

                <h3 class="mt-2 font-bold text-[#1E293B]">
                    Bahasa Korea
                </h3>

                <p class="mt-1 text-sm leading-6 text-slate-500">
                    Pembelajaran untuk membantu peserta mempersiapkan kemampuan bahasa.
                </p>
            </div>


            <div
                class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"
            >
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Persiapan
                </p>

                <h3 class="mt-2 font-bold text-[#1E293B]">
                    EPS-TOPIK
                </h3>

                <p class="mt-1 text-sm leading-6 text-slate-500">
                    Informasi mengenai persiapan dan pembelajaran yang berkaitan dengan EPS-TOPIK.
                </p>
            </div>


            <div
                class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"
            >
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Administrasi
                </p>

                <h3 class="mt-2 font-bold text-[#1E293B]">
                    Dokumen
                </h3>

                <p class="mt-1 text-sm leading-6 text-slate-500">
                    Informasi mengenai dokumen dan tahapan pendaftaran peserta.
                </p>
            </div>


            <div
                class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"
            >
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Bantuan
                </p>

                <h3 class="mt-2 font-bold text-[#1E293B]">
                    Tim Bina Insani
                </h3>

                <p class="mt-1 text-sm leading-6 text-slate-500">
                    Hubungi tim untuk pertanyaan yang belum terjawab.
                </p>
            </div>

        </div>



        {{-- =====================================================
             FAQ AREA
        ====================================================== --}}

        <div
            class="mt-14 grid items-start gap-8 lg:mt-20 lg:grid-cols-[.35fr_1fr] lg:gap-12"
        >

            {{-- LEFT TITLE --}}
            <div
                class="lg:sticky lg:top-28"
                data-aos="fade-right"
            >

                <span
                    class="text-xs font-bold uppercase tracking-[0.25em] text-[#2E3192]"
                >
                    Frequently Asked
                </span>


                <h2
                    class="mt-3 text-2xl font-black leading-tight text-[#1E293B] sm:text-3xl"
                >
                    Pertanyaan yang
                    <span class="text-[#2E3192]">
                        Sering Muncul
                    </span>
                </h2>


                <p
                    class="mt-4 text-sm leading-7 text-slate-500 sm:text-base"
                >
                    Klik pertanyaan untuk melihat jawaban lengkapnya.
                    Kamu dapat membuka pertanyaan satu per satu agar
                    lebih mudah membaca informasi.
                </p>


                <div
                    class="mt-6 rounded-2xl border border-[#2E3192]/10 bg-[#2E3192]/5 p-5"
                >

                    <div class="flex items-start gap-3">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#2E3192] text-white"
                        >
                            <i class="bi bi-lightbulb-fill"></i>
                        </div>

                        <div>

                            <h3 class="text-sm font-bold text-[#1E293B]">
                                Tips
                            </h3>

                            <p class="mt-1 text-xs leading-5 text-slate-500">
                                Baca FAQ terlebih dahulu sebelum menghubungi
                                admin agar informasi yang kamu cari lebih mudah ditemukan.
                            </p>

                        </div>

                    </div>

                </div>

            </div>



            {{-- FAQ LIST --}}
            <div
                x-data="{ active: null }"
                class="space-y-4"
                data-aos="fade-left"
            >

                @forelse ($faqs as $index => $faq)

                    <div
                        class="overflow-hidden rounded-[24px] border border-slate-200 bg-white shadow-sm transition duration-300 hover:border-[#2E3192]/20 hover:shadow-lg"
                    >

                        {{-- QUESTION --}}
                        <button
                            type="button"
                            class="flex w-full items-center justify-between gap-4 px-5 py-5 text-left sm:px-6 sm:py-6"
                            @click="active === {{ $index }} ? active = null : active = {{ $index }}"
                            :aria-expanded="active === {{ $index }}"
                        >

                            <div
                                class="flex min-w-0 items-start gap-4"
                            >

                                {{-- Number --}}
                                <div
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 text-xs font-black text-[#2E3192] sm:h-11 sm:w-11"
                                >
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>


                                <div class="min-w-0">

                                    <p
                                        class="text-sm font-bold leading-6 text-[#1E293B] sm:text-base sm:leading-7 lg:text-lg"
                                    >
                                        {{ $faq->question }}
                                    </p>

                                </div>

                            </div>


                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-slate-100 text-[#2E3192] transition duration-300"
                                :class="active === {{ $index }} ? 'rotate-180 bg-[#2E3192] text-white' : ''"
                            >
                                <i class="bi bi-chevron-down"></i>
                            </div>

                        </button>



                        {{-- ANSWER --}}
                        <div
                            x-show="active === {{ $index }}"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            x-cloak
                        >

                            <div
                                class="border-t border-slate-100 bg-slate-50 px-5 pb-6 pt-5 sm:px-6 sm:pb-7"
                            >

                                <div
                                    class="flex items-start gap-4"
                                >

                                    <div
                                        class="mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-green-100 text-green-600"
                                    >
                                        <i class="bi bi-check-lg"></i>
                                    </div>


                                    <div class="min-w-0">

                                        <p
                                            class="text-sm leading-7 text-slate-600 sm:text-base sm:leading-8"
                                        >
                                            {{ $faq->answer }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    {{-- EMPTY --}}
                    <div
                        class="rounded-[28px] border border-dashed border-slate-300 bg-white p-10 text-center sm:p-14"
                    >

                        <div
                            class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192]"
                        >
                            <i class="bi bi-question-circle text-2xl"></i>
                        </div>


                        <h3
                            class="mt-5 text-xl font-bold text-[#1E293B] sm:text-2xl"
                        >
                            FAQ Belum Tersedia
                        </h3>


                        <p
                            class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500"
                        >
                            Saat ini belum ada pertanyaan yang ditampilkan.
                            Silakan hubungi Bina Insani untuk mendapatkan informasi lebih lanjut.
                        </p>


                        <a
                            href="{{ route('contact.public') }}"
                            class="mt-6 inline-flex items-center gap-2 rounded-xl bg-[#2E3192] px-6 py-3.5 text-sm font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-[#252879] hover:bg-blue-900"
                        >
                            <i class="bi bi-telephone-fill"></i>
                            Hubungi Kami
                        </a>

                    </div>

                @endforelse

            </div>

        </div>



        {{-- =====================================================
             CONTACT CTA
        ====================================================== --}}

        <div
            class="mt-14 overflow-hidden rounded-[30px] bg-gradient-to-r from-[#2E3192] via-[#313598] to-[#34389e] p-6 text-white shadow-xl sm:mt-20 sm:p-8 lg:p-10"
            data-aos="fade-up"
        >

            <div
                class="flex flex-col gap-7 lg:flex-row lg:items-center lg:justify-between"
            >

                <div class="max-w-2xl">

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1.5 text-xs font-bold text-[#F6D21A]"
                    >
                        <i class="bi bi-headset"></i>
                        Butuh Bantuan?
                    </span>


                    <h2
                        class="mt-4 text-2xl font-black sm:text-3xl lg:text-4xl"
                    >
                        Belum Menemukan
                        <span class="text-[#F6D21A]">
                            Jawabanmu?
                        </span>
                    </h2>


                    <p
                        class="mt-3 text-sm leading-7 text-blue-100 sm:text-base sm:leading-8"
                    >
                        Jangan ragu untuk menghubungi tim Bina Insani.
                        Kami siap membantu memberikan informasi mengenai
                        program dan proses pendaftaran.
                    </p>

                </div>


                <div
                    class="flex flex-col gap-3 sm:flex-row lg:shrink-0"
                >

                    <a
                        href="{{ route('programs.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/10 px-6 py-3.5 text-sm font-bold text-white backdrop-blur transition duration-300 hover:-translate-y-1 hover:bg-white/20"
                    >

                        <i class="bi bi-mortarboard-fill"></i>

                        Lihat Program

                    </a>


                    <a
                        href="{{ route('contact.public') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#F6D21A] px-6 py-3.5 text-sm font-bold text-[#1E293B] shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-xl"
                    >

                        <i class="bi bi-chat-dots-fill"></i>

                        Hubungi Kami

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
