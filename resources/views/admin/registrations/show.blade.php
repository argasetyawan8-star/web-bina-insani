@extends('layouts.admin')

@section('title')
    Detail Peserta
@endsection

@section('content')

<div class="space-y-6">

    {{-- =========================================================
         FLASH MESSAGE
    ========================================================== --}}

    @if (session('success'))

        <div class="rounded-2xl border border-green-200 bg-green-50 p-4 text-green-700 shadow-sm">

            <div class="flex items-center gap-3">

                <i class="bi bi-check-circle-fill text-xl"></i>

                <p class="font-medium">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif


    @if (session('error'))

        <div class="rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700 shadow-sm">

            <div class="flex items-center gap-3">

                <i class="bi bi-exclamation-circle-fill text-xl"></i>

                <p class="font-medium">
                    {{ session('error') }}
                </p>

            </div>

        </div>

    @endif



    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-sky-500 to-orange-400 p-6 text-white shadow-xl sm:p-8">

        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">


            {{-- IDENTITAS --}}
            <div class="min-w-0">

                <div class="flex items-center gap-4">

                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/20 sm:h-16 sm:w-16">

                        <i class="bi bi-person-badge text-3xl"></i>

                    </div>


                    <div class="min-w-0">

                        <h1 class="break-words text-2xl font-bold sm:text-3xl">
                            {{ $registration->full_name }}
                        </h1>

                        <p class="mt-1 text-sm text-blue-100 sm:text-base">

                            Kode Pendaftaran:

                            <span class="font-semibold text-white">
                                {{ $registration->registration_code ?? '-' }}
                            </span>

                        </p>

                    </div>

                </div>

            </div>



            {{-- =====================================================
                 ACTION AREA
            ====================================================== --}}

            <div class="flex flex-wrap items-center gap-3">

                {{-- BACK --}}
                <a
                    href="{{ route('admin.registrations.index') }}"
                    class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-100"
                >
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali
                </a>



                {{-- =================================================
                     PAYMENT ACTION
                ================================================== --}}

                @if ($registration->payment_status === 'waiting_verification')

                    {{-- APPROVE --}}
                    <form
                        action="{{ route('admin.registrations.payment.approve', $registration) }}"
                        method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menyetujui pembayaran peserta ini?')"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-green-600 px-5 py-3 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-green-700"
                        >

                            <i class="bi bi-check-circle-fill"></i>

                            Verifikasi Pembayaran

                        </button>

                    </form>


                    {{-- REJECT --}}
                    <form
                        action="{{ route('admin.registrations.payment.reject', $registration) }}"
                        method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menolak pembayaran peserta ini?')"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-red-600 px-5 py-3 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-red-700"
                        >

                            <i class="bi bi-x-circle-fill"></i>

                            Tolak

                        </button>

                    </form>



                @elseif ($registration->payment_status === 'paid')

                    {{-- PAYMENT PAID --}}
                    <span
                        class="inline-flex items-center gap-2 rounded-xl bg-green-100 px-5 py-3 text-sm font-bold text-green-700"
                    >

                        <i class="bi bi-check-circle-fill"></i>

                        Pembayaran Lunas

                    </span>



                @elseif ($registration->payment_status === 'rejected')

                    {{-- PAYMENT REJECTED --}}
                    <span
                        class="inline-flex items-center gap-2 rounded-xl bg-red-100 px-5 py-3 text-sm font-bold text-red-700"
                    >

                        <i class="bi bi-x-circle-fill"></i>

                        Pembayaran Ditolak

                    </span>



                @else

                    {{-- NOT PAID --}}
                    <span
                        class="inline-flex items-center gap-2 rounded-xl bg-white/20 px-5 py-3 text-sm font-bold text-white"
                    >

                        <i class="bi bi-clock"></i>

                        Belum Bayar

                    </span>

                @endif



                {{-- =================================================
                     PARTICIPANT VERIFICATION
                ================================================== --}}

                @if (
                    $registration->payment_status === 'paid' &&
                    $registration->status !== 'verified'
                )

                    <form
                        action="{{ route('admin.registrations.verify', $registration->id) }}"
                        method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin memverifikasi peserta ini?')"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-700"
                        >

                            <i class="bi bi-person-check-fill"></i>

                            Verifikasi Peserta

                        </button>

                    </form>

                @elseif ($registration->status === 'verified')

                    <span
                        class="inline-flex items-center gap-2 rounded-xl bg-green-100 px-5 py-3 text-sm font-bold text-green-700"
                    >

                        <i class="bi bi-person-check-fill"></i>

                        Peserta Terverifikasi

                    </span>

                @endif

            </div>

        </div>

    </div>



    {{-- =========================================================
         BIODATA PESERTA
    ========================================================== --}}

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">

        {{-- HEADER --}}
        <div class="border-b bg-slate-50 px-6 py-6 sm:px-8">

            <div class="flex items-center gap-3">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100">

                    <i class="bi bi-person-vcard text-2xl text-blue-600"></i>

                </div>

                <div>

                    <h2 class="text-xl font-bold text-slate-800">
                        Biodata Peserta
                    </h2>

                    <p class="text-sm text-slate-500">
                        Informasi lengkap peserta yang telah melakukan pendaftaran.
                    </p>

                </div>

            </div>

        </div>



        {{-- BODY --}}
        <div class="grid gap-6 p-6 sm:p-8 md:grid-cols-2">


            {{-- NAMA --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Nama Lengkap
                </p>

                <h3 class="mt-2 text-lg font-bold text-slate-800">
                    {{ $registration->full_name ?? '-' }}
                </h3>

            </div>


            {{-- PROGRAM --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Program
                </p>

                <h3 class="mt-2 text-lg font-bold text-slate-800">
                    {{ $registration->program->name ?? '-' }}
                </h3>

            </div>


            {{-- NIK --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    NIK
                </p>

                <h3 class="mt-2 break-all text-lg font-semibold text-slate-800">
                    {{ $registration->nik ?? '-' }}
                </h3>

            </div>


            {{-- GENDER --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Jenis Kelamin
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">
                    {{ $registration->gender ?? '-' }}
                </h3>

            </div>


            {{-- TEMPAT / TANGGAL LAHIR --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Tempat, Tanggal Lahir
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">

                    {{ $registration->birth_place ?? '-' }}

                    @if ($registration->birth_date)

                        ,
                        {{ $registration->birth_date->format('d F Y') }}

                    @endif

                </h3>

            </div>


            {{-- WHATSAPP --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Nomor WhatsApp
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">
                    {{ $registration->phone ?? '-' }}
                </h3>

            </div>


            {{-- EMAIL --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Email
                </p>

                <h3 class="mt-2 break-all text-lg font-semibold text-slate-800">
                    {{ $registration->email ?? '-' }}
                </h3>

            </div>


            {{-- PENDIDIKAN --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Pendidikan Terakhir
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">
                    {{ $registration->education ?? '-' }}
                </h3>

            </div>


            {{-- PEKERJAAN --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Pekerjaan
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">
                    {{ $registration->job ?? '-' }}
                </h3>

            </div>


            {{-- STATUS PESERTA --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Status Peserta
                </p>

                <div class="mt-2">

                    @if ($registration->status === 'verified')

                        <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">

                            <i class="bi bi-check-circle-fill"></i>

                            Terverifikasi

                        </span>

                    @else

                        <span class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-4 py-2 text-sm font-semibold text-orange-700">

                            <i class="bi bi-hourglass-split"></i>

                            Menunggu Verifikasi

                        </span>

                    @endif

                </div>

            </div>


            {{-- TANGGAL --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Tanggal Pendaftaran
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">

                    {{ $registration->created_at?->format('d F Y H:i') ?? '-' }}

                </h3>

            </div>


            {{-- ALAMAT --}}
            <div class="rounded-2xl bg-slate-50 p-5 md:col-span-2">

                <p class="text-sm text-slate-500">
                    Alamat
                </p>

                <p class="mt-2 text-lg leading-relaxed text-slate-800">
                    {{ $registration->address ?? '-' }}
                </p>

            </div>

        </div>

    </div>



    {{-- =========================================================
         INFORMASI PEMBAYARAN
    ========================================================== --}}

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">

        {{-- HEADER --}}
        <div class="border-b bg-slate-50 px-6 py-6 sm:px-8">

            <div class="flex items-center gap-3">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100">

                    <i class="bi bi-wallet2 text-2xl text-green-600"></i>

                </div>

                <div>

                    <h2 class="text-xl font-bold text-slate-800">
                        Informasi Pembayaran
                    </h2>

                    <p class="text-sm text-slate-500">
                        Informasi pembayaran dan status verifikasi peserta.
                    </p>

                </div>

            </div>

        </div>



        {{-- BODY --}}
        <div class="grid gap-6 p-6 sm:p-8 md:grid-cols-2">


            {{-- STATUS --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="mb-3 text-sm text-slate-500">
                    Status Pembayaran
                </p>

                @if ($registration->payment_status === 'paid')

                    <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">

                        <i class="bi bi-check-circle-fill"></i>

                        Lunas

                    </span>

                @elseif ($registration->payment_status === 'waiting_verification')

                    <span class="inline-flex items-center gap-2 rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-700">

                        <i class="bi bi-clock-history"></i>

                        Menunggu Verifikasi

                    </span>

                @elseif ($registration->payment_status === 'rejected')

                    <span class="inline-flex items-center gap-2 rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-700">

                        <i class="bi bi-x-circle-fill"></i>

                        Ditolak

                    </span>

                @else

                    <span class="inline-flex items-center gap-2 rounded-full bg-slate-200 px-4 py-2 text-sm font-semibold text-slate-700">

                        <i class="bi bi-dash-circle"></i>

                        Belum Bayar

                    </span>

                @endif

            </div>


            {{-- METODE --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Metode Pembayaran
                </p>

                <div class="mt-2 flex items-center gap-3">

                    @if ($registration->payment_method === 'qris')

                        <i class="bi bi-qr-code text-2xl text-red-500"></i>

                        <span class="text-lg font-bold text-slate-800">
                            QRIS
                        </span>

                    @elseif ($registration->payment_method === 'transfer')

                        <i class="bi bi-bank text-2xl text-blue-600"></i>

                        <span class="text-lg font-bold text-slate-800">
                            Transfer Bank
                        </span>

                    @else

                        <i class="bi bi-dash-circle text-2xl text-slate-400"></i>

                        <span class="text-lg font-bold text-slate-500">
                            Belum Dipilih
                        </span>

                    @endif

                </div>

            </div>


            {{-- BUKTI PEMBAYARAN --}}
            <div class="rounded-2xl bg-slate-50 p-5 md:col-span-2">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Bukti Pembayaran
                        </p>

                        @if ($registration->payment_proof)

                            <div class="mt-2 flex items-center gap-2">

                                <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Sudah Upload

                                </span>

                            </div>

                        @else

                            <span class="mt-2 inline-flex items-center gap-2 rounded-full bg-slate-200 px-4 py-2 text-sm font-semibold text-slate-600">

                                <i class="bi bi-image"></i>

                                Belum Upload

                            </span>

                        @endif

                    </div>


                    @if ($registration->payment_proof)

                        <a
                            href="{{ asset('storage/' . $registration->payment_proof) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
                        >

                            <i class="bi bi-eye"></i>

                            Lihat Bukti Pembayaran

                        </a>

                    @endif

                </div>

            </div>


            {{-- PAID AT --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Tanggal Pembayaran
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">

                    @if ($registration->paid_at)

                        {{ $registration->paid_at->format('d F Y H:i') }}

                    @else

                        <span class="text-slate-400">
                            Belum diverifikasi
                        </span>

                    @endif

                </h3>

            </div>


            {{-- REGISTRATION FEE --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Biaya Pendaftaran
                </p>

                <h3 class="mt-2 text-xl font-extrabold text-[#2E3192]">

                    Rp
                    {{ number_format(
                        $registration->program->registration_fee ?? 0,
                        0,
                        ',',
                        '.'
                    ) }}

                </h3>

            </div>

        </div>



        {{-- PAYMENT MESSAGE --}}
        @if ($registration->payment_status === 'waiting_verification')

            <div class="border-t border-yellow-200 bg-yellow-50 px-6 py-5 sm:px-8">

                <div class="flex items-start gap-3">

                    <i class="bi bi-info-circle-fill mt-0.5 text-xl text-yellow-600"></i>

                    <div>

                        <h3 class="font-bold text-yellow-800">
                            Pembayaran Menunggu Verifikasi
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-yellow-700">

                            Peserta telah mengirimkan bukti pembayaran.
                            Silakan periksa bukti tersebut sebelum melakukan
                            approve atau reject.

                        </p>

                    </div>

                </div>

            </div>

        @elseif ($registration->payment_status === 'paid')

            <div class="border-t border-green-200 bg-green-50 px-6 py-5 sm:px-8">

                <div class="flex items-start gap-3">

                    <i class="bi bi-check-circle-fill mt-0.5 text-xl text-green-600"></i>

                    <div>

                        <h3 class="font-bold text-green-800">
                            Pembayaran Telah Terverifikasi
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-green-700">
                            Pembayaran peserta telah disetujui oleh admin.
                        </p>

                    </div>

                </div>

            </div>

        @elseif ($registration->payment_status === 'rejected')

            <div class="border-t border-red-200 bg-red-50 px-6 py-5 sm:px-8">

                <div class="flex items-start gap-3">

                    <i class="bi bi-exclamation-circle-fill mt-0.5 text-xl text-red-600"></i>

                    <div>

                        <h3 class="font-bold text-red-800">
                            Pembayaran Ditolak
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-red-700">
                            Peserta perlu melakukan pembayaran kembali
                            dan mengirimkan bukti pembayaran yang sesuai.
                        </p>

                    </div>

                </div>

            </div>

        @endif

    </div>



    {{-- =========================================================
         DOKUMEN PESERTA
    ========================================================== --}}

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">

        {{-- HEADER --}}
        <div class="border-b bg-slate-50 px-6 py-6 sm:px-8">

            <div class="flex items-center gap-3">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-100">

                    <i class="bi bi-folder2-open text-2xl text-orange-500"></i>

                </div>

                <div>

                    <h2 class="text-xl font-bold text-slate-800">
                        Dokumen Peserta
                    </h2>

                    <p class="text-sm text-slate-500">
                        Seluruh dokumen yang telah diupload oleh peserta.
                    </p>

                </div>

            </div>

        </div>



        {{-- BODY --}}
        <div class="p-6 sm:p-8">

            @if ($registration->documents && $registration->documents->count() > 0)

                <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">

                    @foreach ($registration->documents as $document)

                        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                            {{-- PREVIEW --}}
                            <div class="bg-slate-100 p-3">

                                @php
                                    $documentUrl = asset(
                                        'storage/' .
                                        $document->file_path
                                    );

                                    $mimeType =
                                        $document->mime_type ??
                                        '';

                                    $isImage =
                                        str_starts_with(
                                            $mimeType,
                                            'image/'
                                        );

                                    $isPdf =
                                        $mimeType ===
                                        'application/pdf'
                                        ||
                                        str_ends_with(
                                            strtolower(
                                                $document->original_name ?? ''
                                            ),
                                            '.pdf'
                                        );
                                @endphp


                                {{-- IMAGE --}}
                                @if ($isImage)

                                    <a
                                        href="{{ $documentUrl }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="group block overflow-hidden rounded-xl"
                                    >

                                        <img
                                            src="{{ $documentUrl }}"
                                            alt="{{ $document->original_name }}"
                                            class="h-64 w-full object-cover transition duration-300 group-hover:scale-105"
                                        >

                                    </a>


                                {{-- PDF --}}
                                @elseif ($isPdf)

                                    <div class="flex h-64 flex-col items-center justify-center rounded-xl bg-red-50">

                                        <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-white shadow-sm">

                                            <i class="bi bi-file-earmark-pdf-fill text-5xl text-red-500"></i>

                                        </div>

                                        <p class="mt-4 text-sm font-bold text-slate-700">
                                            Dokumen PDF
                                        </p>

                                        <a
                                            href="{{ $documentUrl }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="mt-3 inline-flex items-center gap-2 rounded-xl bg-red-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-red-700"
                                        >

                                            <i class="bi bi-box-arrow-up-right"></i>

                                            Buka PDF

                                        </a>

                                    </div>


                                {{-- OTHER --}}
                                @else

                                    <div class="flex h-64 flex-col items-center justify-center rounded-xl bg-slate-200">

                                        <i class="bi bi-file-earmark-text text-6xl text-slate-400"></i>

                                        <p class="mt-3 text-sm font-medium text-slate-600">
                                            File Dokumen
                                        </p>

                                        <a
                                            href="{{ $documentUrl }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="mt-3 inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-blue-700"
                                        >

                                            <i class="bi bi-eye"></i>

                                            Buka File

                                        </a>

                                    </div>

                                @endif

                            </div>



                            {{-- INFORMATION --}}
                            <div class="p-5">


                                {{-- DOCUMENT TYPE --}}
                                <div class="mb-4">

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Jenis Dokumen
                                    </p>

                                    <div class="mt-1">

                                        @php
                                            $typeLabel = match (
                                                strtolower(
                                                    $document->document_type ?? ''
                                                )
                                            ) {
                                                'ktp' => 'KTP',
                                                'kk' => 'Kartu Keluarga',
                                                'ijazah' => 'Ijazah',
                                                'paspor' => 'Paspor',
                                                'skck' => 'SKCK',
                                                default => 'Lainnya',
                                            };
                                        @endphp

                                        <span class="inline-flex rounded-full bg-[#2E3192]/10 px-3 py-1.5 text-xs font-bold text-[#2E3192]">
                                            {{ $typeLabel }}
                                        </span>

                                    </div>

                                </div>


                                {{-- FILE NAME --}}
                                <div class="mb-4">

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Nama File
                                    </p>

                                    <p class="mt-1 break-all text-sm text-slate-600">
                                        {{ $document->original_name ?? '-' }}
                                    </p>

                                </div>


                                {{-- FILE SIZE --}}
                                @if (!empty($document->file_size))

                                    <div class="mb-4">

                                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                            Ukuran
                                        </p>

                                        <p class="mt-1 text-sm text-slate-600">

                                            @if ($document->file_size >= 1048576)

                                                {{ number_format(
                                                    $document->file_size / 1048576,
                                                    1
                                                ) }}
                                                MB

                                            @else

                                                {{ number_format(
                                                    $document->file_size / 1024,
                                                    1
                                                ) }}
                                                KB

                                            @endif

                                        </p>

                                    </div>

                                @endif


                                {{-- OPEN BUTTON --}}
                                <a
                                    href="{{ $documentUrl }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
                                >

                                    <i class="bi bi-eye"></i>

                                    Lihat Dokumen

                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- EMPTY STATE --}}
                <div class="flex flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50 px-6 py-16 text-center">

                    <i class="bi bi-folder-x text-6xl text-slate-300"></i>

                    <h3 class="mt-4 text-lg font-bold text-slate-700">
                        Belum Ada Dokumen
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Peserta belum mengupload dokumen pendaftaran.
                    </p>

                </div>

            @endif

        </div>

    </div>



    {{-- =========================================================
         BOTTOM ACTION
    ========================================================== --}}

    <div class="flex justify-end">

        <a
            href="{{ route('admin.registrations.index') }}"
            class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50"
        >

            <i class="bi bi-arrow-left"></i>

            Kembali ke Daftar Peserta

        </a>

    </div>

</div>

@endsection