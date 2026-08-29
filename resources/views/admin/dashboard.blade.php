@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="space-y-8">


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
            class="pointer-events-none absolute -bottom-28 left-1/3 h-64 w-64 rounded-full bg-[#F6D21A]/10 blur-3xl"
        ></div>


        <div
            class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between"
        >

            <div>

                <span
                    class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs font-semibold text-blue-100"
                >
                    <i class="bi bi-speedometer2"></i>
                    Admin Dashboard
                </span>


                <h1
                    class="mt-4 text-2xl font-extrabold sm:text-3xl lg:text-4xl"
                >
                    Selamat datang,
                    <span class="text-[#F6D21A]">
                        {{ Auth::user()->name }}
                    </span>
                </h1>


                <p
                    class="mt-3 max-w-2xl text-sm leading-7 text-blue-100 sm:text-base"
                >
                    Kelola peserta, pendaftaran, pembayaran, dan
                    program pelatihan Bina Insani melalui dashboard admin.
                </p>

            </div>


            {{-- QUICK ACTION --}}
            <div class="flex flex-col gap-3 sm:flex-row">

                <a
                    href="{{ route('admin.registrations.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 font-bold text-[#2E3192] shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-xl"
                >
                    <i class="bi bi-people-fill"></i>
                    Data Peserta
                </a>


                <a
                    href="{{ route('admin.programs.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/10 px-5 py-3 font-bold text-white transition duration-300 hover:-translate-y-1 hover:bg-white/20"
                >
                    <i class="bi bi-mortarboard-fill"></i>
                    Program
                </a>

            </div>

        </div>

    </div>



    {{-- =========================================================
         STATISTIK
    ========================================================== --}}

    <div>

        <div class="mb-5">

            <p
                class="text-xs font-bold uppercase tracking-[0.2em] text-[#2E3192]"
            >
                Ringkasan
            </p>

            <h2
                class="mt-1 text-2xl font-extrabold text-slate-800"
            >
                Statistik Dashboard
            </h2>

        </div>


        <div
            class="grid gap-4 sm:grid-cols-2 xl:grid-cols-5"
        >


            {{-- TOTAL PESERTA --}}
            <div
                class="group rounded-[24px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-sm text-slate-500">
                            Total Peserta
                        </p>

                        <h3
                            class="mt-2 text-3xl font-black text-slate-800"
                        >
                            {{ $totalPeserta }}
                        </h3>

                        <p class="mt-2 text-xs font-medium text-[#2E3192]">
                            Seluruh pendaftar
                        </p>

                    </div>


                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192] transition group-hover:scale-110"
                    >
                        <i class="bi bi-people-fill text-xl"></i>
                    </div>

                </div>

            </div>



            {{-- MENUNGGU VERIFIKASI --}}
            <div
                class="group rounded-[24px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-sm text-slate-500">
                            Menunggu Verifikasi
                        </p>

                        <h3
                            class="mt-2 text-3xl font-black text-slate-800"
                        >
                            {{ $menungguVerifikasi }}
                        </h3>

                        <p class="mt-2 text-xs font-medium text-orange-500">
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



            {{-- PEMBAYARAN LUNAS --}}
            <div
                class="group rounded-[24px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-sm text-slate-500">
                            Pembayaran Lunas
                        </p>

                        <h3
                            class="mt-2 text-3xl font-black text-slate-800"
                        >
                            {{ $pesertaPaid }}
                        </h3>

                        <p class="mt-2 text-xs font-medium text-green-600">
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



            {{-- PESERTA AKTIF --}}
            <div
                class="group rounded-[24px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-sm text-slate-500">
                            Peserta Aktif
                        </p>

                        <h3
                            class="mt-2 text-3xl font-black text-slate-800"
                        >
                            {{ $pesertaVerified }}
                        </h3>

                        <p class="mt-2 text-xs font-medium text-indigo-600">
                            Sudah diverifikasi
                        </p>

                    </div>


                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-indigo-100 text-indigo-600 transition group-hover:scale-110"
                    >
                        <i class="bi bi-person-check-fill text-xl"></i>
                    </div>

                </div>

            </div>



            {{-- PROGRAM AKTIF --}}
            <div
                class="group rounded-[24px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-sm text-slate-500">
                            Program Aktif
                        </p>

                        <h3
                            class="mt-2 text-3xl font-black text-slate-800"
                        >
                            {{ $programAktif }}
                        </h3>

                        <p class="mt-2 text-xs font-medium text-blue-600">
                            Program tersedia
                        </p>

                    </div>


                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-blue-600 transition group-hover:scale-110"
                    >
                        <i class="bi bi-mortarboard-fill text-xl"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================================
     GRAFIK PESERTA
========================================================= --}}

<div
    class="overflow-hidden rounded-[26px] border border-slate-200 bg-white shadow-sm"
>

    {{-- HEADER --}}
    <div
        class="border-b border-slate-100 px-6 py-5 sm:px-8"
    >

        <p
            class="text-xs font-bold uppercase tracking-[0.2em] text-[#2E3192]"
        >
            Statistik
        </p>

        <h2
            class="mt-1 text-xl font-extrabold text-slate-800"
        >
            Statistik Peserta
        </h2>

        <p
            class="mt-1 text-sm text-slate-500"
        >
            Jumlah peserta pada setiap program pelatihan.
        </p>

    </div>


    {{-- CHART --}}
    <div class="p-6 sm:p-8">

        @if($programStats->count() > 0)

            <div class="h-[320px] w-full">

                <canvas id="programChart"></canvas>

            </div>

        @else

            <div
                class="flex h-[320px] flex-col items-center justify-center rounded-2xl border border-dashed border-slate-200 bg-slate-50 text-center"
            >

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-slate-400 shadow-sm"
                >
                    <i class="bi bi-graph-up text-2xl"></i>
                </div>

                <h3
                    class="mt-4 font-bold text-slate-700"
                >
                    Belum Ada Data
                </h3>

                <p
                    class="mt-1 text-sm text-slate-500"
                >
                    Grafik akan muncul setelah terdapat peserta.
                </p>

            </div>

        @endif

    </div>

</div>


{{-- =========================================================
     CHART.JS
========================================================= --}}

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const canvas = document.getElementById('programChart');

    if (!canvas) {
        return;
    }


    const labels = @json(
        $programStats->pluck('name')->values()
    );

    const data = @json(
        $programStats->pluck('registrations_count')->values()
    );


    new Chart(canvas, {

        type: 'line',

        data: {

            labels: labels,

            datasets: [

                {

                    label: 'Jumlah Peserta',

                    data: data,

                    borderColor: '#2E3192',

                    backgroundColor: 'rgba(46, 49, 146, 0.08)',

                    borderWidth: 3,

                    pointBackgroundColor: '#2E3192',

                    pointBorderColor: '#ffffff',

                    pointBorderWidth: 3,

                    pointRadius: 5,

                    pointHoverRadius: 7,

                    tension: 0.4,

                    fill: true

                }

            ]

        },


        options: {

            responsive: true,

            maintainAspectRatio: false,


            interaction: {

                intersect: false,

                mode: 'index'

            },


            scales: {

                y: {

                    beginAtZero: true,

                    ticks: {

                        precision: 0

                    },

                    grid: {

                        color: 'rgba(148, 163, 184, 0.15)'

                    }

                },


                x: {

                    grid: {

                        display: false

                    }

                }

            },


            plugins: {

                legend: {

                    display: false

                },


                tooltip: {

                    padding: 12,

                    displayColors: false,

                    callbacks: {

                        label: function (context) {

                            return context.raw + ' peserta';

                        }

                    }

                }

            }

        }

    });

});

</script>

@endpush



    {{-- =========================================================
         PENDAFTARAN TERBARU
    ========================================================== --}}

    <div
        class="overflow-hidden rounded-[26px] border border-slate-200 bg-white shadow-sm"
    >

        {{-- HEADER --}}
        <div
            class="flex flex-col gap-4 border-b border-slate-100 p-6 sm:flex-row sm:items-center sm:justify-between"
        >

            <div>

                <p
                    class="text-xs font-bold uppercase tracking-[0.2em] text-[#2E3192]"
                >
                    Aktivitas
                </p>

                <h2
                    class="mt-1 text-xl font-extrabold text-slate-800"
                >
                    Pendaftaran Terbaru
                </h2>

                <p
                    class="mt-1 text-sm text-slate-500"
                >
                    Peserta yang baru saja melakukan pendaftaran.
                </p>

            </div>


            <a
                href="{{ route('admin.registrations.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-bold text-slate-700 transition hover:border-[#2E3192]/20 hover:bg-[#2E3192]/5 hover:text-[#2E3192]"
            >

                Lihat Semua

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>



        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table
                class="w-full min-w-[720px] text-sm"
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
                            Status
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-400"
                        >
                            Tanggal
                        </th>

                        <th
                            class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-400"
                        >
                            Detail
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($recentRegistrations as $item)

                        <tr
                            class="border-b border-slate-100 transition hover:bg-slate-50 last:border-b-0"
                        >

                            {{-- PESERTA --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 font-bold text-[#2E3192]"
                                    >
                                        {{ strtoupper(substr($item->full_name, 0, 1)) }}
                                    </div>


                                    <div class="min-w-0">

                                        <p
                                            class="max-w-[180px] truncate font-bold text-slate-800"
                                        >
                                            {{ $item->full_name }}
                                        </p>

                                        <p
                                            class="mt-0.5 text-xs text-slate-400"
                                        >
                                            {{ $item->registration_code ?? '-' }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- PROGRAM --}}
                            <td class="px-6 py-5">

                                <p
                                    class="max-w-[220px] truncate font-medium text-slate-700"
                                >
                                    {{ $item->program->name ?? '-' }}
                                </p>

                            </td>


                            {{-- STATUS --}}
                            <td class="px-6 py-5">

                                @if($item->payment_status === 'waiting_verification')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-3 py-1.5 text-xs font-bold text-orange-700"
                                    >
                                        <span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span>
                                        Menunggu
                                    </span>

                                @elseif($item->payment_status === 'paid')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700"
                                    >
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                        Lunas
                                    </span>

                                @elseif($item->payment_status === 'rejected')

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-red-100 px-3 py-1.5 text-xs font-bold text-red-700"
                                    >
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                        Ditolak
                                    </span>

                                @else

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-600"
                                    >
                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                        Belum Bayar
                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL --}}
                            <td class="px-6 py-5">

                                <p class="font-medium text-slate-700">
                                    {{ $item->created_at?->format('d M Y') ?? '-' }}
                                </p>

                                <p class="mt-0.5 text-xs text-slate-400">
                                    {{ $item->created_at?->format('H:i') ?? '-' }}
                                </p>

                            </td>


                            {{-- DETAIL --}}
                            <td class="px-6 py-5 text-right">

                                <a
                                    href="{{ route('admin.registrations.show', $item->id) }}"
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition hover:bg-[#2E3192] hover:text-white"
                                    title="Lihat detail"
                                >
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-14 text-center"
                            >

                                <div
                                    class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400"
                                >
                                    <i class="bi bi-inbox text-2xl"></i>
                                </div>

                                <p
                                    class="mt-4 font-bold text-slate-700"
                                >
                                    Belum ada pendaftaran
                                </p>

                                <p
                                    class="mt-1 text-sm text-slate-500"
                                >
                                    Data pendaftaran peserta akan muncul di sini.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>



    {{-- =========================================================
         STATISTIK PROGRAM
    ========================================================== --}}

    <div
        class="rounded-[26px] border border-slate-200 bg-white p-6 shadow-sm sm:p-8"
    >

        <div>

            <p
                class="text-xs font-bold uppercase tracking-[0.2em] text-[#2E3192]"
            >
                Distribusi
            </p>

            <h2
                class="mt-1 text-xl font-extrabold text-slate-800"
            >
                Statistik Program
            </h2>

            <p
                class="mt-1 text-sm text-slate-500"
            >
                Jumlah peserta pada setiap program.
            </p>

        </div>


        <div
            class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3"
        >

            @forelse($programStats as $program)

                <div
                    class="rounded-2xl border border-slate-100 bg-slate-50 p-5 transition duration-300 hover:border-[#2E3192]/20 hover:bg-white hover:shadow-md"
                >

                    <div
                        class="flex items-start justify-between gap-4"
                    >

                        <div class="min-w-0">

                            <p
                                class="truncate font-bold text-slate-800"
                            >
                                {{ $program->name }}
                            </p>

                            <p
                                class="mt-1 text-xs text-slate-400"
                            >
                                Peserta terdaftar
                            </p>

                        </div>


                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]"
                        >
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                    </div>


                    <div
                        class="mt-5 flex items-end justify-between"
                    >

                        <div>

                            <p
                                class="text-3xl font-black text-[#2E3192]"
                            >
                                {{ $program->registrations_count }}
                            </p>

                            <p
                                class="text-xs font-medium text-slate-400"
                            >
                                peserta
                            </p>

                        </div>


                        <i
                            class="bi bi-people-fill text-2xl text-slate-300"
                        ></i>

                    </div>

                </div>

            @empty

                <div
                    class="sm:col-span-2 lg:col-span-3"
                >

                    <div
                        class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-10 text-center"
                    >

                        <i
                            class="bi bi-mortarboard text-4xl text-slate-300"
                        ></i>

                        <p
                            class="mt-3 font-bold text-slate-700"
                        >
                            Belum ada program
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>



    {{-- =========================================================
         QUICK ACCESS
    ========================================================== --}}

    <div>

        <div class="mb-5">

            <p
                class="text-xs font-bold uppercase tracking-[0.2em] text-[#2E3192]"
            >
                Akses Cepat
            </p>

            <h2
                class="mt-1 text-xl font-extrabold text-slate-800"
            >
                Kelola Sistem
            </h2>

        </div>


        <div
            class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4"
        >


            {{-- DATA PESERTA --}}
            <a
                href="{{ route('admin.registrations.index') }}"
                class="group rounded-[22px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-[#2E3192]/20 hover:shadow-lg"
            >

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192] transition group-hover:scale-110"
                >
                    <i class="bi bi-people-fill"></i>
                </div>

                <h3
                    class="mt-4 font-bold text-slate-800"
                >
                    Data Peserta
                </h3>

                <p
                    class="mt-1 text-sm leading-6 text-slate-500"
                >
                    Kelola dan verifikasi pendaftaran peserta.
                </p>

                <span
                    class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-[#2E3192]"
                >
                    Buka
                    <i
                        class="bi bi-arrow-right transition group-hover:translate-x-1"
                    ></i>
                </span>

            </a>



            {{-- PEMBAYARAN --}}
            <a
                href="{{ route('admin.payments.index') }}"
                class="group rounded-[22px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-green-200 hover:shadow-lg"
            >

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-100 text-green-600 transition group-hover:scale-110"
                >
                    <i class="bi bi-credit-card-fill"></i>
                </div>

                <h3
                    class="mt-4 font-bold text-slate-800"
                >
                    Pembayaran
                </h3>

                <p
                    class="mt-1 text-sm leading-6 text-slate-500"
                >
                    Periksa dan verifikasi pembayaran peserta.
                </p>

                <span
                    class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-green-600"
                >
                    Buka
                    <i
                        class="bi bi-arrow-right transition group-hover:translate-x-1"
                    ></i>
                </span>

            </a>



            {{-- PROGRAM --}}
            <a
                href="{{ route('admin.programs.index') }}"
                class="group rounded-[22px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg"
            >

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-600 transition group-hover:scale-110"
                >
                    <i class="bi bi-mortarboard-fill"></i>
                </div>

                <h3
                    class="mt-4 font-bold text-slate-800"
                >
                    Program Diklat
                </h3>

                <p
                    class="mt-1 text-sm leading-6 text-slate-500"
                >
                    Atur program pelatihan yang tersedia.
                </p>

                <span
                    class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-blue-600"
                >
                    Buka
                    <i
                        class="bi bi-arrow-right transition group-hover:translate-x-1"
                    ></i>
                </span>

            </a>



            {{-- SETTINGS --}}
            <a
                href="{{ route('admin.settings.index') }}"
                class="group rounded-[22px] border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-yellow-200 hover:shadow-lg"
            >

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#F6D21A]/25 text-[#2E3192] transition group-hover:scale-110"
                >
                    <i class="bi bi-gear-fill"></i>
                </div>

                <h3
                    class="mt-4 font-bold text-slate-800"
                >
                    Pengaturan Website
                </h3>

                <p
                    class="mt-1 text-sm leading-6 text-slate-500"
                >
                    Atur konten dan konfigurasi website.
                </p>

                <span
                    class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-[#2E3192]"
                >
                    Buka
                    <i
                        class="bi bi-arrow-right transition group-hover:translate-x-1"
                    ></i>
                </span>

            </a>

        </div>

    </div>

</div>



{{-- =========================================================
     CHART.JS
========================================================= --}}

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const canvas = document.getElementById('programChart');

        if (!canvas) {
            return;
        }


        const labels = @json(
            $programStats->pluck('name')->values()
        );

        const data = @json(
            $programStats->pluck('registrations_count')->values()
        );


        new Chart(canvas, {

            type: 'bar',

            data: {

                labels: labels,

                datasets: [
                    {
                        label: 'Peserta',

                        data: data,

                        backgroundColor: '#2E3192',

                        borderRadius: 10,

                        borderSkipped: false,

                        maxBarThickness: 55
                    }
                ]

            },


            options: {

                responsive: true,

                maintainAspectRatio: false,


                scales: {

                    y: {

                        beginAtZero: true,

                        ticks: {
                            precision: 0
                        },

                        grid: {
                            color: 'rgba(148, 163, 184, 0.15)'
                        }

                    },


                    x: {

                        grid: {
                            display: false
                        }

                    }

                },


                plugins: {

                    legend: {
                        display: false
                    },


                    tooltip: {

                        callbacks: {

                            label: function (context) {

                                return context.raw + ' peserta';

                            }

                        }

                    }

                }

            }

        });

    });
</script>

@endpush

@endsection

@stack('scripts')





</body>


