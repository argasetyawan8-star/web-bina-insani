
@extends('layouts.admin')

@section('title')
    Verifikasi Pembayaran
@endsection

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
            class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between"
        >

            <div class="min-w-0">

                <span
                    class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs font-semibold text-blue-100 backdrop-blur sm:text-sm"
                >
                    <i class="bi bi-credit-card-fill"></i>
                    Manajemen Pembayaran
                </span>


                <h1
                    class="mt-4 text-2xl font-extrabold sm:text-3xl lg:text-4xl"
                >
                    Verifikasi Pembayaran
                </h1>


                <p
                    class="mt-2 max-w-2xl text-sm leading-7 text-blue-100 sm:text-base"
                >
                    Periksa bukti pembayaran peserta dan kelola status
                    pembayaran pendaftaran Bina Insani.
                </p>

            </div>


            <div
                class="flex items-center gap-4 rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur sm:p-5 lg:shrink-0"
            >

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-white text-[#2E3192]"
                >
                    <i class="bi bi-wallet2 text-xl"></i>
                </div>


                <div>

                    <p class="text-xs text-blue-100">
                        Total Pembayaran
                    </p>

                    <p
                        class="mt-1 text-2xl font-black"
                    >
                        {{ $total }}
                    </p>

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================================
         STATISTIK PEMBAYARAN
    ========================================================== --}}

    <div>

        <div class="mb-5">

            <p
                class="text-xs font-bold uppercase tracking-[0.2em] text-[#2E3192]"
            >
                Ringkasan
            </p>

            <h2
                class="mt-1 text-xl font-extrabold text-slate-800 sm:text-2xl"
            >
                Status Pembayaran
            </h2>

        </div>


        <div
            class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4"
        >


            {{-- MENUNGGU --}}
            <div
                class="group rounded-[24px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p
                            class="text-sm text-slate-500"
                        >
                            Menunggu Verifikasi
                        </p>

                        <h3
                            class="mt-2 text-3xl font-black text-slate-800"
                        >
                            {{ $waiting }}
                        </h3>

                        <p
                            class="mt-2 text-xs font-medium text-orange-500"
                        >
                            Perlu diperiksa
                        </p>

                    </div>


                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-orange-100 text-orange-600 transition group-hover:scale-110"
                    >
                        <i class="bi bi-hourglass-split text-xl"></i>
                    </div>

                </div>

            </div>



            {{-- LUNAS --}}
            <div
                class="group rounded-[24px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-sm text-slate-500">
                            Sudah Lunas
                        </p>

                        <h3
                            class="mt-2 text-3xl font-black text-slate-800"
                        >
                            {{ $paid }}
                        </h3>

                        <p
                            class="mt-2 text-xs font-medium text-green-600"
                        >
                            Pembayaran diterima
                        </p>

                    </div>


                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-green-600 transition group-hover:scale-110"
                    >
                        <i class="bi bi-check-circle-fill text-xl"></i>
                    </div>

                </div>

            </div>



            {{-- DITOLAK --}}
            <div
                class="group rounded-[24px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-sm text-slate-500">
                            Ditolak
                        </p>

                        <h3
                            class="mt-2 text-3xl font-black text-slate-800"
                        >
                            {{ $rejected }}
                        </h3>

                        <p
                            class="mt-2 text-xs font-medium text-red-500"
                        >
                            Perlu pembayaran ulang
                        </p>

                    </div>


                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-red-100 text-red-600 transition group-hover:scale-110"
                    >
                        <i class="bi bi-x-circle-fill text-xl"></i>
                    </div>

                </div>

            </div>



            {{-- TOTAL --}}
            <div
                class="group rounded-[24px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-sm text-slate-500">
                            Total Pembayaran
                        </p>

                        <h3
                            class="mt-2 text-3xl font-black text-slate-800"
                        >
                            {{ $total }}
                        </h3>

                        <p
                            class="mt-2 text-xs font-medium text-[#2E3192]"
                        >
                            Seluruh transaksi
                        </p>

                    </div>


                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192] transition group-hover:scale-110"
                    >
                        <i class="bi bi-credit-card-2-front-fill text-xl"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================================
         FILTER
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
                    <i class="bi bi-funnel-fill"></i>
                </div>


                <div>

                    <h2
                        class="text-lg font-extrabold text-slate-800 sm:text-xl"
                    >
                        Filter Pembayaran
                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500"
                    >
                        Cari dan filter transaksi pembayaran peserta.
                    </p>

                </div>

            </div>

        </div>


        <form
            method="GET"
            class="grid gap-4 p-6 sm:grid-cols-2 lg:grid-cols-3"
        >

            {{-- SEARCH --}}
            <div>

                <label
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Cari Peserta
                </label>

                <div class="relative">

                    <i
                        class="bi bi-search pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"
                    ></i>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama peserta..."
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-11 pr-4 text-sm text-slate-700 outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-4 focus:ring-[#2E3192]/10"
                    >

                </div>

            </div>


            {{-- STATUS --}}
            <div>

                <label
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Status Pembayaran
                </label>

                <select
                    name="payment_status"
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-4 focus:ring-[#2E3192]/10"
                >

                    <option value="">
                        Semua Status
                    </option>

                    <option
                        value="waiting_verification"
                        @selected(request('payment_status') === 'waiting_verification')
                    >
                        Menunggu Verifikasi
                    </option>

                    <option
                        value="paid"
                        @selected(request('payment_status') === 'paid')
                    >
                        Lunas
                    </option>

                    <option
                        value="rejected"
                        @selected(request('payment_status') === 'rejected')
                    >
                        Ditolak
                    </option>

                </select>

            </div>


            {{-- ACTION --}}
            <div
                class="flex items-end gap-3"
            >

                <a
                    href="{{ route('admin.payments.index') }}"
                    class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-600 transition hover:bg-slate-50 sm:flex-none"
                >
                    <i class="bi bi-arrow-counterclockwise"></i>
                    Reset
                </a>


                <button
                    type="submit"
                    class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-[#2E3192] px-5 py-3 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-900 sm:flex-none"
                >
                    <i class="bi bi-search"></i>
                    Filter
                </button>

            </div>

        </form>

    </div>



    {{-- =========================================================
         DAFTAR PEMBAYARAN
    ========================================================== --}}

    <div
        class="overflow-hidden rounded-[26px] border border-slate-200 bg-white shadow-sm"
    >

        {{-- HEADER --}}
        <div
            class="flex flex-col gap-4 border-b border-slate-100 p-6 sm:flex-row sm:items-center sm:justify-between sm:p-7"
        >

            <div>

                <p
                    class="text-xs font-bold uppercase tracking-[0.2em] text-[#2E3192]"
                >
                    Transaksi
                </p>

                <h2
                    class="mt-1 text-xl font-extrabold text-slate-800"
                >
                    Daftar Pembayaran
                </h2>

                <p
                    class="mt-1 text-sm text-slate-500"
                >
                    Periksa bukti dan lakukan verifikasi pembayaran peserta.
                </p>

            </div>


            <div
                class="inline-flex w-fit items-center gap-2 rounded-xl bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-600"
            >

                <i class="bi bi-receipt text-[#2E3192]"></i>

                {{ $payments->count() }} transaksi

            </div>

        </div>



        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table
                class="w-full min-w-[1050px] text-sm"
            >

                <thead>

                    <tr
                        class="border-b border-slate-100 bg-slate-50"
                    >

                        <th
                            class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400"
                        >
                            Peserta
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400"
                        >
                            Program
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400"
                        >
                            Metode
                        </th>

                        <th
                            class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-400"
                        >
                            Bukti
                        </th>

                        <th
                            class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-400"
                        >
                            Status
                        </th>

                        <th
                            class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-400"
                        >
                            Tanggal
                        </th>

                        <th
                            class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-400"
                        >
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($payments as $item)

                        <tr
                            class="border-b border-slate-100 transition hover:bg-slate-50 last:border-b-0"
                        >

                            {{-- PESERTA --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 font-bold text-[#2E3192]"
                                    >
                                        {{ strtoupper(substr($item->full_name, 0, 1)) }}
                                    </div>


                                    <div class="min-w-0">

                                        <p
                                            class="max-w-[220px] truncate font-bold text-slate-800"
                                        >
                                            {{ $item->full_name }}
                                        </p>

                                        <p
                                            class="mt-1 max-w-[220px] truncate text-xs text-slate-400"
                                        >
                                            {{ $item->email ?? '-' }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- PROGRAM --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-2">

                                    <div
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600"
                                    >
                                        <i class="bi bi-mortarboard-fill"></i>
                                    </div>

                                    <p
                                        class="max-w-[200px] truncate font-medium text-slate-700"
                                    >
                                        {{ $item->program->name ?? '-' }}
                                    </p>

                                </div>

                            </td>


                            {{-- METODE --}}
                            <td class="px-6 py-5">

                                @if($item->payment_method === 'qris')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-xl bg-red-50 px-3 py-2 text-xs font-bold text-red-600"
                                    >
                                        <i class="bi bi-qr-code"></i>
                                        QRIS
                                    </span>

                                @elseif($item->payment_method === 'transfer')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-xl bg-blue-50 px-3 py-2 text-xs font-bold text-blue-600"
                                    >
                                        <i class="bi bi-bank"></i>
                                        Transfer Bank
                                    </span>

                                @else

                                    <span
                                        class="inline-flex items-center gap-2 rounded-xl bg-slate-100 px-3 py-2 text-xs font-bold text-slate-600"
                                    >
                                        <i class="bi bi-dash-circle"></i>
                                        Belum Dipilih
                                    </span>

                                @endif

                            </td>


                            {{-- BUKTI --}}
                            <td class="px-6 py-5 text-center">

                                @if($item->payment_proof)

                                    <a
                                        href="{{ route('admin.payments.show', $item->id) }}"
                                        class="inline-flex items-center gap-2 rounded-xl bg-[#2E3192] px-4 py-2.5 text-xs font-bold text-white transition hover:-translate-y-0.5 hover:bg-blue-900"
                                    >
                                        <i class="bi bi-eye-fill"></i>
                                        Lihat Bukti
                                    </a>

                                @else

                                    <span
                                        class="inline-flex items-center gap-2 rounded-xl bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-400"
                                    >
                                        <i class="bi bi-image"></i>
                                        Tidak Ada
                                    </span>

                                @endif

                            </td>


                            {{-- STATUS --}}
                            <td class="px-6 py-5 text-center">

                                @if($item->payment_status === 'waiting_verification')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-3 py-1.5 text-xs font-bold text-orange-700"
                                    >
                                        <span
                                            class="h-1.5 w-1.5 rounded-full bg-orange-500"
                                        ></span>

                                        Menunggu
                                    </span>

                                @elseif($item->payment_status === 'paid')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700"
                                    >
                                        <span
                                            class="h-1.5 w-1.5 rounded-full bg-green-500"
                                        ></span>

                                        Lunas
                                    </span>

                                @elseif($item->payment_status === 'rejected')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-red-100 px-3 py-1.5 text-xs font-bold text-red-700"
                                    >
                                        <span
                                            class="h-1.5 w-1.5 rounded-full bg-red-500"
                                        ></span>

                                        Ditolak
                                    </span>

                                @else

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-600"
                                    >
                                        <span
                                            class="h-1.5 w-1.5 rounded-full bg-slate-400"
                                        ></span>

                                        Belum Bayar
                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL --}}
                            <td class="px-6 py-5 text-center">

                                @if($item->updated_at)

                                    <p
                                        class="font-medium text-slate-700"
                                    >
                                        {{ $item->updated_at->format('d M Y') }}
                                    </p>

                                    <p
                                        class="mt-0.5 text-xs text-slate-400"
                                    >
                                        {{ $item->updated_at->format('H:i') }}
                                    </p>

                                @else

                                    <span class="text-slate-400">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td class="px-6 py-5 text-center">

                                @if($item->payment_status === 'waiting_verification')

                                    <div
                                        class="flex items-center justify-center gap-2"
                                    >

                                        {{-- APPROVE --}}
                                        <form
                                            action="{{ route('admin.registrations.payment.approve', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menyetujui pembayaran ini?')"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                title="Verifikasi pembayaran"
                                                class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-green-600 text-white transition hover:-translate-y-0.5 hover:bg-green-700"
                                            >
                                                <i class="bi bi-check-lg text-lg"></i>
                                            </button>

                                        </form>


                                        {{-- REJECT --}}
                                        <form
                                            action="{{ route('admin.registrations.payment.reject', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menolak pembayaran ini?')"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                title="Tolak pembayaran"
                                                class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-red-600 text-white transition hover:-translate-y-0.5 hover:bg-red-700"
                                            >
                                                <i class="bi bi-x-lg text-lg"></i>
                                            </button>

                                        </form>

                                    </div>

                                @elseif($item->payment_status === 'paid')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-xl bg-green-50 px-3 py-2 text-xs font-bold text-green-600"
                                    >
                                        <i class="bi bi-check-circle-fill"></i>
                                        Selesai
                                    </span>

                                @elseif($item->payment_status === 'rejected')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-xl bg-red-50 px-3 py-2 text-xs font-bold text-red-600"
                                    >
                                        <i class="bi bi-x-circle-fill"></i>
                                        Ditolak
                                    </span>

                                @else

                                    <span
                                        class="text-xs font-medium text-slate-400"
                                    >
                                        Belum Diproses
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="px-6 py-16 text-center"
                            >

                                <div
                                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400"
                                >
                                    <i class="bi bi-credit-card-2-front text-2xl"></i>
                                </div>


                                <h3
                                    class="mt-5 text-lg font-bold text-slate-700"
                                >
                                    Belum Ada Pembayaran
                                </h3>


                                <p
                                    class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500"
                                >
                                    Belum ada data pembayaran yang sesuai dengan
                                    filter yang dipilih.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($payments->hasPages())

            <div
                class="border-t border-slate-100 px-6 py-5 sm:px-7"
            >

                {{ $payments->links() }}

            </div>

        @endif

    </div>

</div>

@endsection
