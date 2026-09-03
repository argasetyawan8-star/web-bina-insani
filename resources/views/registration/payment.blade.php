@extends('layouts.landing')

@section('title', 'Pembayaran Pendaftaran')

@section('content')


{{-- =========================================================
     VALIDATION ERRORS
========================================================== --}}
@if ($errors->any())
    <div class="mx-auto mb-8 max-w-5xl px-4 sm:px-6">
        <div class="rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700 sm:p-5">
            <div class="flex items-start gap-3">
                <i class="bi bi-exclamation-circle-fill mt-0.5 text-red-500"></i>

                <div class="min-w-0">
                    <h3 class="font-bold">
                        Pembayaran belum dapat dikirim
                    </h3>

                    <ul class="mt-2 space-y-1 text-sm sm:text-base">
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif


{{-- =========================================================
     SUCCESS MESSAGE
========================================================== --}}
@if (session('success'))
    <div class="mx-auto mb-8 max-w-5xl px-4 sm:px-6">
        <div class="rounded-2xl border border-green-200 bg-green-50 p-4 text-green-700 sm:p-5">
            <div class="flex items-start gap-3">
                <i class="bi bi-check-circle-fill mt-0.5 text-green-600"></i>

                <p class="text-sm leading-6 sm:text-base">
                    {{ session('success') }}
                </p>
            </div>
        </div>
    </div>
@endif


{{-- =========================================================
     PAYMENT PAGE
========================================================== --}}
<section
    x-data="{
        paymentMethod: 'qris',
        submitting: false
    }"
    class="relative overflow-hidden bg-gradient-to-b from-slate-50 via-white to-slate-100 py-16 sm:py-20 lg:py-24"
>

    {{-- =====================================================
         BACKGROUND
    ====================================================== --}}
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">

        <div
            class="absolute -left-32 -top-40 h-72 w-72 rounded-full bg-blue-300/20 blur-3xl sm:h-96 sm:w-96"
        ></div>

        <div
            class="absolute right-0 top-20 h-80 w-80 rounded-full bg-orange-300/20 blur-3xl sm:h-[450px] sm:w-[450px]"
        ></div>

        <div
            class="absolute bottom-0 left-1/3 h-64 w-64 rounded-full bg-yellow-300/20 blur-3xl sm:h-80 sm:w-80"
        ></div>

    </div>


    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <div class="mx-auto max-w-3xl text-center">

            <span
                class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-xs font-semibold text-blue-700 sm:px-5 sm:text-sm"
            >
                <i class="bi bi-wallet2"></i>
                Pembayaran Pendaftaran
            </span>

            <h1
                class="mt-5 text-3xl font-extrabold leading-tight text-slate-900 sm:mt-6 sm:text-4xl lg:text-5xl"
            >
                Selesaikan Pembayaran
            </h1>

            <p
                class="mx-auto mt-4 max-w-2xl text-sm leading-6 text-slate-500 sm:mt-5 sm:text-base sm:leading-7 lg:text-lg lg:leading-8"
            >
                Silakan lakukan pembayaran biaya pendaftaran sesuai metode
                yang dipilih, kemudian upload bukti pembayaran untuk
                diverifikasi oleh admin.
            </p>

        </div>


        {{-- =====================================================
             REGISTRATION STATUS
        ====================================================== --}}
        <div class="mx-auto mt-8 max-w-5xl">

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div class="flex min-w-0 items-center gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]"
                        >
                            <i class="bi bi-receipt text-xl"></i>
                        </div>

                        <div class="min-w-0">

                            <p class="text-xs text-slate-500">
                                Kode Pendaftaran
                            </p>

                            <p
                                class="mt-1 break-all text-base font-extrabold text-slate-800 sm:text-lg"
                            >
                                {{ $registration->registration_code ?? '-' }}
                            </p>

                        </div>

                    </div>


                    {{-- STATUS --}}
                    <div>

                        @if ($registration->payment_status === 'paid')

                            <span
                                class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-sm font-bold text-green-700"
                            >
                                <i class="bi bi-check-circle-fill"></i>
                                Lunas
                            </span>

                        @elseif ($registration->payment_status === 'waiting_verification')

                            <span
                                class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-4 py-2 text-sm font-bold text-orange-700"
                            >
                                <i class="bi bi-hourglass-split"></i>
                                Menunggu Verifikasi
                            </span>

                        @elseif ($registration->payment_status === 'rejected')

                            <span
                                class="inline-flex items-center gap-2 rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-700"
                            >
                                <i class="bi bi-x-circle-fill"></i>
                                Pembayaran Ditolak
                            </span>

                        @else

                            <span
                                class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-sm font-bold text-slate-600"
                            >
                                <i class="bi bi-clock"></i>
                                Belum Dibayar
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             MAIN CONTENT
        ====================================================== --}}
        <div class="mt-10 grid gap-8 lg:mt-16 lg:grid-cols-3 lg:gap-10">

            {{-- =================================================
                 INFORMASI PESERTA
            ================================================== --}}
            <div class="lg:col-span-2">

                <div
                    class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl sm:rounded-[32px]"
                >

                    {{-- HEADER --}}
                    <div
                        class="relative overflow-hidden bg-[#2E3192] px-5 py-6 text-white sm:px-8 sm:py-7"
                    >

                        <div class="flex items-center justify-between gap-4">

                            <div class="min-w-0">

                                <h2 class="text-xl font-bold sm:text-2xl">
                                    Informasi Peserta
                                </h2>

                                <p class="mt-1 text-sm leading-5 text-blue-100 sm:text-base">
                                    Data pendaftaran yang terhubung dengan akun Anda.
                                </p>

                            </div>

                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/20 sm:h-16 sm:w-16 sm:rounded-2xl"
                            >
                                <i class="bi bi-person-circle text-3xl text-white sm:text-4xl"></i>
                            </div>

                        </div>

                    </div>


                    {{-- BODY --}}
                    <div class="grid gap-4 p-5 sm:gap-6 sm:p-8 md:grid-cols-2">

                        {{-- NAMA --}}
                        <div class="rounded-2xl bg-slate-50 p-4 sm:p-5">

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Nama Lengkap
                            </p>

                            <h3
                                class="mt-1 break-words text-base font-bold text-slate-900 sm:mt-2 sm:text-lg"
                            >
                                {{ $registration->full_name ?? '-' }}
                            </h3>

                        </div>


                        {{-- PROGRAM --}}
                        <div class="rounded-2xl bg-slate-50 p-4 sm:p-5">

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Program
                            </p>

                            <h3
                                class="mt-1 break-words text-base font-bold text-slate-900 sm:mt-2 sm:text-lg"
                            >
                                {{ $registration->program->name ?? '-' }}
                            </h3>

                        </div>


                        {{-- EMAIL --}}
                        <div class="rounded-2xl bg-slate-50 p-4 sm:p-5">

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Email
                            </p>

                            <h3
                                class="mt-1 break-all text-sm text-slate-900 sm:mt-2 sm:text-lg"
                            >
                                {{ $registration->email ?? '-' }}
                            </h3>

                        </div>


                        {{-- WHATSAPP --}}
                        <div class="rounded-2xl bg-slate-50 p-4 sm:p-5">

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Nomor WhatsApp
                            </p>

                            <h3
                                class="mt-1 break-words text-sm text-slate-900 sm:mt-2 sm:text-lg"
                            >
                                {{ $registration->phone ?? '-' }}
                            </h3>

                        </div>


                        {{-- PENDIDIKAN --}}
                        <div class="rounded-2xl bg-slate-50 p-4 sm:p-5">

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Pendidikan
                            </p>

                            <h3
                                class="mt-1 break-words text-sm text-slate-900 sm:mt-2 sm:text-lg"
                            >
                                {{ $registration->education ?? '-' }}
                            </h3>

                        </div>


                        {{-- PEKERJAAN --}}
                        <div class="rounded-2xl bg-slate-50 p-4 sm:p-5">

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Pekerjaan
                            </p>

                            <h3
                                class="mt-1 break-words text-sm text-slate-900 sm:mt-2 sm:text-lg"
                            >
                                {{ $registration->job ?? '-' }}
                            </h3>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 RINGKASAN PEMBAYARAN
            ================================================== --}}
            <div>

                <div
                    class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl lg:sticky lg:top-28 lg:rounded-[32px]"
                >

                    {{-- HEADER --}}
                    <div class="bg-[#2E3192] px-5 py-6 text-white sm:px-8 sm:py-7">

                        <h2 class="text-xl font-bold sm:text-2xl">
                            Ringkasan Pembayaran
                        </h2>

                        <p class="mt-1 text-sm text-blue-100 sm:text-base">
                            Biaya yang harus dibayarkan
                        </p>

                    </div>


                    {{-- BODY --}}
                    <div class="space-y-5 p-5 sm:space-y-6 sm:p-8">

                        {{-- REGISTRATION FEE --}}
                        <div class="flex items-start justify-between gap-4">

                            <span class="text-sm text-slate-500 sm:text-base">
                                Biaya Pendaftaran
                            </span>

                            <span class="shrink-0 text-right text-sm font-bold sm:text-base">
                                Rp
                                {{ number_format(
                                    $registration->program->registration_fee ?? 0,
                                    0,
                                    ',',
                                    '.'
                                ) }}
                            </span>

                        </div>


                        {{-- ADMIN --}}
                        <div class="flex items-start justify-between gap-4">

                            <span class="text-sm text-slate-500 sm:text-base">
                                Biaya Admin
                            </span>

                            <span class="shrink-0 font-semibold text-green-600">
                                Gratis
                            </span>

                        </div>


                        <hr>


                        {{-- TOTAL --}}
                        <div class="flex items-center justify-between gap-4">

                            <span class="text-lg font-bold sm:text-xl">
                                Total
                            </span>

                            <span
                                class="shrink-0 text-xl font-extrabold text-blue-600 sm:text-2xl lg:text-3xl"
                            >
                                Rp
                                {{ number_format(
                                    $registration->program->registration_fee ?? 0,
                                    0,
                                    ',',
                                    '.'
                                ) }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             PAYMENT FORM
        ====================================================== --}}
        @if ($registration->payment_status !== 'paid')

            @if ($registration->payment_status !== 'waiting_verification')

                <form
                    action="{{ route('payment.store', $registration) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="mt-12 sm:mt-16"
                    @submit="
                        if (submitting) {
                            $event.preventDefault();
                            return;
                        }

                        if (!$event.target.payment_proof.files.length) {
                            $event.preventDefault();
                            alert('Silakan upload bukti pembayaran terlebih dahulu.');
                            return;
                        }

                        submitting = true;
                    "
                >

                    @csrf


                    {{-- =================================================
                         PAYMENT METHOD
                    ================================================== --}}
                    <div>

                        <div class="mx-auto max-w-3xl text-center">

                            <h2
                                class="text-2xl font-extrabold text-slate-900 sm:text-3xl lg:text-4xl"
                            >
                                Pilih Metode Pembayaran
                            </h2>

                            <p
                                class="mt-2 text-sm leading-6 text-slate-500 sm:mt-3 sm:text-base"
                            >
                                Silakan pilih metode pembayaran yang paling nyaman.
                            </p>

                        </div>


                        <div class="mt-7 grid gap-4 sm:mt-10 md:grid-cols-2 md:gap-6">

                            {{-- QRIS --}}
                            <label
                                @click="paymentMethod = 'qris'"
                                :class="
                                    paymentMethod === 'qris'
                                        ? 'border-blue-600 ring-4 ring-blue-100'
                                        : 'border-slate-200'
                                "
                                class="cursor-pointer rounded-3xl border-2 bg-white p-5 transition-all hover:shadow-xl sm:p-7"
                            >

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="qris"
                                    x-model="paymentMethod"
                                    class="hidden"
                                >

                                <div class="flex items-center gap-4 sm:gap-5">

                                    <div
                                        class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-red-100 sm:h-16 sm:w-16"
                                    >
                                        <i class="bi bi-qr-code text-4xl text-red-500 sm:text-5xl"></i>
                                    </div>

                                    <div class="min-w-0">

                                        <h3 class="text-xl font-bold sm:text-2xl">
                                            QRIS
                                        </h3>

                                        <p
                                            class="mt-1 text-sm leading-5 text-slate-500 sm:mt-2 sm:text-base sm:leading-6"
                                        >
                                            Scan menggunakan E-Wallet maupun Mobile Banking.
                                        </p>

                                    </div>

                                </div>

                            </label>


                            {{-- TRANSFER --}}
                            <label
                                @click="paymentMethod = 'transfer'"
                                :class="
                                    paymentMethod === 'transfer'
                                        ? 'border-blue-600 ring-4 ring-blue-100'
                                        : 'border-slate-200'
                                "
                                class="cursor-pointer rounded-3xl border-2 bg-white p-5 transition-all hover:shadow-xl sm:p-7"
                            >

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="transfer"
                                    x-model="paymentMethod"
                                    class="hidden"
                                >

                                <div class="flex items-center gap-4 sm:gap-5">

                                    <div
                                        class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-blue-100 sm:h-16 sm:w-16"
                                    >
                                        <i class="bi bi-bank text-4xl text-blue-600 sm:text-5xl"></i>
                                    </div>

                                    <div class="min-w-0">

                                        <h3 class="text-xl font-bold sm:text-2xl">
                                            Transfer Bank
                                        </h3>

                                        <p
                                            class="mt-1 text-sm leading-5 text-slate-500 sm:mt-2 sm:text-base sm:leading-6"
                                        >
                                            Transfer ke rekening resmi Bina Insani.
                                        </p>

                                    </div>

                                </div>

                            </label>

                        </div>

                    </div>


                    {{-- =================================================
                         PAYMENT DETAIL
                    ================================================== --}}
                    <div class="mt-8 sm:mt-14">

                        {{-- QRIS --}}
                        <div
                            x-show="paymentMethod === 'qris'"
                            x-transition
                            class="rounded-3xl border border-slate-200 bg-white p-5 shadow-xl sm:rounded-[32px] sm:p-10"
                        >

                            <div class="text-center">

                                <div
                                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-red-100 sm:h-20 sm:w-20"
                                >
                                    <i class="bi bi-qr-code text-4xl text-red-500 sm:text-5xl"></i>
                                </div>

                                <h2
                                    class="mt-5 text-2xl font-bold text-slate-900 sm:mt-6 sm:text-3xl"
                                >
                                    Scan QRIS
                                </h2>

                                <p
                                    class="mx-auto mt-2 max-w-xl text-sm leading-6 text-slate-500 sm:text-base"
                                >
                                    Scan QR Code menggunakan aplikasi pembayaran favorit Anda.
                                </p>

                            </div>


                            {{-- QRIS IMAGE --}}
                            @php
                                $qris = setting('qris');

                                $qrisUrl = $qris
                                    ? (
                                        str_starts_with(
                                            $qris,
                                            'https://res.cloudinary.com/'
                                        )
                                            ? $qris
                                            : asset('images/' . $qris)
                                    )
                                    : null;
                            @endphp

                            <div class="mt-8 flex justify-center sm:mt-10">

                                @if ($qrisUrl)

                                    <div
                                        class="rounded-2xl border border-slate-200 bg-white p-3 shadow-lg sm:p-4"
                                    >

                                        <img
                                            src="{{ $qrisUrl }}"
                                            alt="QRIS Bina Insani"
                                            class="mx-auto w-56 max-w-full rounded-xl object-contain sm:w-72"
                                        >

                                    </div>

                                @else

                                    <div
                                        class="rounded-2xl bg-slate-100 px-6 py-10 text-center text-sm text-slate-500"
                                    >
                                        QRIS belum tersedia.
                                    </div>

                                @endif

                            </div>

                        </div>


                        {{-- TRANSFER --}}
                        <div
                            x-show="paymentMethod === 'transfer'"
                            x-transition
                            class="rounded-3xl border border-slate-200 bg-white p-5 shadow-xl sm:rounded-[32px] sm:p-10"
                        >

                            <div class="text-center">

                                <div
                                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 sm:h-20 sm:w-20"
                                >
                                    <i class="bi bi-bank text-4xl text-blue-600 sm:text-5xl"></i>
                                </div>

                                <h2 class="mt-5 text-2xl font-bold sm:mt-6 sm:text-3xl">
                                    Transfer Bank
                                </h2>

                                <p class="mt-2 text-sm text-slate-500 sm:text-base">
                                    Transfer ke rekening resmi berikut.
                                </p>

                            </div>


                            <div
                                class="mx-auto mt-8 max-w-xl rounded-3xl bg-slate-50 p-5 sm:mt-10 sm:p-8"
                            >

                                {{-- BANK --}}
                                <div class="flex items-start justify-between gap-5">

                                    <span class="text-sm text-slate-500 sm:text-base">
                                        Bank
                                    </span>

                                    <span class="text-right font-bold">
                                        {{ setting('bank_name', 'BCA') }}
                                    </span>

                                </div>


                                <hr class="my-5">


                                {{-- REKENING --}}
                                <div class="space-y-2">

                                    <span class="block text-sm text-slate-500 sm:text-base">
                                        No Rekening
                                    </span>

                                    <span
                                        id="rekening"
                                        class="block break-all text-lg font-bold text-slate-900 sm:text-xl"
                                    >
                                        {{ setting('bank_account', '-') }}
                                    </span>

                                </div>


                                <hr class="my-5">


                                {{-- OWNER --}}
                                <div class="flex items-start justify-between gap-5">

                                    <span class="text-sm text-slate-500 sm:text-base">
                                        Atas Nama
                                    </span>

                                    <span
                                        class="max-w-[60%] text-right text-sm font-bold leading-5 sm:text-base"
                                    >
                                        {{ setting('bank_owner', 'Bina Insani Training Center') }}
                                    </span>

                                </div>


                                {{-- COPY --}}
                                <button
                                    type="button"
                                    onclick="copyRekening()"
                                    class="mt-7 flex w-full items-center justify-center gap-2 rounded-2xl bg-blue-600 py-3.5 text-sm font-bold text-white transition hover:bg-blue-700 active:scale-[0.98] sm:mt-8 sm:text-base"
                                >

                                    <i
                                        id="copyIcon"
                                        class="bi bi-copy"
                                    ></i>

                                    <span id="copyText">
                                        Salin Nomor Rekening
                                    </span>

                                </button>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         UPLOAD PROOF
                    ================================================== --}}
                    <div
                        class="mt-8 rounded-3xl border border-slate-200 bg-white p-5 shadow-xl sm:mt-14 sm:rounded-[32px] sm:p-10"
                    >

                        <div class="text-center">

                            <div
                                class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-100 sm:h-20 sm:w-20"
                            >
                                <i class="bi bi-cloud-arrow-up text-4xl text-green-600 sm:text-5xl"></i>
                            </div>

                            <h2 class="mt-5 text-2xl font-bold sm:mt-6 sm:text-3xl">
                                Upload Bukti Pembayaran
                            </h2>

                            <p class="mt-2 text-sm leading-6 text-slate-500 sm:text-base">
                                Upload screenshot atau foto bukti pembayaran.
                            </p>

                        </div>


                        <div class="mx-auto mt-7 max-w-2xl sm:mt-10">

                            <label
                                for="payment_proof"
                                class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-blue-300 bg-blue-50/50 p-6 text-center transition hover:bg-blue-50 sm:p-8"
                            >

                                <i class="bi bi-image text-3xl text-blue-500 sm:text-4xl"></i>

                                <span
                                    class="mt-3 text-sm font-semibold text-slate-700 sm:text-base"
                                >
                                    Pilih bukti pembayaran
                                </span>

                                <span
                                    class="mt-1 text-xs text-slate-500 sm:text-sm"
                                >
                                    JPG, JPEG, atau PNG • Maks. 2 MB
                                </span>

                                <input
                                    id="payment_proof"
                                    type="file"
                                    name="payment_proof"
                                    accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                    onchange="previewPayment(event)"
                                    class="sr-only"
                                >

                            </label>


                            @error('payment_proof')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror


                            <div class="mt-6 flex justify-center sm:mt-8">

                                <img
                                    id="preview"
                                    src=""
                                    alt="Preview bukti pembayaran"
                                    class="hidden max-h-80 max-w-full rounded-2xl object-contain shadow-xl sm:max-h-96"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         INFO
                    ================================================== --}}
                    <div
                        class="mt-8 rounded-3xl border border-blue-200 bg-blue-50 p-5 sm:mt-10 sm:p-8"
                    >

                        <div class="flex items-start gap-4">

                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-600 text-white sm:h-14 sm:w-14 sm:rounded-2xl"
                            >
                                <i class="bi bi-info-circle text-xl sm:text-2xl"></i>
                            </div>

                            <div class="min-w-0">

                                <h3 class="text-lg font-bold text-slate-900 sm:text-xl">
                                    Informasi Penting
                                </h3>

                                <ul
                                    class="mt-3 space-y-2 text-sm leading-6 text-slate-600 sm:mt-4 sm:text-base"
                                >

                                    <li>
                                        • Pastikan nominal pembayaran sesuai dengan biaya pendaftaran.
                                    </li>

                                    <li>
                                        • Bukti pembayaran harus terlihat jelas dan dapat dibaca.
                                    </li>

                                    <li>
                                        • File bukti pembayaran maksimal 2 MB.
                                    </li>

                                    <li>
                                        • Admin akan melakukan verifikasi pembayaran.
                                    </li>

                                    <li>
                                        • Setelah diverifikasi, status pembayaran akan diperbarui.
                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         SUBMIT
                    ================================================== --}}
                    <div class="mt-8 sm:mt-12">

                        <button
                            type="submit"
                            :disabled="submitting"
                            :class="
                                submitting
                                    ? 'cursor-not-allowed bg-slate-400'
                                    : 'bg-[#2E3192] hover:-translate-y-1 hover:bg-blue-900'
                            "
                            class="group flex w-full items-center justify-center gap-3 rounded-2xl px-6 py-4 text-sm font-bold text-white shadow-lg transition sm:mx-auto sm:w-auto sm:px-8 sm:text-base"
                        >

                            <template x-if="!submitting">
                                <span class="inline-flex items-center gap-3">

                                    <i class="bi bi-send-fill"></i>

                                    Kirim Bukti Pembayaran

                                    <i
                                        class="bi bi-arrow-right transition group-hover:translate-x-1"
                                    ></i>

                                </span>
                            </template>


                            <template x-if="submitting">
                                <span class="inline-flex items-center gap-3">

                                    <span
                                        class="h-5 w-5 animate-spin rounded-full border-2 border-white/40 border-t-white"
                                    ></span>

                                    Mengirim...

                                </span>
                            </template>

                        </button>

                    </div>

                </form>

            @else

                {{-- WAITING VERIFICATION --}}
                <div
                    class="mx-auto mt-12 max-w-3xl rounded-3xl border border-orange-200 bg-orange-50 p-6 text-center shadow-sm sm:mt-16 sm:p-10"
                >

                    <div
                        class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-orange-100 text-orange-600 sm:h-20 sm:w-20"
                    >
                        <i class="bi bi-hourglass-split text-3xl sm:text-4xl"></i>
                    </div>

                    <h2
                        class="mt-5 text-2xl font-extrabold text-slate-800 sm:text-3xl"
                    >
                        Pembayaran Sedang Diverifikasi
                    </h2>

                    <p
                        class="mx-auto mt-3 max-w-xl text-sm leading-6 text-slate-600 sm:text-base"
                    >
                        Bukti pembayaran sudah diterima oleh sistem.
                        Silakan menunggu proses verifikasi admin.
                    </p>

                    <a
                        href="{{ route('dashboard') }}"
                        class="mt-7 inline-flex items-center gap-2 rounded-xl bg-[#2E3192] px-6 py-3.5 font-bold text-white transition hover:-translate-y-1 hover:bg-blue-900"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Kembali ke Dashboard
                    </a>

                </div>

            @endif

        @else

            {{-- PAID --}}
            <div
                class="mx-auto mt-12 max-w-3xl rounded-3xl border border-green-200 bg-green-50 p-6 text-center shadow-sm sm:mt-16 sm:p-10"
            >

                <div
                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-green-100 text-green-600 sm:h-20 sm:w-20"
                >
                    <i class="bi bi-check-circle-fill text-3xl sm:text-4xl"></i>
                </div>

                <h2
                    class="mt-5 text-2xl font-extrabold text-slate-800 sm:text-3xl"
                >
                    Pembayaran Sudah Lunas
                </h2>

                <p
                    class="mx-auto mt-3 max-w-xl text-sm leading-6 text-slate-600 sm:text-base"
                >
                    Pembayaran untuk pendaftaran ini sudah diverifikasi.
                    Anda tidak perlu mengirim bukti pembayaran lagi.
                </p>

                <a
                    href="{{ route('dashboard') }}"
                    class="mt-7 inline-flex items-center gap-2 rounded-xl bg-[#2E3192] px-6 py-3.5 font-bold text-white transition hover:-translate-y-1 hover:bg-blue-900"
                >
                    <i class="bi bi-speedometer2"></i>
                    Buka Dashboard
                </a>

            </div>

        @endif

    </div>

</section>


{{-- =========================================================
     JAVASCRIPT
========================================================== --}}
<script>

    /**
     * --------------------------------------------------------------------------
     * Payment Preview
     * --------------------------------------------------------------------------
     */
    function previewPayment(event) {

        const preview =
            document.getElementById('preview');

        const file =
            event.target.files[0];


        if (
            !preview ||
            !file
        ) {

            if (preview) {
                preview.src = '';
                preview.classList.add('hidden');
            }

            return;
        }


        /**
         * --------------------------------------------------------------------------
         * Validate Image
         * --------------------------------------------------------------------------
         */
        const allowedTypes = [
            'image/jpeg',
            'image/png'
        ];


        if (
            !allowedTypes.includes(file.type)
        ) {

            alert(
                'File harus berupa JPG, JPEG, atau PNG.'
            );

            event.target.value = '';
            preview.src = '';
            preview.classList.add('hidden');

            return;
        }


        /**
         * --------------------------------------------------------------------------
         * Validate Size
         * --------------------------------------------------------------------------
         */
        if (
            file.size > 2 * 1024 * 1024
        ) {

            alert(
                'Ukuran bukti pembayaran maksimal 2 MB.'
            );

            event.target.value = '';
            preview.src = '';
            preview.classList.add('hidden');

            return;
        }


        /**
         * --------------------------------------------------------------------------
         * Preview
         * --------------------------------------------------------------------------
         */
        const objectUrl =
            URL.createObjectURL(file);

        preview.src =
            objectUrl;

        preview.classList.remove(
            'hidden'
        );


        preview.onload = () => {

            URL.revokeObjectURL(
                objectUrl
            );

        };

    }


    /**
     * --------------------------------------------------------------------------
     * Copy Bank Account
     * --------------------------------------------------------------------------
     */
    function copyRekening() {

        const rekeningElement =
            document.getElementById(
                'rekening'
            );

        const copyText =
            document.getElementById(
                'copyText'
            );

        const copyIcon =
            document.getElementById(
                'copyIcon'
            );


        if (!rekeningElement) {
            return;
        }


        const rekening =
            rekeningElement.innerText.trim();


        /**
         * --------------------------------------------------------------------------
         * Clipboard API
         * --------------------------------------------------------------------------
         */
        if (
            navigator.clipboard &&
            window.isSecureContext
        ) {

            navigator.clipboard
                .writeText(rekening)
                .then(() => {
                    showCopySuccess();
                })
                .catch(() => {
                    fallbackCopy(rekening);
                });

            return;
        }


        /**
         * --------------------------------------------------------------------------
         * Fallback
         * --------------------------------------------------------------------------
         */
        fallbackCopy(rekening);

    }


    /**
     * --------------------------------------------------------------------------
     * Fallback Copy
     * --------------------------------------------------------------------------
     */
    function fallbackCopy(text) {

        const textarea =
            document.createElement(
                'textarea'
            );

        textarea.value =
            text;

        textarea.style.position =
            'fixed';

        textarea.style.left =
            '-9999px';

        textarea.style.top =
            '0';

        textarea.style.opacity =
            '0';

        document.body.appendChild(
            textarea
        );

        textarea.focus();

        textarea.select();

        textarea.setSelectionRange(
            0,
            textarea.value.length
        );


        try {

            const successful =
                document.execCommand(
                    'copy'
                );

            if (successful) {
                showCopySuccess();
            } else {
                showCopyError();
            }

        } catch (error) {

            showCopyError();

        }


        document.body.removeChild(
            textarea
        );

    }


    /**
     * --------------------------------------------------------------------------
     * Copy Success
     * --------------------------------------------------------------------------
     */
    function showCopySuccess() {

        const copyText =
            document.getElementById(
                'copyText'
            );

        const copyIcon =
            document.getElementById(
                'copyIcon'
            );


        if (
            !copyText ||
            !copyIcon
        ) {

            return;

        }


        copyText.innerText =
            'Berhasil Disalin!';

        copyIcon.className =
            'bi bi-check-circle-fill';


        setTimeout(() => {

            copyText.innerText =
                'Salin Nomor Rekening';

            copyIcon.className =
                'bi bi-copy';

        }, 2000);

    }


    /**
     * --------------------------------------------------------------------------
     * Copy Error
     * --------------------------------------------------------------------------
     */
    function showCopyError() {

        alert(
            'Nomor rekening gagal disalin. Silakan salin secara manual.'
        );

    }

</script>


@endsection
