
@extends('layouts.admin')

@section('title')
    Data Peserta
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

            <div>

                <span
                    class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs font-semibold text-blue-100"
                >
                    <i class="bi bi-people-fill"></i>
                    Manajemen Peserta
                </span>


                <h1
                    class="mt-4 text-2xl font-extrabold sm:text-3xl lg:text-4xl"
                >
                    Data Peserta
                </h1>


                <p
                    class="mt-2 max-w-2xl text-sm leading-7 text-blue-100 sm:text-base"
                >
                    Kelola seluruh data pendaftaran peserta,
                    status pembayaran, program pelatihan,
                    dan proses verifikasi.
                </p>

            </div>


            {{-- TOTAL --}}
            <div
                class="flex items-center gap-4 rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur sm:p-5 lg:shrink-0"
            >

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-white text-[#2E3192]"
                >
                    <i class="bi bi-person-lines-fill text-xl"></i>
                </div>

                <div>

                    <p class="text-xs text-blue-100">
                        Total Pendaftaran
                    </p>

                    <p
                        class="mt-1 text-2xl font-black"
                    >
                        {{ $registrations->total() }}
                    </p>

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
                        Filter Data
                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500"
                    >
                        Gunakan filter untuk menemukan peserta dengan cepat.
                    </p>

                </div>

            </div>

        </div>


        <form
            method="GET"
            class="grid gap-4 p-6 sm:grid-cols-2 lg:grid-cols-4"
        >

            {{-- SEARCH --}}
            <div class="sm:col-span-2 lg:col-span-1">

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


            {{-- PAYMENT --}}
            <div>

                <label
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Pembayaran
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


            {{-- STATUS --}}
            <div>

                <label
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Status Peserta
                </label>

                <select
                    name="status"
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-4 focus:ring-[#2E3192]/10"
                >

                    <option value="">
                        Semua Status
                    </option>

                    <option
                        value="pending"
                        @selected(request('status') === 'pending')
                    >
                        Menunggu
                    </option>

                    <option
                        value="verified"
                        @selected(request('status') === 'verified')
                    >
                        Terverifikasi
                    </option>

                    <option
                        value="rejected"
                        @selected(request('status') === 'rejected')
                    >
                        Ditolak
                    </option>

                </select>

            </div>


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


            {{-- BUTTONS --}}
            <div
                class="flex flex-col gap-3 sm:col-span-2 lg:col-span-4 sm:flex-row sm:justify-end"
            >

                <a
                    href="{{ route('admin.registrations.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50"
                >
                    <i class="bi bi-arrow-counterclockwise"></i>
                    Reset
                </a>


                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#2E3192] px-6 py-3 text-sm font-bold text-white shadow-lg transition duration-300 hover:-translate-y-0.5 hover:bg-blue-900 hover:shadow-xl"
                >
                    <i class="bi bi-search"></i>
                    Terapkan Filter
                </button>

            </div>

        </form>

    </div>



    {{-- =========================================================
         TABLE
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
                    Daftar Peserta
                </p>

                <h2
                    class="mt-1 text-xl font-extrabold text-slate-800"
                >
                    Seluruh Pendaftaran
                </h2>

                <p
                    class="mt-1 text-sm text-slate-500"
                >
                    Menampilkan data peserta sesuai filter yang dipilih.
                </p>

            </div>


            <div
                class="inline-flex w-fit items-center gap-2 rounded-xl bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-600"
            >
                <i class="bi bi-list-check text-[#2E3192]"></i>

                {{ $registrations->count() }}
                data pada halaman ini

            </div>

        </div>


        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table
                class="w-full min-w-[950px] text-sm"
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
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($registrations as $item)

                        <tr
                            class="border-b border-slate-100 transition duration-200 hover:bg-slate-50 last:border-b-0"
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
                                            class="mt-1 text-xs text-slate-400"
                                        >
                                            {{ $item->registration_code ?? '-' }}
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


                            {{-- PAYMENT --}}
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

                                        Menunggu Verifikasi
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


                            {{-- STATUS --}}
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


                            {{-- ACTION --}}
                            <td class="px-6 py-5 text-right">

                                <a
                                    href="{{ route('admin.registrations.show', $item->id) }}"
                                    class="inline-flex items-center gap-2 rounded-xl bg-[#2E3192] px-4 py-2.5 text-xs font-bold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-blue-900"
                                >
                                    <i class="bi bi-eye-fill"></i>
                                    Detail
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-6 py-16 text-center"
                            >

                                <div
                                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400"
                                >
                                    <i class="bi bi-people text-2xl"></i>
                                </div>

                                <h3
                                    class="mt-5 text-lg font-bold text-slate-700"
                                >
                                    Data Peserta Tidak Ditemukan
                                </h3>

                                <p
                                    class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500"
                                >
                                    Belum ada peserta yang sesuai dengan
                                    filter atau pencarian yang digunakan.
                                </p>

                                <a
                                    href="{{ route('admin.registrations.index') }}"
                                    class="mt-5 inline-flex items-center gap-2 rounded-xl bg-[#2E3192] px-5 py-3 text-sm font-bold text-white transition hover:bg-blue-900"
                                >
                                    <i class="bi bi-arrow-counterclockwise"></i>
                                    Reset Filter
                                </a>

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
