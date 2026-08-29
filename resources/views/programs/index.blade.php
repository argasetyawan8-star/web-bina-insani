@extends('layouts.landing')

@section('title', 'Program Pelatihan')

@section('content')

<section class="min-h-screen bg-slate-50 pb-20 pt-32">

    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">


        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <div
            class="mx-auto max-w-3xl text-center"
            data-aos="fade-up"
        >

            <span class="inline-flex items-center gap-2 rounded-full bg-[#F6D21A]/30 px-4 py-2 text-xs font-semibold text-[#2E3192] sm:text-sm">

                <i class="bi bi-mortarboard-fill"></i>

                Program Pelatihan

            </span>


            <h1 class="mt-5 text-3xl font-extrabold leading-tight text-[#1E293B] sm:text-4xl lg:text-5xl">

                Pilih Program
                <span class="bg-gradient-to-r from-[#2E3192] to-[#ED1C24] bg-clip-text text-transparent">
                    Sesuai Kebutuhanmu
                </span>

            </h1>


            <p class="mt-5 text-sm leading-7 text-slate-600 sm:text-base sm:leading-8 lg:text-lg">

                Kenali pilihan program pelatihan Bahasa Korea Bina Insani
                dan pilih program yang paling sesuai dengan kebutuhanmu.

            </p>

        </div>


        {{-- =====================================================
             PROGRAM LIST
        ====================================================== --}}
        <div class="mt-12 grid gap-6 sm:mt-16 sm:gap-8 lg:grid-cols-2 lg:gap-10">

            @forelse ($programs as $program)

                <article
                    data-aos="zoom-in"
                    class="group relative overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-lg transition duration-500 hover:-translate-y-2 hover:shadow-2xl sm:rounded-[32px]"
                >

                    {{-- ACCENT --}}
                    <div class="h-2 bg-gradient-to-r from-[#2E3192] via-blue-600 to-[#ED1C24]"></div>


                    <div class="p-5 sm:p-7 lg:p-10">

                        {{-- HEADER --}}
                        <div class="flex items-start justify-between gap-4">

                            <div class="flex min-w-0 items-center gap-4">

                                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#2E3192] to-[#ED1C24] text-white shadow-lg sm:h-16 sm:w-16">

                                    @if (str_contains(strtolower($program->name), 'intensif'))

                                        <i class="bi bi-lightning-charge-fill text-2xl sm:text-3xl"></i>

                                    @else

                                        <i class="bi bi-calendar-check-fill text-2xl sm:text-3xl"></i>

                                    @endif

                                </div>


                                <div class="min-w-0">

                                    <p class="text-xs font-semibold uppercase tracking-wide text-[#2E3192]">
                                        Program Pelatihan
                                    </p>

                                    <h2 class="mt-1 break-words text-xl font-extrabold text-[#1E293B] sm:text-2xl">
                                        {{ $program->name }}
                                    </h2>

                                </div>

                            </div>


                            <span class="shrink-0 rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700">

                                <i class="bi bi-check-circle-fill me-1"></i>

                                Aktif

                            </span>

                        </div>


                        {{-- DESCRIPTION --}}
                        <p class="mt-6 text-sm leading-7 text-slate-600 sm:text-base">

                            {{ $program->description }}

                        </p>


                        {{-- INFORMATION --}}
                        <div class="mt-7 grid gap-3 sm:grid-cols-2">

                            {{-- REGISTRATION FEE --}}
                            <div class="rounded-2xl bg-slate-50 p-4">

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


                            {{-- TRAINING FEE --}}
                            <div class="rounded-2xl bg-slate-50 p-4">

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


                            {{-- TRAINING DAYS --}}
                            <div class="rounded-2xl bg-slate-50 p-4">

                                <div class="flex items-start gap-3">

                                    <i class="bi bi-calendar-week-fill mt-0.5 text-[#2E3192]"></i>

                                    <div class="min-w-0">

                                        <p class="text-xs text-slate-500">
                                            Hari Pelatihan
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-slate-800">
                                            {{ $program->training_days ?? '-' }}
                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- TRAINING HOURS --}}
                            <div class="rounded-2xl bg-slate-50 p-4">

                                <div class="flex items-start gap-3">

                                    <i class="bi bi-clock-history mt-0.5 text-[#2E3192]"></i>

                                    <div class="min-w-0">

                                        <p class="text-xs text-slate-500">
                                            Jam Pelatihan
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-slate-800">
                                            {{ $program->training_hours ?? '-' }}
                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- DURATION --}}
                            <div class="rounded-2xl bg-slate-50 p-4 sm:col-span-2">

                                <div class="flex items-start gap-3">

                                    <i class="bi bi-hourglass-split mt-0.5 text-[#2E3192]"></i>

                                    <div class="min-w-0">

                                        <p class="text-xs text-slate-500">
                                            Durasi
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-slate-800">
                                            {{ $program->duration ?? '-' }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- ACTIONS --}}
                        <div class="mt-7 flex flex-col gap-3 sm:mt-8 sm:flex-row">


                            {{-- DETAIL --}}
                            <a
                                href="{{ route('programs.show', $program) }}"
                                class="inline-flex flex-1 items-center justify-center gap-2 rounded-2xl border border-[#2E3192]/20 bg-[#2E3192]/5 px-5 py-3.5 text-sm font-bold text-[#2E3192] transition hover:-translate-y-0.5 hover:bg-[#2E3192]/10 sm:text-base"
                            >

                                <i class="bi bi-eye"></i>

                                Lihat Detail

                            </a>


                            {{-- DAFTAR --}}
                            @auth

                                <a
                                    href="{{ route('registration.create', $program) }}"
                                    class="inline-flex flex-1 items-center justify-center gap-2 rounded-2xl bg-[#2E3192] px-5 py-3.5 text-sm font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900 sm:text-base"
                                >

                                    Daftar Program

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            @else

                                <a
                                    href="{{ route('login') }}"
                                    class="inline-flex flex-1 items-center justify-center gap-2 rounded-2xl bg-[#2E3192] px-5 py-3.5 text-sm font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900 sm:text-base"
                                >

                                    Login untuk Daftar

                                    <i class="bi bi-box-arrow-in-right"></i>

                                </a>

                            @endauth

                        </div>

                    </div>

                </article>

            @empty

                {{-- EMPTY STATE --}}
                <div class="rounded-3xl border border-dashed border-slate-300 bg-white p-12 text-center lg:col-span-2">

                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                        <i class="bi bi-mortarboard text-3xl"></i>

                    </div>

                    <h3 class="mt-5 text-xl font-bold text-slate-800">
                        Belum Ada Program
                    </h3>

                    <p class="mx-auto mt-2 max-w-lg text-sm leading-6 text-slate-500">
                        Saat ini belum tersedia program pelatihan aktif.
                    </p>

                </div>

            @endforelse

        </div>


        {{-- =====================================================
             INFORMATION
        ====================================================== --}}
        <div
            class="mx-auto mt-12 max-w-4xl rounded-3xl border border-[#2E3192]/10 bg-white p-6 shadow-sm sm:mt-16 sm:p-8"
            data-aos="fade-up"
        >

            <div class="flex flex-col gap-5 sm:flex-row sm:items-start">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192]">

                    <i class="bi bi-info-circle-fill text-xl"></i>

                </div>


                <div>

                    <h3 class="text-lg font-bold text-[#1E293B]">
                        Informasi Pendaftaran
                    </h3>

                    <p class="mt-2 text-sm leading-7 text-slate-600 sm:text-base">

                        Anda dapat melihat detail program tanpa harus login.
                        Untuk melakukan pendaftaran, Anda wajib login terlebih dahulu.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection