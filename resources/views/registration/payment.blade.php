@extends('layouts.landing')

@section('title', 'Pembayaran')

@section('content')

@if($errors->any())
    <div class="mx-auto mb-8 max-w-5xl px-4 sm:px-6">
        <div class="rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700 sm:p-5">
            <ul class="space-y-1 text-sm sm:text-base">
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<section
    x-data="{ paymentMethod: 'qris' }"
    class="relative overflow-hidden bg-gradient-to-b from-slate-50 via-white to-slate-100 py-16 sm:py-20 lg:py-24">

    {{-- Background --}}
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute -left-32 -top-40 h-72 w-72 rounded-full bg-blue-300/20 blur-3xl sm:h-96 sm:w-96"></div>
        <div class="absolute right-0 top-20 h-80 w-80 rounded-full bg-orange-300/20 blur-3xl sm:h-[450px] sm:w-[450px]"></div>
        <div class="absolute bottom-0 left-1/3 h-64 w-64 rounded-full bg-yellow-300/20 blur-3xl sm:h-80 sm:w-80"></div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- =========================================================
            HEADER
        ========================================================== --}}
        <div class="mx-auto max-w-3xl text-center">

            <span
                class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-xs font-semibold text-blue-700 sm:px-5 sm:text-sm">
                <i class="bi bi-wallet2"></i>
                Pembayaran Pendaftaran
            </span>

            <h1
                class="mt-5 text-3xl font-extrabold leading-tight text-slate-900 sm:mt-6 sm:text-4xl lg:text-5xl">
                Selesaikan Pembayaran
            </h1>

            <p
                class="mx-auto mt-4 max-w-2xl text-sm leading-6 text-slate-500 sm:mt-5 sm:text-base sm:leading-7 lg:text-lg lg:leading-8">
                Silakan lakukan pembayaran biaya pendaftaran sesuai metode
                yang dipilih. Setelah mengirim bukti pembayaran, admin akan
                melakukan verifikasi maksimal
                <span class="font-semibold text-blue-600">
                    1 × 24 Jam Kerja.
                </span>
            </p>

        </div>


        {{-- =========================================================
            MAIN CONTENT
        ========================================================== --}}
        <div class="mt-10 grid gap-8 lg:mt-16 lg:grid-cols-3 lg:gap-10">

            {{-- =====================================================
                INFORMASI PESERTA
            ====================================================== --}}
            <div class="lg:col-span-2">

                <div
                    class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl sm:rounded-[32px]">

                    {{-- Header --}}
                    <div
                        class="relative overflow-hidden bg-[#2E3192] px-5 py-6 text-white sm:px-8 sm:py-7">

                        <div class="flex items-center justify-between gap-4">

                            <div class="min-w-0">

                                <h2
                                    class="text-xl font-bold sm:text-2xl">
                                    Informasi Peserta
                                </h2>

                                <p
                                    class="mt-1 text-sm leading-5 text-blue-100 sm:text-base">
                                    Pastikan seluruh data sudah benar.
                                </p>

                            </div>

                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/20 sm:h-16 sm:w-16 sm:rounded-2xl">

                                <i
                                    class="bi bi-person-circle text-3xl text-white sm:text-4xl">
                                </i>

                            </div>

                        </div>

                    </div>


                    {{-- Body --}}
                    <div
                        class="grid gap-4 p-5 sm:gap-6 sm:p-8 md:grid-cols-2">

                        {{-- Nama --}}
                        <div class="rounded-2xl bg-slate-50 p-4 sm:p-5">

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Nama Lengkap
                            </p>

                            <h3
                                class="mt-1 break-words text-base font-bold text-slate-900 sm:mt-2 sm:text-lg">
                                {{ $registration->full_name }}
                            </h3>

                        </div>


                        {{-- Program --}}
                        <div class="rounded-2xl bg-slate-50 p-4 sm:p-5">

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Program
                            </p>

                            <h3
                                class="mt-1 break-words text-base font-bold text-slate-900 sm:mt-2 sm:text-lg">
                                {{ $registration->program->name }}
                            </h3>

                        </div>


                        {{-- Email --}}
                        <div class="rounded-2xl bg-slate-50 p-4 sm:p-5">

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Email
                            </p>

                            <h3
                                class="mt-1 break-all text-sm text-slate-900 sm:mt-2 sm:text-lg">
                                {{ $registration->email }}
                            </h3>

                        </div>


                        {{-- WhatsApp --}}
                        <div class="rounded-2xl bg-slate-50 p-4 sm:p-5">

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Nomor WhatsApp
                            </p>

                            <h3
                                class="mt-1 break-words text-sm text-slate-900 sm:mt-2 sm:text-lg">
                                {{ $registration->phone }}
                            </h3>

                        </div>


                        {{-- Pendidikan --}}
                        <div class="rounded-2xl bg-slate-50 p-4 sm:p-5">

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Pendidikan
                            </p>

                            <h3
                                class="mt-1 break-words text-sm text-slate-900 sm:mt-2 sm:text-lg">
                                {{ $registration->education }}
                            </h3>

                        </div>


                        {{-- Pekerjaan --}}
                        <div class="rounded-2xl bg-slate-50 p-4 sm:p-5">

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Pekerjaan
                            </p>

                            <h3
                                class="mt-1 break-words text-sm text-slate-900 sm:mt-2 sm:text-lg">
                                {{ $registration->job }}
                            </h3>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                RINGKASAN PEMBAYARAN
            ====================================================== --}}
            <div>

                <div
                    class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl lg:sticky lg:top-28 lg:rounded-[32px]">

                    {{-- Header --}}
                    <div
                        class="bg-[#2E3192] px-5 py-6 text-white sm:px-8 sm:py-7">

                        <h2 class="text-xl font-bold sm:text-2xl">
                            Ringkasan Pembayaran
                        </h2>

                        <p class="mt-1 text-sm text-blue-100 sm:text-base">
                            Biaya yang harus dibayarkan
                        </p>

                    </div>


                    {{-- Body --}}
                    <div class="space-y-5 p-5 sm:space-y-6 sm:p-8">

                        {{-- Registration Fee --}}
                        <div
                            class="flex items-start justify-between gap-4">

                            <span
                                class="text-sm text-slate-500 sm:text-base">
                                Biaya Pendaftaran
                            </span>

                            <span
                                class="shrink-0 text-right text-sm font-bold sm:text-base">
                                Rp
                                {{ number_format($registration->program->registration_fee, 0, ',', '.') }}
                            </span>

                        </div>


                        {{-- Admin --}}
                        <div
                            class="flex items-start justify-between gap-4">

                            <span
                                class="text-sm text-slate-500 sm:text-base">
                                Biaya Admin
                            </span>

                            <span
                                class="shrink-0 font-semibold text-green-600">
                                Gratis
                            </span>

                        </div>


                        <hr>


                        {{-- Total --}}
                        <div
                            class="flex items-center justify-between gap-4">

                            <span class="text-lg font-bold sm:text-xl">
                                Total
                            </span>

                            <span
                                class="shrink-0 text-xl font-extrabold text-blue-600 sm:text-2xl lg:text-3xl">
                                Rp
                                {{ number_format($registration->program->registration_fee, 0, ',', '.') }}
                            </span>

                        </div>


                        {{-- Benefits --}}
                        <div
                            class="rounded-2xl bg-gradient-to-r from-blue-50 to-orange-50 p-4 sm:p-5">

                            <h3
                                class="text-sm font-bold text-slate-800 sm:text-base">
                                Yang Anda Dapatkan
                            </h3>

                            <div class="mt-4 space-y-3">

                                <div
                                    class="flex items-start gap-3 text-sm sm:text-base">
                                    <i
                                        class="bi bi-check-circle-fill mt-0.5 shrink-0 text-green-500">
                                    </i>
                                    <span>Dashboard Peserta</span>
                                </div>

                                <div
                                    class="flex items-start gap-3 text-sm sm:text-base">
                                    <i
                                        class="bi bi-check-circle-fill mt-0.5 shrink-0 text-green-500">
                                    </i>
                                    <span>Verifikasi Dokumen</span>
                                </div>

                                <div
                                    class="flex items-start gap-3 text-sm sm:text-base">
                                    <i
                                        class="bi bi-check-circle-fill mt-0.5 shrink-0 text-green-500">
                                    </i>
                                    <span>Jadwal Diklat</span>
                                </div>

                                <div
                                    class="flex items-start gap-3 text-sm sm:text-base">
                                    <i
                                        class="bi bi-check-circle-fill mt-0.5 shrink-0 text-green-500">
                                    </i>
                                    <span>Pendampingan Hingga Berangkat</span>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
            FORM PEMBAYARAN
        ========================================================== --}}
        <form
            action="{{ route('payment.store', $registration->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf


            {{-- =====================================================
                PILIH METODE PEMBAYARAN
            ====================================================== --}}
            <div class="mt-12 sm:mt-16">

                <div class="mx-auto max-w-3xl text-center">

                    <h2
                        class="text-2xl font-extrabold text-slate-900 sm:text-3xl lg:text-4xl">
                        Pilih Metode Pembayaran
                    </h2>

                    <p
                        class="mt-2 text-sm leading-6 text-slate-500 sm:mt-3 sm:text-base">
                        Silakan pilih metode pembayaran yang paling nyaman.
                    </p>

                </div>


                <div
                    class="mt-7 grid gap-4 sm:mt-10 md:grid-cols-2 md:gap-6">

                    {{-- QRIS --}}
                    <label
                        @click="paymentMethod='qris'"
                        :class="paymentMethod == 'qris'
                            ? 'border-blue-600 ring-4 ring-blue-100'
                            : 'border-slate-200'"
                        class="cursor-pointer rounded-3xl border-2 bg-white p-5 transition-all hover:shadow-xl sm:p-7">

                        <input
                            type="radio"
                            name="payment_method"
                            value="qris"
                            x-model="paymentMethod"
                            class="hidden">

                        <div class="flex items-center gap-4 sm:gap-5">

                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-red-100 sm:h-16 sm:w-16">

                                <i
                                    class="bi bi-qr-code text-4xl text-red-500 sm:text-5xl">
                                </i>

                            </div>

                            <div class="min-w-0">

                                <h3 class="text-xl font-bold sm:text-2xl">
                                    QRIS
                                </h3>

                                <p
                                    class="mt-1 text-sm leading-5 text-slate-500 sm:mt-2 sm:text-base sm:leading-6">
                                    Scan menggunakan E-Wallet maupun
                                    Mobile Banking.
                                </p>

                            </div>

                        </div>

                    </label>


                    {{-- Transfer --}}
                    <label
                        @click="paymentMethod='transfer'"
                        :class="paymentMethod == 'transfer'
                            ? 'border-blue-600 ring-4 ring-blue-100'
                            : 'border-slate-200'"
                        class="cursor-pointer rounded-3xl border-2 bg-white p-5 transition-all hover:shadow-xl sm:p-7">

                        <input
                            type="radio"
                            name="payment_method"
                            value="transfer"
                            x-model="paymentMethod"
                            class="hidden">

                        <div class="flex items-center gap-4 sm:gap-5">

                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-blue-100 sm:h-16 sm:w-16">

                                <i
                                    class="bi bi-bank text-4xl text-blue-600 sm:text-5xl">
                                </i>

                            </div>

                            <div class="min-w-0">

                                <h3 class="text-xl font-bold sm:text-2xl">
                                    Transfer Bank
                                </h3>

                                <p
                                    class="mt-1 text-sm leading-5 text-slate-500 sm:mt-2 sm:text-base sm:leading-6">
                                    Transfer ke rekening resmi
                                    Bina Insani.
                                </p>

                            </div>

                        </div>

                    </label>

                </div>

            </div>


            {{-- =====================================================
                DETAIL PEMBAYARAN
            ====================================================== --}}
            <div class="mt-8 sm:mt-14">

                {{-- =================================================
                    QRIS
                ================================================== --}}
                <div
                    x-show="paymentMethod == 'qris'"
                    x-transition
                    class="rounded-3xl border border-slate-200 bg-white p-5 shadow-xl sm:rounded-[32px] sm:p-10">

                    <div class="text-center">

                        <div
                            class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-red-100 sm:h-20 sm:w-20">

                            <i
                                class="bi bi-qr-code text-4xl text-red-500 sm:text-5xl">
                            </i>

                        </div>

                        <h2
                            class="mt-5 text-2xl font-bold text-slate-900 sm:mt-6 sm:text-3xl">
                            Scan QRIS
                        </h2>

                        <p
                            class="mx-auto mt-2 max-w-xl text-sm leading-6 text-slate-500 sm:text-base">
                            Scan QR Code menggunakan aplikasi pembayaran
                            favorit Anda.
                        </p>

                    </div>


                    {{-- QRIS Image --}}
                    <div class="mt-8 flex justify-center sm:mt-10">

                        @if(setting('qris'))

                            <div
                                class="rounded-2xl border border-slate-200 bg-white p-3 shadow-lg sm:p-4">

                                <img
                                    src="{{ asset('storage/' . setting('qris')) }}"
                                    alt="QRIS Bina Insani"
                                    class="mx-auto w-56 max-w-full rounded-xl sm:w-72">

                            </div>

                        @else

                            <div
                                class="rounded-2xl bg-slate-100 px-6 py-10 text-center text-sm text-slate-500">
                                QRIS belum tersedia.
                            </div>

                        @endif

                    </div>


                    {{-- Payment Apps --}}
                    <div
                        class="mt-8 grid grid-cols-2 gap-3 sm:mt-10 sm:grid-cols-5 sm:gap-4">

                        <div
                            class="rounded-2xl border p-4 text-center sm:p-5">
                            <i
                                class="bi bi-wallet2 text-2xl text-cyan-500 sm:text-3xl">
                            </i>
                            <p class="mt-2 text-sm font-semibold sm:mt-3">
                                GoPay
                            </p>
                        </div>

                        <div
                            class="rounded-2xl border p-4 text-center sm:p-5">
                            <i
                                class="bi bi-wallet2 text-2xl text-blue-500 sm:text-3xl">
                            </i>
                            <p class="mt-2 text-sm font-semibold sm:mt-3">
                                DANA
                            </p>
                        </div>

                        <div
                            class="rounded-2xl border p-4 text-center sm:p-5">
                            <i
                                class="bi bi-wallet2 text-2xl text-orange-500 sm:text-3xl">
                            </i>
                            <p class="mt-2 text-sm font-semibold sm:mt-3">
                                OVO
                            </p>
                        </div>

                        <div
                            class="rounded-2xl border p-4 text-center sm:p-5">
                            <i
                                class="bi bi-phone text-2xl text-green-500 sm:text-3xl">
                            </i>
                            <p
                                class="mt-2 text-xs font-semibold sm:mt-3 sm:text-sm">
                                Mobile Banking
                            </p>
                        </div>

                        <div
                            class="col-span-2 rounded-2xl border p-4 text-center sm:col-span-1 sm:p-5">
                            <i
                                class="bi bi-credit-card text-2xl text-purple-500 sm:text-3xl">
                            </i>
                            <p class="mt-2 text-sm font-semibold sm:mt-3">
                                QRIS
                            </p>
                        </div>

                    </div>

                </div>


                {{-- =================================================
                    TRANSFER BANK
                ================================================== --}}
                <div
                    x-show="paymentMethod == 'transfer'"
                    x-transition
                    class="rounded-3xl border border-slate-200 bg-white p-5 shadow-xl sm:rounded-[32px] sm:p-10">

                    <div class="text-center">

                        <div
                            class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 sm:h-20 sm:w-20">

                            <i
                                class="bi bi-bank text-4xl text-blue-600 sm:text-5xl">
                            </i>

                        </div>

                        <h2
                            class="mt-5 text-2xl font-bold sm:mt-6 sm:text-3xl">
                            Transfer Bank
                        </h2>

                        <p
                            class="mt-2 text-sm text-slate-500 sm:text-base">
                            Transfer ke rekening resmi berikut.
                        </p>

                    </div>


                    <div
                        class="mx-auto mt-8 max-w-xl rounded-3xl bg-slate-50 p-5 sm:mt-10 sm:p-8">

                        {{-- Bank --}}
                        <div
                            class="flex items-start justify-between gap-5">

                            <span class="text-sm text-slate-500 sm:text-base">
                                Bank
                            </span>

                            <span class="text-right font-bold">
                                BCA
                            </span>

                        </div>


                        <hr class="my-5">


                        {{-- Rekening --}}
                        <div class="space-y-2">

                            <span
                                class="block text-sm text-slate-500 sm:text-base">
                                No Rekening
                            </span>

                            <div
                                class="flex flex-wrap items-center justify-between gap-3">

                                <span
                                    id="rekening"
                                    class="break-all text-lg font-bold text-slate-900 sm:text-xl">
                                    {{ setting('bank_account') }}
                                </span>

                            </div>

                        </div>


                        <hr class="my-5">


                        {{-- Owner --}}
                        <div
                            class="flex items-start justify-between gap-5">

                            <span class="text-sm text-slate-500 sm:text-base">
                                Atas Nama
                            </span>

                            <span
                                class="max-w-[60%] text-right text-sm font-bold leading-5 sm:text-base">
                                Bina Insani Training Center
                            </span>

                        </div>


                        <button
                            type="button"
                            onclick="copyRekening()"
                            class="mt-7 flex w-full items-center justify-center gap-2 rounded-2xl bg-blue-600 py-3.5 text-sm font-bold text-white transition hover:bg-blue-700 sm:mt-8 sm:text-base">

                            <i class="bi bi-copy"></i>

                            Salin Nomor Rekening

                        </button>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                UPLOAD BUKTI
            ====================================================== --}}
            <div
                class="mt-8 rounded-3xl border border-slate-200 bg-white p-5 shadow-xl sm:mt-14 sm:rounded-[32px] sm:p-10">

                <div class="text-center">

                    <div
                        class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-100 sm:h-20 sm:w-20">

                        <i
                            class="bi bi-cloud-arrow-up text-4xl text-green-600 sm:text-5xl">
                        </i>

                    </div>

                    <h2
                        class="mt-5 text-2xl font-bold sm:mt-6 sm:text-3xl">
                        Upload Bukti Pembayaran
                    </h2>

                    <p
                        class="mt-2 text-sm leading-6 text-slate-500 sm:text-base">
                        Upload screenshot atau foto bukti transfer.
                    </p>

                </div>


                <div class="mx-auto mt-7 max-w-2xl sm:mt-10">

                    <label
                        for="payment_proof"
                        class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-blue-300 bg-blue-50/50 p-6 text-center transition hover:bg-blue-50 sm:p-8">

                        <i
                            class="bi bi-image text-3xl text-blue-500 sm:text-4xl">
                        </i>

                        <span
                            class="mt-3 text-sm font-semibold text-slate-700 sm:text-base">
                            Pilih bukti pembayaran
                        </span>

                        <span
                            class="mt-1 text-xs text-slate-500 sm:text-sm">
                            JPG, JPEG, atau PNG
                        </span>

                        <input
                            id="payment_proof"
                            type="file"
                            name="payment_proof"
                            accept=".jpg,.jpeg,.png"
                            onchange="previewPayment(event)"
                            class="sr-only">

                    </label>


                    @error('payment_proof')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror


                    <div class="mt-6 flex justify-center sm:mt-8">

                        <img
                            id="preview"
                            alt="Preview bukti pembayaran"
                            class="hidden max-h-80 max-w-full rounded-2xl object-contain shadow-xl sm:max-h-96">

                    </div>

                </div>

            </div>


            {{-- =====================================================
                TIMELINE
            ====================================================== --}}
            <div
                class="mt-8 rounded-3xl border border-slate-200 bg-white p-5 shadow-xl sm:mt-14 sm:rounded-[32px] sm:p-10">

                <h2
                    class="text-2xl font-bold text-slate-900 sm:text-3xl">
                    Alur Verifikasi Pembayaran
                </h2>

                <div
                    class="mt-8 grid gap-7 sm:mt-10 sm:gap-8 md:grid-cols-4">

                    {{-- Step 1 --}}
                    <div class="text-center">

                        <div
                            class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-blue-100 sm:h-16 sm:w-16">

                            <i
                                class="bi bi-credit-card text-2xl text-blue-600 sm:text-3xl">
                            </i>

                        </div>

                        <h3
                            class="mt-4 text-sm font-bold sm:mt-5 sm:text-base">
                            1. Lakukan Pembayaran
                        </h3>

                        <p
                            class="mt-2 text-xs leading-5 text-slate-500 sm:text-sm">
                            Bayar melalui QRIS atau Transfer Bank.
                        </p>

                    </div>


                    {{-- Step 2 --}}
                    <div class="text-center">

                        <div
                            class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-orange-100 sm:h-16 sm:w-16">

                            <i
                                class="bi bi-cloud-arrow-up text-2xl text-orange-500 sm:text-3xl">
                            </i>

                        </div>

                        <h3
                            class="mt-4 text-sm font-bold sm:mt-5 sm:text-base">
                            2. Upload Bukti
                        </h3>

                        <p
                            class="mt-2 text-xs leading-5 text-slate-500 sm:text-sm">
                            Upload bukti pembayaran yang jelas.
                        </p>

                    </div>


                    {{-- Step 3 --}}
                    <div class="text-center">

                        <div
                            class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-yellow-100 sm:h-16 sm:w-16">

                            <i
                                class="bi bi-search text-2xl text-yellow-500 sm:text-3xl">
                            </i>

                        </div>

                        <h3
                            class="mt-4 text-sm font-bold sm:mt-5 sm:text-base">
                            3. Verifikasi Admin
                        </h3>

                        <p
                            class="mt-2 text-xs leading-5 text-slate-500 sm:text-sm">
                            Admin memverifikasi maksimal 1×24 jam kerja.
                        </p>

                    </div>


                    {{-- Step 4 --}}
                    <div class="text-center">

                        <div
                            class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-green-100 sm:h-16 sm:w-16">

                            <i
                                class="bi bi-check-circle text-2xl text-green-600 sm:text-3xl">
                            </i>

                        </div>

                        <h3
                            class="mt-4 text-sm font-bold sm:mt-5 sm:text-base">
                            4. Pembayaran Berhasil
                        </h3>

                        <p
                            class="mt-2 text-xs leading-5 text-slate-500 sm:text-sm">
                            Status pembayaran berubah menjadi Lunas.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                INFORMASI PENTING
            ====================================================== --}}
            <div
                class="mt-8 rounded-3xl border border-blue-200 bg-blue-50 p-5 sm:mt-10 sm:p-8">

                <div class="flex items-start gap-4">

                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-600 text-white sm:h-14 sm:w-14 sm:rounded-2xl">

                        <i
                            class="bi bi-info-circle text-xl sm:text-2xl">
                        </i>

                    </div>

                    <div class="min-w-0">

                        <h3
                            class="text-lg font-bold text-slate-900 sm:text-xl">
                            Informasi Penting
                        </h3>

                        <ul
                            class="mt-3 space-y-2 text-sm leading-6 text-slate-600 sm:mt-4 sm:text-base">

                            <li>
                                • Pastikan nominal transfer sesuai dengan
                                biaya pendaftaran.
                            </li>

                            <li>
                                • Bukti pembayaran harus terlihat jelas.
                            </li>

                            <li>
                                • Admin akan melakukan verifikasi maksimal
                                1×24 jam kerja.
                            </li>

                            <li>
                                • Setelah diverifikasi, Anda akan dihubungi
                                melalui WhatsApp.
                            </li>

                        </ul>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                SUBMIT
            ====================================================== --}}
            <div class="mt-8 sm:mt-12">

                <button
                    type="submit"
                    class="group flex w-full items-center justify-center gap-3 rounded-2xl bg-[#2E3192] px-6 py-4 text-sm font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900 sm:mx-auto sm:w-auto sm:px-8 sm:text-base">

                    <i class="bi bi-check-circle-fill"></i>

                    Kirim Bukti Pembayaran

                    <i
                        class="bi bi-arrow-right transition group-hover:translate-x-1">
                    </i>

                </button>

            </div>

        </form>

    </div>

</section>


{{-- =============================================================
    JAVASCRIPT
============================================================= --}}
<script>

function previewPayment(event) {

    const preview = document.getElementById('preview');
    const file = event.target.files[0];

    if (!file) {
        preview.src = '';
        preview.classList.add('hidden');
        return;
    }

    preview.src = URL.createObjectURL(file);
    preview.classList.remove('hidden');
}


function copyRekening() {

    const rekeningElement = document.getElementById('rekening');

    if (!rekeningElement) {
        return;
    }

    const rekening = rekeningElement.innerText.trim();

    navigator.clipboard.writeText(rekening)
        .then(() => {
            alert('Nomor rekening berhasil disalin.');
        })
        .catch(() => {
            alert('Gagal menyalin nomor rekening.');
        });

}

</script>

@endsection