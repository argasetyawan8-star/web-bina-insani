@extends('layouts.admin')

@section('title','Laporan')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="bg-white rounded-2xl shadow-sm border p-8">

        <h1 class="text-3xl font-bold text-slate-800">
            Laporan Peserta
        </h1>

        <p class="mt-2 text-slate-500">
            Filter data peserta kemudian export ke PDF atau Excel.
        </p>

    </div>

    {{-- Filter --}}
    <div class="bg-white rounded-2xl border shadow-sm p-6">

        <form
            method="GET"
            class="grid md:grid-cols-5 gap-4">

            <select
                name="program_id"
                class="rounded-xl border px-4 py-3">

                <option value="">
                    Semua Program
                </option>

                @foreach($programs as $program)

                    <option
                        value="{{ $program->id }}"
                        {{ request('program_id')==$program->id?'selected':'' }}>

                        {{ $program->name }}

                    </option>

                @endforeach

            </select>

            <select
                name="payment_status"
                class="rounded-xl border px-4 py-3">

                <option value="">
                    Semua Pembayaran
                </option>

                <option
                    value="paid"
                    {{ request('payment_status')=='paid'?'selected':'' }}>
                    Lunas
                </option>

                <option
                    value="waiting_verification"
                    {{ request('payment_status')=='waiting_verification'?'selected':'' }}>
                    Menunggu
                </option>

            </select>

            <input
                type="date"
                name="date_from"
                value="{{ request('date_from') }}"
                class="rounded-xl border px-4 py-3">

            <input
                type="date"
                name="date_to"
                value="{{ request('date_to') }}"
                class="rounded-xl border px-4 py-3">

            <button
                class="rounded-xl bg-blue-600 text-white font-semibold">

                Filter

            </button>

        </form>

    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="px-6 py-4 text-left">
                        Nama
                    </th>

                    <th class="px-6 py-4 text-left">
                        Program
                    </th>

                    <th class="px-6 py-4 text-left">
                        Pembayaran
                    </th>

                    <th class="px-6 py-4 text-left">
                        Status
                    </th>

                    <th class="px-6 py-4 text-left">
                        Tanggal
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($registrations as $item)

                <tr class="border-t">

                    <td class="px-6 py-4">

                        {{ $item->full_name }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $item->program->name }}

                    </td>

                    <td class="px-6 py-4">

                        @if($item->payment_status=='paid')

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">

                                Lunas

                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">

                                Menunggu

                            </span>

                        @endif

                    </td>

                    <td class="px-6 py-4">

                        {{ ucfirst($item->status) }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $item->created_at->format('d M Y') }}

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="5"
                        class="py-10 text-center text-slate-500">

                        Tidak ada data.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        <div class="border-t p-6">

            {{ $registrations->links() }}

        </div>

    </div>

    {{-- Export --}}
    <div class="flex gap-4">

        <a
            href="{{ route('admin.reports.pdf', request()->query()) }}"
            class="rounded-xl bg-red-600 px-6 py-3 text-white font-semibold">

            <i class="bi bi-file-earmark-pdf"></i>

            Export PDF

        </a>

                <a
            href="{{ route('admin.reports.excel', request()->query()) }}"
            class="rounded-xl bg-green-600 px-6 py-3 text-white font-semibold">

                <i class="bi bi-file-earmark-excel"></i>

                Export Excel

            </a>

    </div>

</div>

@endsection