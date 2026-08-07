@extends('layouts.admin')

@section('title', 'Verifikasi Pembayaran')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Verifikasi Pembayaran
            </h1>

            <p class="mt-2 text-slate-500">
                Kelola seluruh pembayaran peserta Bina Insani.
            </p>

        </div>

    </div>



    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        {{-- Menunggu --}}
        <div class="rounded-2xl bg-white border shadow-sm p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-500">
                        Menunggu Verifikasi
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-amber-500">
                        {{ $waiting }}
                    </h2>

                </div>

                <div class="h-14 w-14 rounded-xl bg-amber-100 flex items-center justify-center">

                    <i class="bi bi-hourglass-split text-2xl text-amber-500"></i>

                </div>

            </div>

        </div>



        {{-- Paid --}}
        <div class="rounded-2xl bg-white border shadow-sm p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-500">
                        Sudah Lunas
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-green-600">
                        {{ $paid }}
                    </h2>

                </div>

                <div class="h-14 w-14 rounded-xl bg-green-100 flex items-center justify-center">

                    <i class="bi bi-check-circle-fill text-2xl text-green-600"></i>

                </div>

            </div>

        </div>



        {{-- Ditolak --}}
        <div class="rounded-2xl bg-white border shadow-sm p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-500">
                        Ditolak
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-red-500">
                        {{ $rejected }}
                    </h2>

                </div>

                <div class="h-14 w-14 rounded-xl bg-red-100 flex items-center justify-center">

                    <i class="bi bi-x-circle-fill text-2xl text-red-500"></i>

                </div>

            </div>

        </div>



        {{-- Total --}}
        <div class="rounded-2xl bg-white border shadow-sm p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Pembayaran
                    </p>

                    <h2 class="mt-2 text-3xl font-bold text-blue-600">
                        {{ $total }}
                    </h2>

                </div>

                <div class="h-14 w-14 rounded-xl bg-blue-100 flex items-center justify-center">

                    <i class="bi bi-credit-card-2-front-fill text-2xl text-blue-600"></i>

                </div>

            </div>

        </div>

    </div>



    {{-- Filter --}}
    <div class="rounded-2xl border bg-white shadow-sm">

        <div class="border-b p-6">

            <h2 class="font-semibold text-lg">

                Filter Pembayaran

            </h2>

        </div>

        <form
            method="GET"
            class="grid gap-4 p-6 md:grid-cols-4">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama peserta..."
                class="rounded-xl border px-4 py-3">

            <select
                name="payment_status"
                class="rounded-xl border px-4 py-3">

                <option value="">
                    Semua Status
                </option>

                <option
                    value="waiting_verification"
                    {{ request('payment_status')=='waiting_verification' ? 'selected' : '' }}>
                    Menunggu Verifikasi
                </option>

                <option
                    value="paid"
                    {{ request('payment_status')=='paid' ? 'selected' : '' }}>
                    Lunas
                </option>

                <option
                    value="rejected"
                    {{ request('payment_status')=='rejected' ? 'selected' : '' }}>
                    Ditolak
                </option>

            </select>

            <button
                class="rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700">

                <i class="bi bi-search me-2"></i>

                Filter

            </button>

        </form>

        <div class="rounded-2xl bg-white border shadow-sm overflow-hidden">

    <div class="px-6 py-5 border-b">

        <h2 class="text-lg font-semibold text-slate-800">
            Daftar Pembayaran
        </h2>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left">
                        Peserta
                    </th>

                    <th class="px-6 py-4 text-left">
                        Program
                    </th>

                    <th class="px-6 py-4 text-left">
                        Metode
                    </th>

                    <th class="px-6 py-4 text-center">
                        Bukti
                    </th>

                    <th class="px-6 py-4 text-center">
                        Status
                    </th>

                    <th class="px-6 py-4 text-center">
                        Tanggal
                    </th>

                    <th class="px-6 py-4 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($payments as $item)

                <tr class="border-t hover:bg-slate-50 transition">

                    {{-- Nama --}}
                    <td class="px-6 py-4">

                        <div class="font-semibold">

                            {{ $item->full_name }}

                        </div>

                        <div class="text-xs text-slate-500">

                            {{ $item->email }}

                        </div>

                    </td>

                    {{-- Program --}}
                    <td class="px-6 py-4">

                        {{ $item->program->name ?? '-' }}

                    </td>

                    {{-- Metode --}}
                    <td class="px-6 py-4">

                        {{ ucfirst($item->payment_method ?? '-') }}

                    </td>

                    {{-- Bukti --}}
                    <td class="px-6 py-4 text-center">

                        @if($item->payment_proof)

                            <a
                                href="{{ route('admin.payments.show', $item->id) }}"
                                class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm">
                                Detail
                            </a>

                        @else

                            <span class="text-slate-400">

                                -

                            </span>

                        @endif

                    </td>

                    {{-- Status --}}
                    <td class="px-6 py-4 text-center">

                        @if($item->payment_status=='waiting_verification')

                            <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">

                                Menunggu

                            </span>

                        @elseif($item->payment_status=='paid')

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                Lunas

                            </span>

                        @elseif($item->payment_status=='rejected')

                            <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                Ditolak

                            </span>

                        @else

                            <span class="rounded-full bg-gray-100 px-3 py-1 text-xs">

                                {{ ucfirst($item->payment_status) }}

                            </span>

                        @endif

                    </td>

                    {{-- Tanggal --}}
                    <td class="px-6 py-4 text-center">

                        {{ $item->updated_at->format('d M Y') }}

                    </td>

                    {{-- Tombol --}}
                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            @if($item->payment_status=='waiting_verification')

                                <form
                                    action="{{ route('admin.registrations.payment.approve',$item->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        class="rounded-lg bg-green-600 px-3 py-2 text-white hover:bg-green-700">

                                        <i class="bi bi-check-lg"></i>

                                    </button>

                                </form>

                                <form
                                    action="{{ route('admin.registrations.payment.reject',$item->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        class="rounded-lg bg-red-600 px-3 py-2 text-white hover:bg-red-700">

                                        <i class="bi bi-x-lg"></i>

                                    </button>

                                </form>

                            @else

                                <span class="text-slate-400 text-sm">

                                    Selesai

                                </span>

                            @endif

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="7"
                        class="py-12 text-center text-slate-500">

                        Belum ada data pembayaran.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="border-t p-6">

        {{ $payments->links() }}

    </div>

</div>

    </div>

</div>

@endsection