@extends('layouts.landing')

@section('title', $program->name)

@section('content')

<section class="min-h-screen bg-slate-50 pb-20 pt-32">

    <div class="mx-auto w-full max-w-6xl px-4 sm:px-6 lg:px-8">


        {{-- =====================================================
             BACK
        ====================================================== --}}
        <div data-aos="fade-right">

            <a
                href="{{ route('programs.index') }}"
                class="inline-flex items-center gap-2 text-sm font-semibold text-[#2E3192] transition hover:text-[#ED1C24]"
            >

                <i class="bi bi-arrow-left"></i>

                Kembali ke Program

            </a>

        </div>


        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <div
            class="mt-6 overflow-hidden rounded-[30px] bg-gradient-to-r from-[#2E3192] to-blue-800 text-white shadow-2xl sm:rounded-[36px]"
            data-aos="fade-up"
        >

            <div class="p-6 sm:p-10 lg:p-14">

                <div class="flex flex-col gap-7 lg:flex-row lg:items-center lg:justify-between">

                    <div class="min-w-0">

                        <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs font-semibold text-blue-100 sm:text-sm">

                            <i class="bi bi-mortarboard-fill"></i>

                            Program Pelatihan

                        </span>


                        <h1 class="mt-5 break-words text-3xl font-extrabold leading-tight sm:text-4xl lg:text-5xl">
                            {{ $program->name }}
                        </h1>


                        <p class="mt-5 max-w-3xl text-sm leading-7 text-blue-100 sm:text-base sm:leading-8 lg:text-lg">
                            {{ $program->description }}
                        </p>

                    </div>


                    <div class="shrink-0">

                        <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-white/10 sm:h-24 sm:w-24">

                            @if (str_contains(strtolower($program->name), 'intensif'))

                                <i class="bi bi-lightning-charge-fill text-4xl sm:text-5xl"></i>

                            @else

                                <i class="bi bi-calendar-check-fill text-4xl sm:text-5xl"></i>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             CONTENT
        ====================================================== --}}
        <div class="mt-8 grid gap-6 sm:mt-10 sm:gap-8 lg:grid-cols-3">


            {{-- =================================================
                 INFORMATION
            ================================================== --}}
            <div class="lg:col-span-2">


                {{-- PROGRAM INFORMATION --}}
                <div
                    class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8"
                    data-aos="fade-up"
                >

                    <h2 class="text-2xl font-extrabold text-[#1E293B]">
                        Informasi Program
                    </h2>


                    <div class="mt-6 grid gap-4 sm:grid-cols-2">


                        {{-- REGISTRATION FEE --}}
                        <div class="rounded-2xl bg-slate-50 p-5">

                            <div class="flex items-center gap-3">

                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-yellow-100 text-yellow-700">

                                    <i class="bi bi-wallet2 text-lg"></i>

                                </div>


                                <div>

                                    <p class="text-xs text-slate-500">
                                        Biaya Pendaftaran
                                    </p>

                                    <p class="mt-1 text-lg font-extrabold text-[#2E3192]">

                                        Rp
                                        {{ number_format(
                                            $program->registration_fee,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- TRAINING FEE --}}
                        <div class="rounded-2xl bg-slate-50 p-5">

                            <div class="flex items-center gap-3">

                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]">

                                    <i class="bi bi-cash-stack text-lg"></i>

                                </div>


                                <div>

                                    <p class="text-xs text-slate-500">
                                        Biaya Pelatihan
                                    </p>

                                    <p class="mt-1 text-lg font-extrabold text-[#2E3192]">

                                        Rp
                                        {{ number_format(
                                            $program->training_fee,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- DAYS --}}
                        <div class="rounded-2xl bg-slate-50 p-5">

                            <div class="flex items-start gap-3">

                                <i class="bi bi-calendar-week-fill mt-1 text-[#2E3192]"></i>

                                <div>

                                    <p class="text-xs text-slate-500">
                                        Hari Pelatihan
                                    </p>

                                    <p class="mt-1 font-bold text-slate-800">
                                        {{ $program->training_days ?? '-' }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- HOURS --}}
                        <div class="rounded-2xl bg-slate-50 p-5">

                            <div class="flex items-start gap-3">

                                <i class="bi bi-clock-history mt-1 text-[#2E3192]"></i>

                                <div>

                                    <p class="text-xs text-slate-500">
                                        Jam Pelatihan
                                    </p>

                                    <p class="mt-1 font-bold text-slate-800">
                                        {{ $program->training_hours ?? '-' }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- DURATION --}}
                        <div class="rounded-2xl bg-slate-50 p-5 sm:col-span-2">

                            <div class="flex items-start gap-3">

                                <i class="bi bi-hourglass-split mt-1 text-[#2E3192]"></i>

                                <div>

                                    <p class="text-xs text-slate-500">
                                        Durasi Program
                                    </p>

                                    <p class="mt-1 font-bold text-slate-800">
                                        {{ $program->duration ?? '-' }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- BENEFITS --}}
                <div
                    class="mt-6 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:mt-8 sm:p-8"
                    data-aos="fade-up"
                >

                    <h2 class="text-2xl font-extrabold text-[#1E293B]">
                        Yang Akan Anda Dapatkan
                    </h2>


                    <div class="mt-6 grid gap-4 sm:grid-cols-2">


                        <div class="flex items-start gap-3">

                            <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>

                            <span class="text-sm leading-6 text-slate-600 sm:text-base">
                                Modul Bahasa Korea
                            </span>

                        </div>


                        <div class="flex items-start gap-3">

                            <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>

                            <span class="text-sm leading-6 text-slate-600 sm:text-base">
                                Simulasi EPS-TOPIK
                            </span>

                        </div>


                        <div class="flex items-start gap-3">

                            <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>

                            <span class="text-sm leading-6 text-slate-600 sm:text-base">
                                Pendampingan Administrasi
                            </span>

                        </div>


                        <div class="flex items-start gap-3">

                            <i class="bi bi-check-circle-fill mt-1 shrink-0 text-slate-600"></i>

                            <span class="text-sm leading-6 text-slate-600 sm:text-base">
                                Persiapan Kerja ke Korea
                            </span>

                        </div>


                        <div class="flex items-start gap-3 sm:col-span-2">

                            <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>

                            <span class="text-sm leading-6 text-slate-600 sm:text-base">
                                Pendampingan hingga proses keberangkatan
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 CTA
            ================================================== --}}
            <div>

                <div
                    class="sticky top-28 rounded-3xl border border-slate-200 bg-white p-6 shadow-xl sm:p-8"
                    data-aos="fade-left"
                >

                    <p class="text-sm font-semibold text-slate-500">
                        Biaya Pendaftaran
                    </p>


                    <h2 class="mt-2 text-3xl font-extrabold text-[#2E3192]">

                        Rp
                        {{ number_format(
                            $program->registration_fee,
                            0,
                            ',',
                            '.'
                        ) }}

                    </h2>


                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Biaya pendaftaran awal untuk memulai proses pendaftaran.
                    </p>


                    <div class="my-6 h-px bg-slate-200"></div>


                    @auth

                        <a
                            href="{{ route('registration.create', $program) }}"
                            class="flex w-full items-center justify-center gap-2 rounded-2xl bg-[#2E3192] px-6 py-4 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900"
                        >

                            <i class="bi bi-pencil-square"></i>

                            Daftar Program

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="flex w-full items-center justify-center gap-2 rounded-2xl bg-[#2E3192] px-6 py-4 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900"
                        >

                            <i class="bi bi-box-arrow-in-right"></i>

                            Login untuk Daftar

                        </a>

                    @endauth


                    <p class="mt-4 text-center text-xs leading-5 text-slate-400">
                        Anda dapat melihat informasi program tanpa login.
                        Login diperlukan untuk melakukan pendaftaran.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection