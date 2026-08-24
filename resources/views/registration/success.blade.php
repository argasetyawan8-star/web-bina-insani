@extends('layouts.landing')

@section('title', 'Pembayaran Berhasil')

@section('content')

<section
    class="relative min-h-screen overflow-hidden bg-gradient-to-b from-slate-50 via-white to-slate-100 py-16 sm:py-20 lg:py-32">

    {{-- =========================
        BACKGROUND DECORATION
    ========================== --}}
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
        <div
            class="absolute -left-32 -top-32 h-72 w-72 rounded-full bg-blue-300/20 blur-3xl sm:h-96 sm:w-96">
        </div>

        <div
            class="absolute -right-32 top-40 h-80 w-80 rounded-full bg-orange-300/20 blur-3xl sm:h-[450px] sm:w-[450px]">
        </div>

        <div
            class="absolute bottom-0 left-1/3 h-64 w-64 rounded-full bg-yellow-300/20 blur-3xl sm:h-80 sm:w-80">
        </div>
    </div>


    {{-- =========================
        MAIN CONTAINER
    ========================== --}}
    <div class="mx-auto max-w-5xl px-4 sm:px-6">

        <div
            class="rounded-[28px] border border-white bg-white/95 p-5 shadow-2xl backdrop-blur-xl sm:rounded-[36px] sm:p-8 md:p-10 lg:rounded-[40px] lg:p-16">


            {{-- =========================
                SUCCESS ICON
            ========================== --}}
            <div class="flex justify-center">
                <div
                    class="flex h-20 w-20 items-center justify-center rounded-full bg-blue-100 sm:h-24 sm:w-24 lg:h-28 lg:w-28">

                    <i
                        class="bi bi-cloud-check-fill text-5xl text-blue-600 sm:text-6xl lg:text-7xl">
                    </i>

                </div>
            </div>


            {{-- =========================
                TITLE
            ========================== --}}
            <h1
                class="mt-7 text-center text-3xl font-extrabold leading-tight text-slate-900 sm:mt-9 sm:text-4xl lg:text-5xl">

                Bukti Pembayaran
                <span class="block text-[#2E3192]">
                    Berhasil Dikirim
                </span>

            </h1>


            {{-- DESCRIPTION --}}
            <p
                class="mx-auto mt-5 max-w-3xl text-center text-sm leading-7 text-slate-500 sm:text-base sm:leading-8 lg:text-lg">

                Terima kasih telah melakukan pembayaran.
                Bukti pembayaran Anda telah berhasil diterima.
                Tim Bina Insani akan melakukan verifikasi terlebih dahulu.

            </p>


            {{-- =========================
                INFORMASI PESERTA
            ========================== --}}
            <div class="mt-8 grid gap-4 sm:mt-10 sm:gap-5 md:grid-cols-2 lg:mt-12">

                {{-- Nama --}}
                <div
                    class="rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:rounded-3xl sm:p-6">

                    <p class="text-sm text-slate-500">
                        Nama Peserta
                    </p>

                    <h3
                        class="mt-2 break-words text-base font-bold leading-6 text-slate-800 sm:text-lg">

                        {{ $registration->full_name }}

                    </h3>

                </div>


                {{-- Program --}}
                <div
                    class="rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:rounded-3xl sm:p-6">

                    <p class="text-sm text-slate-500">
                        Program
                    </p>

                    <h3
                        class="mt-2 break-words text-base font-bold leading-6 text-slate-800 sm:text-lg">

                        {{ $registration->program->name }}

                    </h3>

                </div>


                {{-- Kode Pendaftaran --}}
                <div
                    class="rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:rounded-3xl sm:p-6">

                    <p class="text-sm text-slate-500">
                        Kode Pendaftaran
                    </p>

                    <h3
                        class="mt-2 break-all text-base font-bold leading-6 text-blue-600 sm:text-lg">

                        {{ $registration->registration_code }}

                    </h3>

                </div>


                {{-- Status --}}
                <div
                    class="rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:rounded-3xl sm:p-6">

                    <p class="text-sm text-slate-500">
                        Status Pembayaran
                    </p>

                    <div class="mt-3">

                        <span
                            class="inline-flex max-w-full items-center gap-2 rounded-full bg-orange-100 px-4 py-2 text-xs font-semibold text-orange-700 sm:px-5 sm:text-sm">

                            <i class="bi bi-clock-history"></i>

                            <span>
                                Menunggu Verifikasi
                            </span>

                        </span>

                    </div>

                </div>

            </div>


            {{-- =========================
                PROGRESS
            ========================== --}}
            <div
                class="mt-8 rounded-2xl bg-gradient-to-br from-blue-50 via-white to-orange-50 p-5 sm:mt-10 sm:rounded-3xl sm:p-7 lg:mt-12 lg:p-8">

                <h2
                    class="text-xl font-bold text-slate-900 sm:text-2xl">

                    Status Proses Pendaftaran

                </h2>


                <div class="mt-7 space-y-6 sm:mt-8 sm:space-y-7">


                    {{-- STEP 1 --}}
                    <div class="flex items-start gap-4">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-green-100">

                            <i class="bi bi-check-lg text-xl text-green-600"></i>

                        </div>

                        <div class="min-w-0">

                            <h3 class="font-semibold text-slate-800">
                                Data Pendaftaran
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                Biodata peserta berhasil disimpan.
                            </p>

                        </div>

                    </div>


                    {{-- STEP 2 --}}
                    <div class="flex items-start gap-4">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-green-100">

                            <i class="bi bi-check-lg text-xl text-green-600"></i>

                        </div>

                        <div class="min-w-0">

                            <h3 class="font-semibold text-slate-800">
                                Dokumen Peserta
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                Dokumen berhasil diupload.
                            </p>

                        </div>

                    </div>


                    {{-- STEP 3 --}}
                    <div class="flex items-start gap-4">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-green-100">

                            <i class="bi bi-check-lg text-xl text-green-600"></i>

                        </div>

                        <div class="min-w-0">

                            <h3 class="font-semibold text-slate-800">
                                Bukti Pembayaran
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                Bukti pembayaran berhasil dikirim.
                            </p>

                        </div>

                    </div>


                    {{-- STEP 4 --}}
                    <div class="flex items-start gap-4">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-orange-100">

                            <i class="bi bi-hourglass-split text-xl text-orange-600"></i>

                        </div>

                        <div class="min-w-0">

                            <h3 class="font-semibold text-slate-800">
                                Verifikasi Admin
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                Menunggu pengecekan pembayaran oleh admin.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================
                INFORMASI PENTING
            ========================== --}}
            <div
                class="mt-6 rounded-2xl border border-blue-200 bg-blue-50 p-5 sm:mt-8 sm:rounded-3xl sm:p-7 lg:p-8">

                <div class="flex items-start gap-4">

                    {{-- ICON --}}
                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-600 text-white sm:h-14 sm:w-14 sm:rounded-2xl">

                        <i class="bi bi-info-circle text-xl sm:text-2xl"></i>

                    </div>


                    {{-- CONTENT --}}
                    <div class="min-w-0">

                        <h3
                            class="text-lg font-bold text-slate-900 sm:text-xl">

                            Informasi Penting

                        </h3>


                        <ul
                            class="mt-3 space-y-3 text-sm leading-6 text-slate-600 sm:mt-4 sm:text-base">

                            <li class="flex items-start gap-2">

                                <span class="mt-1 text-blue-600">
                                    •
                                </span>

                                <span>
                                    Admin melakukan verifikasi maksimal 1×24 jam kerja.
                                </span>

                            </li>


                            <li class="flex items-start gap-2">

                                <span class="mt-1 text-blue-600">
                                    •
                                </span>

                                <span>
                                    Pastikan nomor WhatsApp aktif untuk menerima informasi.
                                </span>

                            </li>


                            <li class="flex items-start gap-2">

                                <span class="mt-1 text-blue-600">
                                    •
                                </span>

                                <span>
                                    Setelah pembayaran diverifikasi, peserta akan mendapatkan informasi berikutnya dari CS Bina Insani melalui WhatsApp.
                                </span>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>


            {{-- =========================
                BUTTON
            ========================== --}}
            <div
                class="mt-8 flex flex-col gap-3 sm:mt-10 sm:flex-row sm:justify-center sm:gap-4">


                {{-- HOME --}}
                <a
                    href="{{ url('/') }}"
                    class="group flex w-full items-center justify-center gap-2 rounded-2xl bg-[#2E3192] px-6 py-4 text-sm font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900 sm:w-auto sm:px-8 sm:text-base">

                    <i class="bi bi-house-fill"></i>

                    <span>
                        Kembali ke Beranda
                    </span>

                </a>


                {{-- WHATSAPP --}}
                <a
                    href="https://wa.me/6285292902900"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="flex w-full items-center justify-center gap-2 rounded-2xl border border-slate-300 bg-white px-6 py-4 text-sm font-semibold text-slate-700 transition hover:bg-slate-100 sm:w-auto sm:px-8 sm:text-base">

                    <i class="bi bi-whatsapp text-lg text-green-500"></i>

                    <span>
                        Hubungi Admin
                    </span>

                </a>


            </div>


            {{-- SMALL FOOTER MESSAGE --}}
            <div class="mt-8 text-center sm:mt-10">

                <p class="text-xs leading-5 text-slate-400 sm:text-sm">

                    Terima kasih telah mempercayakan proses pendaftaran
                    kepada Bina Insani Training Center.

                </p>

            </div>


        </div>

    </div>

</section>

@endsection