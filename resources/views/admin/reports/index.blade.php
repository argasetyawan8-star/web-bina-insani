@extends('layouts.admin')

@section('title')
    Laporan
@endsection

@section('content')

<div class="space-y-6">


    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div
        class="relative overflow-hidden rounded-[28px] bg-gradient-to-r from-[#2E3192] via-[#34389e] to-blue-700 p-6 text-white shadow-xl sm:p-8"
    >

        {{-- DECORATION --}}
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
                    <i class="bi bi-file-earmark-bar-graph-fill"></i>
                    Laporan
                </span>


                <h1
                    class="mt-4 text-2xl font-extrabold sm:text-3xl lg:text-4xl"
                >
                    Laporan Peserta
                </h1>


                <p
                    class="mt-2 max-w-2xl text-sm leading-7 text-blue-100 sm:text-base"
                >
                    Filter data peserta berdasarkan program,
                    status pembayaran, dan periode pendaftaran.
                </p>

            </div>


            <div
                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/10 text-white backdrop-blur sm:h-16 sm:w-16"
            >
                <i class="bi bi-bar-chart-line-fill text-2xl sm:text-3xl"></i>
            </div>

        </div>

    </div>



    {{-- =========================================================
         FILTER + EXPORT
    ========================================================== --}}

    <div
        class="overflow-hidden rounded-[26px] border border-slate-200 bg-white shadow-sm"
    >

        {{-- HEADER FILTER --}}
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
                        Filter Laporan
                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500"
                    >
                        Tentukan data yang ingin ditampilkan pada laporan.
                    </p>

                </div>

            </div>

        </div>


        {{-- FILTER FORM --}}
        <form
            method="GET"
            class="grid gap-4 p-6 sm:grid-cols-2 lg:grid-cols-4"
        >

            {{-- PROGRAM --}}
            <div>

                <label
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Program
                </label>

                <select
                    name="program_id"
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-4 focus:ring-[#2E3192]/10"
                >

                    <option value="">
                        Semua Program
                    </option>

                    @foreach($programs as $program)

                        <option
                            value="{{ $program->id }}"
                            @selected((string) request('program_id') === (string) $program->id)
                        >
                            {{ $program->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- PAYMENT STATUS --}}
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
                        Semua Pembayaran
                    </option>

                    <option
                        value="paid"
                        @selected(request('payment_status') === 'paid')
                    >
                        Lunas
                    </option>

                    <option
                        value="waiting_verification"
                        @selected(request('payment_status') === 'waiting_verification')
                    >
                        Menunggu Verifikasi
                    </option>

                    <option
                        value="rejected"
                        @selected(request('payment_status') === 'rejected')
                    >
                        Ditolak
                    </option>

                </select>

            </div>


            {{-- DATE FROM --}}
            <div>

                <label
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Dari Tanggal
                </label>

                <div class="relative">

                    <i
                        class="bi bi-calendar-event pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"
                    ></i>

                    <input
                        type="date"
                        name="date_from"
                        value="{{ request('date_from') }}"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-11 pr-4 text-sm text-slate-700 outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-4 focus:ring-[#2E3192]/10"
                    >

                </div>

            </div>


            {{-- DATE TO --}}
            <div>

                <label
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Sampai Tanggal
                </label>

                <div class="relative">

                    <i
                        class="bi bi-calendar-check pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"
                    ></i>

                    <input
                        type="date"
                        name="date_to"
                        value="{{ request('date_to') }}"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-11 pr-4 text-sm text-slate-700 outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-4 focus:ring-[#2E3192]/10"
                    >

                </div>

            </div>


            {{-- FILTER BUTTON --}}
            <div
                class="flex flex-col gap-3 sm:col-span-2 lg:col-span-4 sm:flex-row sm:justify-end"
            >

                <a
                    href="{{ route('admin.reports.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-600 transition hover:bg-slate-50"
                >
                    <i class="bi bi-arrow-counterclockwise"></i>
                    Reset
                </a>


                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#2E3192] px-6 py-3 text-sm font-bold text-white shadow-lg transition duration-300 hover:-translate-y-0.5 hover:bg-blue-900 hover:shadow-xl"
                >
                    <i class="bi bi-funnel-fill"></i>
                    Terapkan Filter
                </button>

            </div>

        </form>


        {{-- =====================================================
             EXPORT
        ====================================================== --}}

        <div
            class="border-t border-slate-100 bg-slate-50/60 px-6 py-5 sm:px-8"
        >

            <div
                class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
            >

                <div>

                    <p
                        class="text-sm font-bold text-slate-800"
                    >
                        Export Laporan
                    </p>

                    <p
                        class="mt-1 text-xs leading-5 text-slate-500 sm:text-sm"
                    >
                        Download data sesuai dengan filter yang sedang digunakan.
                    </p>

                </div>


                <div
                    class="flex w-full flex-col gap-3 sm:w-auto sm:flex-row"
                >

                    {{-- PDF --}}
                    <a
                        href="{{ route('admin.reports.pdf', request()->query()) }}"
                        class="group inline-flex items-center justify-center gap-2 rounded-xl bg-red-600 px-5 py-3 text-sm font-bold text-white shadow-lg transition duration-300 hover:-translate-y-0.5 hover:bg-red-700 hover:shadow-xl"
                    >

                        <i
                            class="bi bi-file-earmark-pdf-fill text-lg"
                        ></i>

                        Export PDF

                        <i
                            class="bi bi-arrow-right transition group-hover:translate-x-1"
                        ></i>

                    </a>


                    {{-- EXCEL --}}
                    <a
                        href="{{ route('admin.reports.excel', request()->query()) }}"
                        class="group inline-flex items-center justify-center gap-2 rounded-xl bg-green-600 px-5 py-3 text-sm font-bold text-white shadow-lg transition duration-300 hover:-translate-y-0.5 hover:bg-green-700 hover:shadow-xl"
                    >

                        <i
                            class="bi bi-file-earmark-excel-fill text-lg"
                        ></i>

                        Export Excel

                        <i
                            class="bi bi-arrow-right transition group-hover:translate-x-1"
                        ></i>

                    </a>

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================================
         HASIL LAPORAN
    ========================================================== --}}

    <div
        class="flex flex-col gap-4 rounded-[24px] border border-blue-100 bg-blue-50 p-5 sm:flex-row sm:items-center sm:justify-between sm:p-6"
    >

        <div class="flex items-start gap-3">

            <div
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#2E3192] text-white"
            >
                <i class="bi bi-info-circle-fill"></i>
            </div>


            <div>

                <h3
                    class="font-bold text-slate-800"
                >
                    Hasil Laporan
                </h3>

                <p
                    class="mt-1 text-sm leading-6 text-slate-600"
                >
                    Menampilkan
                    <span class="font-bold text-[#2E3192]">
                        {{ $registrations->total() }}
                    </span>
                    data peserta sesuai filter yang dipilih.
                </p>

            </div>

        </div>


        <div
            class="inline-flex w-fit items-center gap-2 rounded-xl bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm"
        >

            <i class="bi bi-database text-[#2E3192]"></i>

            {{ $registrations->count() }} data halaman ini

        </div>

    </div>



    {{-- =========================================================
         TABLE
    ========================================================== --}}

    <div
        class="overflow-hidden rounded-[26px] border border-slate-200 bg-white shadow-sm"
    >

        {{-- HEADER TABLE --}}
        <div
            class="flex flex-col gap-4 border-b border-slate-100 p-6 sm:flex-row sm:items-center sm:justify-between sm:p-7"
        >

            <div>

                <p
                    class="text-xs font-bold uppercase tracking-[0.2em] text-[#2E3192]"
                >
                    Data Laporan
                </p>

                <h2
                    class="mt-1 text-xl font-extrabold text-slate-800"
                >
                    Daftar Peserta
                </h2>

                <p
                    class="mt-1 text-sm text-slate-500"
                >
                    Data peserta berdasarkan filter yang dipilih.
                </p>

            </div>


            <div
                class="inline-flex w-fit items-center gap-2 rounded-xl bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-600"
            >

                <i class="bi bi-list-check text-[#2E3192]"></i>

                {{ $registrations->count() }} data

            </div>

        </div>


        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table
                class="w-full min-w-[900px] text-sm"
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
                            Pembayaran
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400"
                        >
                            Status Peserta
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400"
                        >
                            Tanggal
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($registrations as $item)

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
                                        class="max-w-[220px] truncate font-medium text-slate-700"
                                    >
                                        {{ $item->program->name ?? '-' }}
                                    </p>

                                </div>

                            </td>


                            {{-- PEMBAYARAN --}}
                            <td class="px-6 py-5">

                                @if($item->payment_status === 'paid')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700"
                                    >
                                        <span
                                            class="h-1.5 w-1.5 rounded-full bg-green-500"
                                        ></span>

                                        Lunas
                                    </span>

                                @elseif($item->payment_status === 'waiting_verification')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-3 py-1.5 text-xs font-bold text-orange-700"
                                    >
                                        <span
                                            class="h-1.5 w-1.5 rounded-full bg-orange-500"
                                        ></span>

                                        Menunggu
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


                            {{-- STATUS PESERTA --}}
                            <td class="px-6 py-5">

                                @if($item->status === 'verified')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-3 py-1.5 text-xs font-bold text-blue-700"
                                    >
                                        <i class="bi bi-check-circle-fill"></i>
                                        Terverifikasi
                                    </span>

                                @elseif($item->status === 'rejected')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-red-100 px-3 py-1.5 text-xs font-bold text-red-700"
                                    >
                                        <i class="bi bi-x-circle-fill"></i>
                                        Ditolak
                                    </span>

                                @else

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-3 py-1.5 text-xs font-bold text-orange-700"
                                    >
                                        <i class="bi bi-clock-fill"></i>
                                        Menunggu
                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL --}}
                            <td class="px-6 py-5">

                                @if($item->created_at)

                                    <p
                                        class="font-medium text-slate-700"
                                    >
                                        {{ $item->created_at->format('d M Y') }}
                                    </p>

                                    <p
                                        class="mt-0.5 text-xs text-slate-400"
                                    >
                                        {{ $item->created_at->format('H:i') }}
                                    </p>

                                @else

                                    <span class="text-slate-400">
                                        -
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-16 text-center"
                            >

                                <div
                                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400"
                                >
                                    <i class="bi bi-file-earmark-x text-2xl"></i>
                                </div>


                                <h3
                                    class="mt-5 text-lg font-bold text-slate-700"
                                >
                                    Tidak Ada Data
                                </h3>


                                <p
                                    class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500"
                                >
                                    Tidak ditemukan data peserta yang sesuai
                                    dengan filter laporan.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($registrations->hasPages())

            <div
                class="border-t border-slate-100 px-6 py-5 sm:px-7"
            >

                {{ $registrations->links() }}

            </div>

        @endif

    </div>

</div>

@endsection