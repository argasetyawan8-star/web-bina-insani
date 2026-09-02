@extends('layouts.admin')

@section('title', 'Detail Pembayaran')

@section('content')

<div class="space-y-6">


    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div
        class="relative overflow-hidden rounded-[28px] bg-gradient-to-r from-[#2E3192] via-[#34389e] to-blue-700 p-6 text-white shadow-xl sm:p-8"
    >

        {{-- Decoration --}}
        <div
            class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-white/10 blur-3xl"
        ></div>

        <div
            class="pointer-events-none absolute -bottom-24 left-1/3 h-64 w-64 rounded-full bg-[#F6D21A]/10 blur-3xl"
        ></div>


        <div
            class="relative flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between"
        >

            <div>

                <span
                    class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs font-semibold text-blue-100 backdrop-blur sm:text-sm"
                >
                    <i class="bi bi-credit-card-fill"></i>
                    Detail Pembayaran
                </span>

                <h1
                    class="mt-4 text-2xl font-extrabold sm:text-3xl"
                >
                    Detail Pembayaran
                </h1>

                <p
                    class="mt-2 text-sm text-blue-100 sm:text-base"
                >
                    Informasi pembayaran peserta dan bukti transaksi.
                </p>

            </div>


            {{-- KEMBALI --}}
            <a
                href="{{ route('admin.payments.index') }}"
                class="inline-flex w-fit items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-[#2E3192] shadow-lg transition duration-300 hover:-translate-y-0.5 hover:bg-slate-100"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

        </div>

    </div>



    {{-- =========================================================
         INFORMASI PESERTA
    ========================================================== --}}

    <div
        class="overflow-hidden rounded-[26px] border border-slate-200 bg-white shadow-sm"
    >

        <div
            class="border-b border-slate-100 px-6 py-5 sm:px-8"
        >

            <div class="flex items-center gap-3">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]"
                >
                    <i class="bi bi-person-vcard-fill"></i>
                </div>

                <div>

                    <h2
                        class="text-lg font-extrabold text-slate-800 sm:text-xl"
                    >
                        Informasi Peserta
                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500"
                    >
                        Data peserta yang melakukan pembayaran.
                    </p>

                </div>

            </div>

        </div>


        <div
            class="grid gap-5 p-6 sm:grid-cols-2 sm:p-8"
        >

            {{-- NAMA --}}
            <div
                class="rounded-2xl bg-slate-50 p-5"
            >
                <p class="text-xs font-bold uppercase tracking-wide text-slate-400">
                    Nama Peserta
                </p>

                <h3
                    class="mt-2 text-lg font-bold text-slate-800"
                >
                    {{ $registration->full_name }}
                </h3>
            </div>


            {{-- PROGRAM --}}
            <div
                class="rounded-2xl bg-slate-50 p-5"
            >
                <p class="text-xs font-bold uppercase tracking-wide text-slate-400">
                    Program
                </p>

                <h3
                    class="mt-2 text-lg font-bold text-slate-800"
                >
                    {{ $registration->program->name ?? '-' }}
                </h3>
            </div>


            {{-- TANGGAL --}}
            <div
                class="rounded-2xl bg-slate-50 p-5"
            >
                <p class="text-xs font-bold uppercase tracking-wide text-slate-400">
                    Tanggal Pendaftaran
                </p>

                <h3
                    class="mt-2 text-lg font-semibold text-slate-800"
                >
                    {{ $registration->created_at?->format('d M Y H:i') ?? '-' }}
                </h3>
            </div>


            {{-- STATUS --}}
            <div
                class="rounded-2xl bg-slate-50 p-5"
            >

                <p class="text-xs font-bold uppercase tracking-wide text-slate-400">
                    Status Pembayaran
                </p>

                <div class="mt-3">

                    @if($registration->payment_status === 'waiting_verification')

                        <span
                            class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-4 py-2 text-sm font-bold text-orange-700"
                        >
                            <span class="h-2 w-2 rounded-full bg-orange-500"></span>
                            Menunggu Verifikasi
                        </span>

                    @elseif($registration->payment_status === 'paid')

                        <span
                            class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-sm font-bold text-green-700"
                        >
                            <span class="h-2 w-2 rounded-full bg-green-500"></span>
                            Sudah Dibayar
                        </span>

                    @elseif($registration->payment_status === 'rejected')

                        <span
                            class="inline-flex items-center gap-2 rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-700"
                        >
                            <span class="h-2 w-2 rounded-full bg-red-500"></span>
                            Ditolak
                        </span>

                    @else

                        <span
                            class="inline-flex items-center gap-2 rounded-full bg-slate-200 px-4 py-2 text-sm font-bold text-slate-700"
                        >
                            <span class="h-2 w-2 rounded-full bg-slate-500"></span>
                            Belum Bayar
                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================================
         DETAIL TRANSAKSI
    ========================================================== --}}

    <div
        class="overflow-hidden rounded-[26px] border border-slate-200 bg-white shadow-sm"
    >

        <div
            class="border-b border-slate-100 px-6 py-5 sm:px-8"
        >

            <div class="flex items-center gap-3">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-100 text-green-600"
                >
                    <i class="bi bi-wallet2"></i>
                </div>

                <div>

                    <h2
                        class="text-lg font-extrabold text-slate-800 sm:text-xl"
                    >
                        Detail Transaksi
                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500"
                    >
                        Informasi metode dan waktu pembayaran.
                    </p>

                </div>

            </div>

        </div>


        <div
            class="grid gap-5 p-6 sm:grid-cols-2 sm:p-8"
        >

            {{-- METODE --}}
            <div
                class="rounded-2xl bg-slate-50 p-5"
            >

                <p class="text-xs font-bold uppercase tracking-wide text-slate-400">
                    Metode Pembayaran
                </p>

                <div class="mt-3">

                    @if($registration->payment_method === 'qris')

                        <span
                            class="inline-flex items-center gap-2 rounded-xl bg-red-50 px-4 py-2.5 text-sm font-bold text-red-600"
                        >
                            <i class="bi bi-qr-code"></i>
                            QRIS
                        </span>

                    @elseif($registration->payment_method === 'transfer')

                        <span
                            class="inline-flex items-center gap-2 rounded-xl bg-blue-50 px-4 py-2.5 text-sm font-bold text-blue-600"
                        >
                            <i class="bi bi-bank"></i>
                            Transfer Bank
                        </span>

                    @else

                        <span
                            class="inline-flex items-center gap-2 rounded-xl bg-slate-100 px-4 py-2.5 text-sm font-bold text-slate-500"
                        >
                            <i class="bi bi-dash-circle"></i>
                            Belum Dipilih
                        </span>

                    @endif

                </div>

            </div>


            {{-- TANGGAL PEMBAYARAN --}}
            <div
                class="rounded-2xl bg-slate-50 p-5"
            >

                <p class="text-xs font-bold uppercase tracking-wide text-slate-400">
                    Waktu Pembayaran
                </p>

                <h3
                    class="mt-2 text-lg font-semibold text-slate-800"
                >
                    {{ $registration->updated_at?->format('d M Y H:i') ?? '-' }}
                </h3>

            </div>

        </div>

    </div>



    {{-- =========================================================
         BUKTI PEMBAYARAN
    ========================================================== --}}

    <div
        class="overflow-hidden rounded-[26px] border border-slate-200 bg-white shadow-sm"
    >

        <div
            class="border-b border-slate-100 px-6 py-5 sm:px-8"
        >

            <div class="flex items-center gap-3">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-600"
                >
                    <i class="bi bi-receipt-cutoff"></i>
                </div>

                <div>

                    <h2
                        class="text-lg font-extrabold text-slate-800 sm:text-xl"
                    >
                        Bukti Pembayaran
                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500"
                    >
                        Periksa bukti pembayaran sebelum melakukan verifikasi.
                    </p>

                </div>

            </div>

        </div>


        <div class="p-6 sm:p-8">

            @if($registration->payment_proof)

                <div
                    class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-50"
                >

                    <img
                        src="{{ asset('storage/'.$registration->payment_proof) }}"
                        alt="Bukti pembayaran {{ $registration->full_name }}"
                        class="h-auto max-h-[650px] w-full object-contain"
                    >

                </div>


                <div
                    class="mt-4"
                >

                    <a
                        href="{{ asset('storage/'.$registration->payment_proof) }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-700 shadow-sm transition hover:bg-slate-50"
                    >
                        <i class="bi bi-box-arrow-up-right"></i>
                        Buka Bukti Penuh
                    </a>

                </div>

            @else

                <div
                    class="flex flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50 px-6 py-16 text-center"
                >

                    <div
                        class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white text-slate-300 shadow-sm"
                    >
                        <i class="bi bi-image text-2xl"></i>
                    </div>


                    <h3
                        class="mt-5 text-lg font-bold text-slate-700"
                    >
                        Bukti Pembayaran Belum Ada
                    </h3>


                    <p
                        class="mt-2 max-w-md text-sm leading-6 text-slate-500"
                    >
                        Peserta belum mengunggah bukti pembayaran.
                    </p>

                </div>

            @endif

        </div>

    </div>



    {{-- =========================================================
         ACTION
    ========================================================== --}}

    @if($registration->payment_status === 'waiting_verification')

        <div
            class="rounded-[26px] border border-yellow-200 bg-yellow-50 p-5 sm:p-6"
        >

            <div
                class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between"
            >

                <div class="flex items-start gap-3">

                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-yellow-100 text-yellow-700"
                    >
                        <i class="bi bi-exclamation-circle-fill"></i>
                    </div>


                    <div>

                        <h3
                            class="font-bold text-yellow-800"
                        >
                            Pembayaran Menunggu Verifikasi
                        </h3>

                        <p
                            class="mt-1 text-sm leading-6 text-yellow-700"
                        >
                            Pastikan bukti pembayaran sudah sesuai sebelum
                            menerima atau menolak transaksi.
                        </p>

                    </div>

                </div>


                <div class="flex flex-col gap-3 sm:flex-row">

                    {{-- APPROVE --}}
                    <form
                        action="{{ route('admin.registrations.payment.approve', $registration->id) }}"
                        method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menyetujui pembayaran ini?')"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-green-600 px-5 py-3 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-green-700 sm:w-auto"
                        >
                            <i class="bi bi-check-circle-fill"></i>
                            Approve
                        </button>

                    </form>


                    {{-- REJECT --}}
                    <form
                        action="{{ route('admin.registrations.payment.reject', $registration->id) }}"
                        method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menolak pembayaran ini?')"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-red-600 px-5 py-3 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-red-700 sm:w-auto"
                        >
                            <i class="bi bi-x-circle-fill"></i>
                            Reject
                        </button>

                    </form>

                </div>

            </div>

        </div>

    @endif


</div>

@endsection
