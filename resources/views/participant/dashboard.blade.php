@extends('layouts.landing')

@section('title', 'Dashboard Peserta')

@section('content')

<section class="min-h-screen bg-slate-50 pb-16 pt-32">

    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">


        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <div
            data-aos="fade-up"
            class="mb-8"
        >

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div class="min-w-0">

                    <span class="inline-flex items-center gap-2 rounded-full bg-[#F6D21A]/30 px-4 py-2 text-xs font-semibold text-[#2E3192] sm:text-sm">

                        <i class="bi bi-person-circle"></i>

                        Dashboard Peserta

                    </span>


                    <h1 class="mt-4 break-words text-3xl font-extrabold text-slate-800 sm:text-4xl">

                        Selamat datang,

                        <span class="text-[#2E3192]">
                            {{ $user->name }}
                        </span>

                    </h1>


                    <p class="mt-2 text-sm leading-7 text-slate-500 sm:text-base">
                        Kelola pendaftaran dan pantau seluruh proses pelatihanmu di sini.
                    </p>

                </div>


                <a
                    href="{{ route('programs.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#2E3192] px-5 py-3 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-[#252879]"
                >

                    <i class="bi bi-mortarboard"></i>

                    Lihat Program

                </a>

            </div>

        </div>



        {{-- =====================================================
             STATISTICS
        ====================================================== --}}
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">


            {{-- TOTAL --}}
            <div
                data-aos="fade-up"
                data-aos-delay="100"
                class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"
            >

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Total Pendaftaran
                        </p>

                        <h2 class="mt-2 text-3xl font-extrabold text-slate-800">
                            {{ $totalRegistrations }}
                        </h2>

                    </div>


                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-700">

                        <i class="bi bi-file-earmark-text text-xl"></i>

                    </div>

                </div>

            </div>



            {{-- WAITING --}}
            <div
                data-aos="fade-up"
                data-aos-delay="150"
                class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"
            >

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Menunggu Verifikasi
                        </p>

                        <h2 class="mt-2 text-3xl font-extrabold text-slate-800">
                            {{ $waitingRegistrations }}
                        </h2>

                    </div>


                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-100 text-orange-600">

                        <i class="bi bi-hourglass-split text-xl"></i>

                    </div>

                </div>

            </div>



            {{-- PAID --}}
            <div
                data-aos="fade-up"
                data-aos-delay="200"
                class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"
            >

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Pembayaran Lunas
                        </p>

                        <h2 class="mt-2 text-3xl font-extrabold text-slate-800">
                            {{ $paidRegistrations }}
                        </h2>

                    </div>


                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600">

                        <i class="bi bi-check-circle text-xl"></i>

                    </div>

                </div>

            </div>



            {{-- DOCUMENT --}}
            <div
                data-aos="fade-up"
                data-aos-delay="250"
                class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"
            >

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Total Dokumen
                        </p>

                        <h2 class="mt-2 text-3xl font-extrabold text-slate-800">
                            {{ $totalDocuments }}
                        </h2>

                    </div>


                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-purple-700">

                        <i class="bi bi-folder2-open text-xl"></i>

                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
             ALERT
        ====================================================== --}}
        @if ($rejectedRegistrations > 0)

            <div
                data-aos="fade-up"
                class="mt-6 rounded-2xl border border-red-200 bg-red-50 p-5"
            >

                <div class="flex items-start gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">

                        <i class="bi bi-exclamation-circle-fill"></i>

                    </div>


                    <div>

                        <h3 class="font-bold text-red-800">
                            Ada pembayaran yang ditolak
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-red-700">
                            Silakan buka pendaftaran yang memiliki status
                            pembayaran ditolak dan kirim bukti pembayaran kembali.
                        </p>

                    </div>

                </div>

            </div>

        @endif



        {{-- =====================================================
             REGISTRATION LIST
        ====================================================== --}}
        <div
            data-aos="fade-up"
            class="mt-8 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm"
        >

            {{-- HEADER --}}
            <div class="border-b border-slate-200 p-6">

                <h2 class="text-xl font-bold text-slate-800">
                    Pendaftaran Saya
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Pantau program, dokumen, dan status pembayaranmu.
                </p>

            </div>



            @forelse ($registrations as $registration)

                <div class="border-b border-slate-100 p-6 last:border-b-0">

                    <div class="flex flex-col gap-6">


                        {{-- =================================================
                             TOP
                        ================================================== --}}
                        <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">

                            <div class="min-w-0">

                                <div class="flex flex-wrap items-center gap-2">

                                    <h3 class="break-words text-lg font-bold text-slate-800">
                                        {{ $registration->program->name ?? '-' }}
                                    </h3>


                                    {{-- STATUS PESERTA --}}
                                    @if ($registration->status === 'verified')

                                        <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                            <i class="bi bi-check-circle-fill"></i>

                                            Terverifikasi

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1 rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">

                                            <i class="bi bi-hourglass-split"></i>

                                            Menunggu Verifikasi

                                        </span>

                                    @endif

                                </div>


                                {{-- INFO --}}
                                <div class="mt-3 grid gap-3 text-sm text-slate-500 sm:grid-cols-2">

                                    <div>

                                        <span class="font-medium text-slate-700">
                                            Kode:
                                        </span>

                                        {{ $registration->registration_code ?? '-' }}

                                    </div>


                                    <div>

                                        <span class="font-medium text-slate-700">
                                            Tanggal:
                                        </span>

                                        {{ $registration->created_at?->format('d M Y') ?? '-' }}

                                    </div>

                                </div>

                            </div>


                            {{-- PAYMENT STATUS --}}
                            <div class="shrink-0">

                                @if ($registration->payment_status === 'paid')

                                    <span class="inline-flex items-center gap-2 rounded-xl bg-green-100 px-4 py-3 text-sm font-bold text-green-700">

                                        <i class="bi bi-check-circle-fill"></i>

                                        Lunas

                                    </span>


                                @elseif ($registration->payment_status === 'waiting_verification')

                                    <span class="inline-flex items-center gap-2 rounded-xl bg-orange-100 px-4 py-3 text-sm font-bold text-orange-700">

                                        <i class="bi bi-hourglass-split"></i>

                                        Menunggu Verifikasi

                                    </span>


                                @elseif ($registration->payment_status === 'rejected')

                                    <span class="inline-flex items-center gap-2 rounded-xl bg-red-100 px-4 py-3 text-sm font-bold text-red-700">

                                        <i class="bi bi-x-circle-fill"></i>

                                        Pembayaran Ditolak

                                    </span>


                                @else

                                    <span class="inline-flex items-center gap-2 rounded-xl bg-slate-100 px-4 py-3 text-sm font-bold text-slate-600">

                                        <i class="bi bi-clock"></i>

                                        Belum Bayar

                                    </span>

                                @endif

                            </div>

                        </div>



                        {{-- =================================================
                             DETAIL CARDS
                        ================================================== --}}
                        <div class="grid gap-4 md:grid-cols-3">


                            {{-- PROGRAM --}}
                            <div class="rounded-2xl bg-slate-50 p-4">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                                        <i class="bi bi-mortarboard-fill"></i>

                                    </div>


                                    <div class="min-w-0">

                                        <p class="text-xs text-slate-500">
                                            Program
                                        </p>

                                        <p class="mt-1 truncate text-sm font-bold text-slate-800">
                                            {{ $registration->program->name ?? '-' }}
                                        </p>

                                    </div>

                                </div>

                            </div>



                            {{-- DOCUMENT --}}
                            <div class="rounded-2xl bg-slate-50 p-4">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-purple-100 text-purple-700">

                                        <i class="bi bi-folder-check"></i>

                                    </div>


                                    <div>

                                        <p class="text-xs text-slate-500">
                                            Dokumen
                                        </p>


                                        @php
                                            $documentCount =
                                                $registration
                                                    ->documents
                                                    ->count();
                                        @endphp


                                        @if ($documentCount >= 2)

                                            <p class="mt-1 text-sm font-bold text-green-700">
                                                {{ $documentCount }} Dokumen
                                            </p>

                                        @elseif ($documentCount === 1)

                                            <p class="mt-1 text-sm font-bold text-orange-600">
                                                1 Dokumen
                                            </p>

                                        @else

                                            <p class="mt-1 text-sm font-bold text-red-600">
                                                Belum Upload
                                            </p>

                                        @endif

                                    </div>

                                </div>

                            </div>



                            {{-- REGISTRATION FEE --}}
                            <div class="rounded-2xl bg-slate-50 p-4">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-yellow-100 text-yellow-700">

                                        <i class="bi bi-wallet2"></i>

                                    </div>


                                    <div class="min-w-0">

                                        <p class="text-xs text-slate-500">
                                            Biaya Pendaftaran
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-slate-800">

                                            Rp
                                            {{ number_format(
                                                $registration->program->registration_fee ?? 0,
                                                0,
                                                ',',
                                                '.'
                                            ) }}

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>



                        {{-- =================================================
                             ACTIONS
                        ================================================== --}}
                        <div class="flex flex-col gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">


                            {{-- PAID --}}
                            @if ($registration->payment_status === 'paid')

                                <a
                                    href="{{ route('payment.index', $registration) }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-green-200 bg-green-50 px-5 py-3 text-sm font-bold text-green-700 transition hover:bg-green-100"
                                >

                                    <i class="bi bi-eye"></i>

                                    Lihat Pembayaran

                                </a>


                            {{-- WAITING --}}
                            @elseif ($registration->payment_status === 'waiting_verification')

                                <a
                                    href="{{ route('payment.index', $registration) }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-orange-200 bg-orange-50 px-5 py-3 text-sm font-bold text-orange-700 transition hover:bg-orange-100"
                                >

                                    <i class="bi bi-clock-history"></i>

                                    Lihat Status Pembayaran

                                </a>


                            {{-- REJECTED --}}
                            @elseif ($registration->payment_status === 'rejected')

                                <a
                                    href="{{ route('payment.index', $registration) }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#2E3192] px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#252879]"
                                >

                                    <i class="bi bi-arrow-repeat"></i>

                                    Kirim Ulang Pembayaran

                                </a>


                            {{-- UNPAID --}}
                            @else

                                <a
                                    href="{{ route('payment.index', $registration) }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#2E3192] px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-[#252879]"
                                >

                                    <i class="bi bi-credit-card"></i>

                                    Lanjut Pembayaran

                                </a>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                {{-- =====================================================
                     EMPTY STATE
                ====================================================== --}}
                <div class="p-10 text-center sm:p-14">

                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                        <i class="bi bi-file-earmark-text text-2xl"></i>

                    </div>


                    <h3 class="mt-5 text-lg font-bold text-slate-800">
                        Belum Ada Pendaftaran
                    </h3>


                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">

                        Kamu belum memiliki pendaftaran program.
                        Silakan lihat program yang tersedia dan mulai
                        proses pendaftaran.

                    </p>


                    <a
                        href="{{ route('programs.index') }}"
                        class="mt-6 inline-flex items-center gap-2 rounded-xl bg-[#2E3192] px-6 py-3 font-bold text-white transition hover:-translate-y-1 hover:bg-[#252879]"
                    >

                        <i class="bi bi-mortarboard"></i>

                        Lihat Program

                    </a>

                </div>

            @endforelse

        </div>



        {{-- =====================================================
             LATEST REGISTRATION
        ====================================================== --}}
        @if ($latestRegistration)

            <div
                data-aos="fade-up"
                class="mt-8 overflow-hidden rounded-3xl border border-[#2E3192]/10 bg-gradient-to-r from-[#2E3192]/5 via-white to-[#F6D21A]/10 p-6 sm:p-8"
            >

                <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                    <div class="min-w-0">

                        <span class="text-xs font-bold uppercase tracking-wide text-[#2E3192]">
                            Pendaftaran Terbaru
                        </span>

                        <h2 class="mt-2 break-words text-xl font-extrabold text-slate-800 sm:text-2xl">

                            {{ $latestRegistration->program->name ?? '-' }}

                        </h2>

                        <p class="mt-2 text-sm leading-6 text-slate-500">

                            Kode:

                            <span class="font-bold text-slate-700">
                                {{ $latestRegistration->registration_code ?? '-' }}
                            </span>

                        </p>

                    </div>


                    <div class="flex shrink-0">

                        @if ($latestRegistration->payment_status === 'paid')

                            <span class="inline-flex items-center gap-2 rounded-xl bg-green-100 px-5 py-3 text-sm font-bold text-green-700">

                                <i class="bi bi-check-circle-fill"></i>

                                Pendaftaran Aktif

                            </span>

                        @elseif ($latestRegistration->payment_status === 'waiting_verification')

                            <span class="inline-flex items-center gap-2 rounded-xl bg-orange-100 px-5 py-3 text-sm font-bold text-orange-700">

                                <i class="bi bi-hourglass-split"></i>

                                Menunggu Verifikasi

                            </span>

                        @elseif ($latestRegistration->payment_status === 'rejected')

                            <a
                                href="{{ route('payment.index', $latestRegistration) }}"
                                class="inline-flex items-center gap-2 rounded-xl bg-[#2E3192] px-5 py-3 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-[#252879]"
                            >

                                <i class="bi bi-arrow-repeat"></i>

                                Perbaiki Pembayaran

                            </a>

                        @else

                            <a
                                href="{{ route('payment.index', $latestRegistration) }}"
                                class="inline-flex items-center gap-2 rounded-xl bg-[#2E3192] px-5 py-3 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-[#252879]"
                            >

                                <i class="bi bi-credit-card"></i>

                                Lanjut Pembayaran

                            </a>

                        @endif

                    </div>

                </div>

            </div>

        @endif

    </div>

</section>

@endsection