@extends('layouts.admin')

@section('title')
    Detail Peserta
@endsection

@section('content')

@if(session('success'))
    <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-700 shadow-sm">
        <div class="flex items-center gap-3">
            <i class="bi bi-check-circle-fill text-xl"></i>
            <p class="font-medium">
                {{ session('success') }}
            </p>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700 shadow-sm">
        <div class="flex items-center gap-3">
            <i class="bi bi-exclamation-circle-fill text-xl"></i>
            <p class="font-medium">
                {{ session('error') }}
            </p>
        </div>
    </div>
@endif


<div class="space-y-6">

    {{-- ===========================================================
        HEADER
    ============================================================ --}}

    <div class="overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-sky-500 to-orange-400 p-6 text-white shadow-xl sm:p-8">

        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

            {{-- Identitas --}}
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
                                {{ $registration->registration_code }}
                            </span>
                        </p>

                    </div>

                </div>

            </div>


            {{-- Action --}}
            <div class="flex flex-wrap items-center gap-3">

                <a
                    href="{{ route('admin.registrations.index') }}"
                    class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-100">

                    <i class="bi bi-arrow-left me-2"></i>

                    Kembali

                </a>


                {{-- =================================================
                    PEMBAYARAN MENUNGGU VERIFIKASI
                ================================================== --}}

                @if($registration->payment_status === 'waiting_verification')

                    <form
                        action="{{ route('admin.registrations.payment.approve', $registration->id) }}"
                        method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menyetujui pembayaran peserta ini?')">

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-green-600 px-5 py-3 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-green-700">

                            <i class="bi bi-check-circle-fill"></i>

                            Verifikasi Pembayaran

                        </button>

                    </form>


                    <form
                        action="{{ route('admin.registrations.payment.reject', $registration->id) }}"
                        method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menolak pembayaran peserta ini?')">

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-red-600 px-5 py-3 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-red-700">

                            <i class="bi bi-x-circle-fill"></i>

                            Tolak

                        </button>

                    </form>


                {{-- =================================================
                    PEMBAYARAN SUDAH LUNAS
                ================================================== --}}

                @elseif($registration->payment_status === 'paid')

                    @if($registration->status !== 'verified')

                        <form
                            action="{{ route('admin.registrations.verify', $registration->id) }}"
                            method="POST"
                            onsubmit="return confirm('Verifikasi peserta ini?')">

                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-700">

                                <i class="bi bi-person-check-fill"></i>

                                Verifikasi Peserta

                            </button>

                        </form>

                    @else

                        <span
                            class="inline-flex items-center gap-2 rounded-xl bg-green-100 px-5 py-3 text-sm font-bold text-green-700">

                            <i class="bi bi-check-circle-fill"></i>

                            Peserta Terverifikasi

                        </span>

                    @endif


                {{-- =================================================
                    PEMBAYARAN DITOLAK
                ================================================== --}}

                @elseif($registration->payment_status === 'rejected')

                    <span
                        class="inline-flex items-center gap-2 rounded-xl bg-red-100 px-5 py-3 text-sm font-bold text-red-700">

                        <i class="bi bi-x-circle-fill"></i>

                        Pembayaran Ditolak

                    </span>


                {{-- =================================================
                    BELUM BAYAR
                ================================================== --}}

                @else

                    <span
                        class="inline-flex items-center gap-2 rounded-xl bg-white/20 px-5 py-3 text-sm font-bold text-white">

                        <i class="bi bi-clock"></i>

                        Belum Bayar

                    </span>

                @endif

            </div>

        </div>

    </div>



    {{-- ===========================================================
        BIODATA PESERTA
    ============================================================ --}}

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">

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


        <div class="grid gap-6 p-6 sm:p-8 md:grid-cols-2">

            {{-- Nama --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Nama Lengkap
                </p>

                <h3 class="mt-2 text-lg font-bold text-slate-800">
                    {{ $registration->full_name }}
                </h3>

            </div>


            {{-- Program --}}
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

                <h3 class="mt-2 text-lg font-semibold text-slate-800">
                    {{ $registration->nik }}
                </h3>

            </div>


            {{-- Gender --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Jenis Kelamin
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">
                    {{ $registration->gender }}
                </h3>

            </div>


            {{-- Tempat Tanggal Lahir --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Tempat, Tanggal Lahir
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">

                    {{ $registration->birth_place }},

                    {{ $registration->birth_date?->format('d F Y') ?? '-' }}

                </h3>

            </div>


            {{-- WhatsApp --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Nomor WhatsApp
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">
                    {{ $registration->phone }}
                </h3>

            </div>


            {{-- Email --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Email
                </p>

                <h3 class="mt-2 break-all text-lg font-semibold text-slate-800">
                    {{ $registration->email ?? '-' }}
                </h3>

            </div>


            {{-- Pendidikan --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Pendidikan Terakhir
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">
                    {{ $registration->education ?? '-' }}
                </h3>

            </div>


            {{-- Pekerjaan --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Pekerjaan
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">
                    {{ $registration->job ?? '-' }}
                </h3>

            </div>


            {{-- Tanggal --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Tanggal Pendaftaran
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">

                    {{ $registration->created_at?->format('d F Y H:i') ?? '-' }}

                </h3>

            </div>


            {{-- Alamat --}}
            <div class="rounded-2xl bg-slate-50 p-5 md:col-span-2">

                <p class="text-sm text-slate-500">
                    Alamat
                </p>

                <h3 class="mt-2 text-lg leading-relaxed text-slate-800">
                    {{ $registration->address }}
                </h3>

            </div>

        </div>

    </div>



    {{-- ===========================================================
        INFORMASI PEMBAYARAN
    ============================================================ --}}

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">

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


        <div class="grid gap-6 p-6 sm:p-8 md:grid-cols-2">

            {{-- Status --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="mb-3 text-sm text-slate-500">
                    Status Pembayaran
                </p>

                @if($registration->payment_status === 'paid')

                    <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">

                        <i class="bi bi-check-circle-fill"></i>

                        Lunas

                    </span>

                @elseif($registration->payment_status === 'waiting_verification')

                    <span class="inline-flex items-center gap-2 rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-700">

                        <i class="bi bi-clock-history"></i>

                        Menunggu Verifikasi

                    </span>

                @elseif($registration->payment_status === 'rejected')

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


            {{-- Metode --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Metode Pembayaran
                </p>

                <div class="mt-2 flex items-center gap-3">

                    @if($registration->payment_method === 'qris')

                        <i class="bi bi-qr-code text-2xl text-red-500"></i>

                        <span class="text-lg font-bold text-slate-800">
                            QRIS
                        </span>

                    @elseif($registration->payment_method === 'transfer')

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


            {{-- Bukti --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Bukti Pembayaran
                </p>

                @if($registration->payment_proof)

                    <div class="mt-3 flex items-center gap-3">

                        <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">

                            <i class="bi bi-check-circle-fill"></i>

                            Sudah Upload

                        </span>

                        <a
                            href="{{ asset('storage/'.$registration->payment_proof) }}"
                            target="_blank"
                            class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">

                            <i class="bi bi-eye"></i>

                            Lihat

                        </a>

                    </div>

                @else

                    <span class="mt-2 inline-flex items-center gap-2 rounded-full bg-slate-200 px-4 py-2 text-sm font-semibold text-slate-600">

                        <i class="bi bi-image"></i>

                        Belum Upload

                    </span>

                @endif

            </div>


            {{-- Tanggal Pembayaran --}}
            <div class="rounded-2xl bg-slate-50 p-5">

                <p class="text-sm text-slate-500">
                    Tanggal Pembayaran
                </p>

                <h3 class="mt-2 text-lg font-semibold text-slate-800">

                    @if($registration->paid_at)

                        {{ $registration->paid_at->format('d F Y H:i') }}

                    @else

                        <span class="text-slate-400">
                            Belum diverifikasi
                        </span>

                    @endif

                </h3>

            </div>

        </div>


        {{-- Status info --}}
        @if($registration->payment_status === 'waiting_verification')

            <div class="border-t border-yellow-200 bg-yellow-50 px-6 py-5 sm:px-8">

                <div class="flex items-start gap-3">

                    <i class="bi bi-info-circle-fill mt-0.5 text-xl text-yellow-600"></i>

                    <div>

                        <h3 class="font-bold text-yellow-800">
                            Pembayaran Menunggu Verifikasi
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-yellow-700">

                            Peserta telah mengirimkan bukti pembayaran.
                            Silakan periksa bukti pembayaran sebelum menyetujui atau menolaknya.

                        </p>

                    </div>

                </div>

            </div>

        @elseif($registration->payment_status === 'paid')

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

        @elseif($registration->payment_status === 'rejected')

            <div class="border-t border-red-200 bg-red-50 px-6 py-5 sm:px-8">

                <div class="flex items-start gap-3">

                    <i class="bi bi-exclamation-circle-fill mt-0.5 text-xl text-red-600"></i>

                    <div>

                        <h3 class="font-bold text-red-800">
                            Pembayaran Ditolak
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-red-700">

                            Bukti pembayaran peserta ditolak.
                            Peserta perlu melakukan pembayaran kembali dan mengirimkan bukti yang sesuai.

                        </p>

                    </div>

                </div>

            </div>

        @endif

    </div>



    {{-- ===========================================================
    DOKUMEN PESERTA
============================================================ --}}

<div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">

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


    <div class="p-6 sm:p-8">

        @if($registration->documents && $registration->documents->count() > 0)

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">

                @foreach($registration->documents as $document)

                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                        {{-- Preview --}}
                        <div class="bg-slate-100 p-3">

                            @if($document->mime_type && str_starts_with($document->mime_type, 'image/'))

                                <a
                                    href="{{ asset('storage/' . $document->file_path) }}"
                                    target="_blank"
                                    class="group block overflow-hidden rounded-xl"
                                >

                                    <img
                                        src="{{ asset('storage/' . $document->file_path) }}"
                                        alt="{{ $document->original_name }}"
                                        class="h-64 w-full object-cover transition duration-300 group-hover:scale-105"
                                    >

                                </a>

                            @else

                                <div class="flex h-64 items-center justify-center rounded-xl bg-slate-200">

                                    <div class="text-center">

                                        <i class="bi bi-file-earmark-text text-6xl text-slate-400"></i>

                                        <p class="mt-3 text-sm font-medium text-slate-600">
                                            File Dokumen
                                        </p>

                                    </div>

                                </div>

                            @endif

                        </div>


                        {{-- Informasi --}}
                        <div class="p-5">

                            <div class="mb-3">

                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Jenis Dokumen
                                </p>

                                <p class="mt-1 text-sm font-bold text-slate-800">
                                    {{ ucfirst($document->document_type) }}
                                </p>

                            </div>


                            <div class="mb-4">

                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Nama File
                                </p>

                                <p class="mt-1 break-all text-sm text-slate-600">
                                    {{ $document->original_name }}
                                </p>

                            </div>


                            <a
                                href="{{ asset('storage/' . $document->file_path) }}"
                                target="_blank"
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

    </div>

</div>

@endsection