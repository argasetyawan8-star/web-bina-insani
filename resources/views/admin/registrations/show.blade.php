@extends('layouts.admin')


@section('title')
Detail Peserta
@endsection



@section('content')

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-lg">

{{ session('success') }}

</div>

@endif

<div class="space-y-6">


{{-- ===========================================================
    HEADER
=========================================================== --}}
<div class="rounded-3xl bg-gradient-to-r from-blue-600 via-sky-500 to-orange-400 p-8 text-white shadow-xl">

    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

        <div>

            <div class="flex items-center gap-3">

                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white/20">

                    <i class="bi bi-person-badge text-3xl"></i>

                </div>

                <div>

                    <h1 class="text-3xl font-bold">

                        {{ $registration->full_name }}

                    </h1>

                    <p class="mt-1 text-blue-100">

                        Kode Pendaftaran :
                        <span class="font-semibold">
                            {{ $registration->registration_code }}
                        </span>

                    </p>

                </div>

            </div>

        </div>

        <div class="flex flex-wrap items-center gap-3">

            <a
                href="{{ route('admin.registrations.index') }}"
                class="rounded-xl bg-white px-5 py-3 font-semibold text-slate-700 transition hover:bg-slate-100">

                <i class="bi bi-arrow-left me-2"></i>

                Kembali

            </a>

            <div class="flex gap-3">

    @if($registration->payment_status == 'waiting_verification')

        <form
            action="{{ route('admin.registrations.payment.approve', $registration->id) }}"
            method="POST">

            @csrf
            @method('PATCH')

            <button class="px-4 py-2 rounded-lg bg-green-600 text-white">

                Verifikasi Pembayaran

            </button>

        </form>

        <form
            action="{{ route('admin.registrations.payment.reject', $registration->id) }}"
            method="POST">

            @csrf
            @method('PATCH')

            <button class="px-4 py-2 rounded-lg bg-red-600 text-white">

                Tolak

            </button>

        </form>

    @elseif($registration->payment_status == 'paid' && $registration->status != 'verified')

        <form
            action="{{ route('admin.registrations.verify', $registration->id) }}"
            method="POST">

            @csrf
            @method('PATCH')

            <button class="px-4 py-2 rounded-lg bg-blue-600 text-white">

                Verifikasi Peserta

            </button>

        </form>

    @else

        <span class="px-4 py-2 rounded-lg bg-green-100 text-green-700">

            Peserta Terverifikasi

        </span>

    @endif

</div>

        </div>

    </div>

</div>





{{-- ===========================================================
    BIODATA PESERTA
=========================================================== --}}
<div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">

    <div class="border-b bg-slate-50 px-8 py-6">

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

    <div class="grid gap-6 p-8 md:grid-cols-2">

        <div class="rounded-2xl bg-slate-50 p-5">
            <p class="text-sm text-slate-500">Nama Lengkap</p>
            <h3 class="mt-2 text-lg font-bold text-slate-800">
                {{ $registration->full_name }}
            </h3>
        </div>

        <div class="rounded-2xl bg-slate-50 p-5">
            <p class="text-sm text-slate-500">Program</p>
            <h3 class="mt-2 text-lg font-bold text-slate-800">
                {{ $registration->program->name }}
            </h3>
        </div>

        <div class="rounded-2xl bg-slate-50 p-5">
            <p class="text-sm text-slate-500">NIK</p>
            <h3 class="mt-2 text-lg font-semibold text-slate-800">
                {{ $registration->nik }}
            </h3>
        </div>

        <div class="rounded-2xl bg-slate-50 p-5">
            <p class="text-sm text-slate-500">Jenis Kelamin</p>
            <h3 class="mt-2 text-lg font-semibold text-slate-800">
                {{ $registration->gender }}
            </h3>
        </div>

        <div class="rounded-2xl bg-slate-50 p-5">
            <p class="text-sm text-slate-500">Tempat, Tanggal Lahir</p>
            <h3 class="mt-2 text-lg font-semibold text-slate-800">
                {{ $registration->birth_place }},
                {{ $registration->birth_date->format('d F Y') }}
            </h3>
        </div>

        <div class="rounded-2xl bg-slate-50 p-5">
            <p class="text-sm text-slate-500">Nomor WhatsApp</p>
            <h3 class="mt-2 text-lg font-semibold text-slate-800">
                {{ $registration->phone }}
            </h3>
        </div>

        <div class="rounded-2xl bg-slate-50 p-5">
            <p class="text-sm text-slate-500">Email</p>
            <h3 class="mt-2 text-lg font-semibold text-slate-800">
                {{ $registration->email ?? '-' }}
            </h3>
        </div>

        <div class="rounded-2xl bg-slate-50 p-5">
            <p class="text-sm text-slate-500">Pendidikan Terakhir</p>
            <h3 class="mt-2 text-lg font-semibold text-slate-800">
                {{ $registration->education }}
            </h3>
        </div>

        <div class="rounded-2xl bg-slate-50 p-5">
            <p class="text-sm text-slate-500">Pekerjaan</p>
            <h3 class="mt-2 text-lg font-semibold text-slate-800">
                {{ $registration->job }}
            </h3>
        </div>

        <div class="rounded-2xl bg-slate-50 p-5">
            <p class="text-sm text-slate-500">Tanggal Pendaftaran</p>
            <h3 class="mt-2 text-lg font-semibold text-slate-800">
                {{ $registration->created_at->format('d F Y H:i') }}
            </h3>
        </div>

        <div class="rounded-2xl bg-slate-50 p-5 md:col-span-2">
            <p class="text-sm text-slate-500">Alamat</p>
            <h3 class="mt-2 text-lg leading-relaxed text-slate-800">
                {{ $registration->address }}
            </h3>
        </div>

    </div>

</div>



{{-- PROGRAM --}}

<div class="bg-white rounded-xl shadow-sm border p-6">


<h3 class="font-semibold mb-4">
Program
</h3>


<p>
{{ $registration->program->name ?? '-' }}
</p>


</div>







{{-- ===========================================================
    INFORMASI PEMBAYARAN
=========================================================== --}}
<div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">

    <div class="border-b bg-slate-50 px-8 py-6">

        <div class="flex items-center gap-3">

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100">

                <i class="bi bi-wallet2 text-2xl text-green-600"></i>

            </div>

            <div>

                <h2 class="text-xl font-bold text-slate-800">

                    Informasi Pembayaran

                </h2>

                <p class="text-sm text-slate-500">

                    Status pembayaran peserta yang perlu diverifikasi admin.

                </p>

            </div>

        </div>

    </div>

    <div class="grid gap-6 p-8 md:grid-cols-2">

        {{-- Status Pembayaran --}}
        <div class="rounded-2xl bg-slate-50 p-5">

            <p class="text-sm text-slate-500 mb-2">

                Status Pembayaran

            </p>

            @if($registration->payment_status == 'paid')

                <span class="rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">

                    <i class="bi bi-check-circle-fill me-1"></i>

                    Sudah Dibayar

                </span>

            @elseif($registration->payment_status == 'waiting_verification')

                <span class="rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-700">

                    <i class="bi bi-clock-history me-1"></i>

                    Menunggu Verifikasi

                </span>

            @elseif($registration->payment_status == 'rejected')

                <span class="rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-700">

                    <i class="bi bi-x-circle-fill me-1"></i>

                    Ditolak

                </span>

            @else

                <span class="rounded-full bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-700">

                    <i class="bi bi-dash-circle me-1"></i>

                    Belum Bayar

                </span>

            @endif

        </div>

        {{-- Metode --}}
        <div class="rounded-2xl bg-slate-50 p-5">

            <p class="text-sm text-slate-500">

                Metode Pembayaran

            </p>

            <h3 class="mt-2 text-lg font-semibold text-slate-800">

                {{ strtoupper($registration->payment_method ?? '-') }}

            </h3>

        </div>

        {{-- Upload --}}
        <div class="rounded-2xl bg-slate-50 p-5">

            <p class="text-sm text-slate-500">

                Bukti Pembayaran

            </p>

            <h3 class="mt-2 text-lg font-semibold text-slate-800">

                {{ $registration->payment_proof ? 'Sudah Upload' : 'Belum Upload' }}

            </h3>

        </div>

        {{-- Tanggal --}}
        <div class="rounded-2xl bg-slate-50 p-5">

            <p class="text-sm text-slate-500">

                Tanggal Pembayaran

            </p>

            <h3 class="mt-2 text-lg font-semibold text-slate-800">

                {{ $registration->paid_at?->format('d F Y H:i') ?? '-' }}

            </h3>

        </div>

    </div>

</div>

{{-- ===========================================================
    DOKUMEN PESERTA
=========================================================== --}}
<div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">

    <div class="border-b bg-slate-50 px-8 py-6">

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

    <div class="grid gap-8 p-8 md:grid-cols-2 xl:grid-cols-4">

        {{-- FOTO --}}
        <div>

            <h4 class="mb-3 font-semibold text-slate-700">

                Foto

            </h4>

            <a
                href="{{ asset('storage/'.$registration->photo) }}"
                target="_blank">

                <img
                    src="{{ asset('storage/'.$registration->photo) }}"
                    class="h-72 w-full rounded-2xl border object-cover shadow hover:scale-105 transition">

            </a>

        </div>

        {{-- KTP --}}
        <div>

            <h4 class="mb-3 font-semibold text-slate-700">

                KTP

            </h4>

            <a
                href="{{ asset('storage/'.$registration->ktp) }}"
                target="_blank">

                <img
                    src="{{ asset('storage/'.$registration->ktp) }}"
                    class="h-72 w-full rounded-2xl border object-cover shadow hover:scale-105 transition">

            </a>

        </div>

        {{-- IJAZAH --}}
        <div>

            <h4 class="mb-3 font-semibold text-slate-700">

                Ijazah

            </h4>

            <a
                href="{{ asset('storage/'.$registration->ijazah) }}"
                target="_blank">

                <img
                    src="{{ asset('storage/'.$registration->ijazah) }}"
                    class="h-72 w-full rounded-2xl border object-cover shadow hover:scale-105 transition">

            </a>

        </div>

        {{-- BUKTI PEMBAYARAN --}}
        <div>

            <h4 class="mb-3 font-semibold text-slate-700">

                Bukti Pembayaran

            </h4>

            @if($registration->payment_proof)

                <a
                    href="{{ asset('storage/'.$registration->payment_proof) }}"
                    target="_blank">

                    <img
                        src="{{ asset('storage/'.$registration->payment_proof) }}"
                        class="h-72 w-full rounded-2xl border object-cover shadow hover:scale-105 transition">

                </a>

            @else

                <div class="flex h-72 items-center justify-center rounded-2xl border-2 border-dashed bg-slate-50">

                    <div class="text-center">

                        <i class="bi bi-image text-5xl text-slate-300"></i>

                        <p class="mt-3 text-sm text-slate-500">

                            Bukti pembayaran belum diupload

                        </p>

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>


@endsection