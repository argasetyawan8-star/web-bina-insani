@extends('layouts.admin')

@section('title','Detail Pembayaran')

@section('content')

<div class="space-y-8">

    <div class="bg-white rounded-2xl shadow border p-8">

        <h1 class="text-2xl font-bold">
            Detail Pembayaran
        </h1>

        <div class="grid md:grid-cols-2 gap-6 mt-8">

            <div>
                <p class="text-sm text-gray-500">
                    Nama Peserta
                </p>

                <h2 class="font-bold text-lg">
                    {{ $registration->full_name }}
                </h2>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Program
                </p>

                <h2 class="font-bold text-lg">
                    {{ $registration->program->name }}
                </h2>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Tanggal Daftar
                </p>

                <h2 class="font-semibold">
                    {{ $registration->created_at->format('d M Y') }}
                </h2>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Status
                </p>

                @if($registration->payment_status=='waiting_verification')

                    <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700">

                        Menunggu Verifikasi

                    </span>

                @elseif($registration->payment_status=='paid')

                    <span class="px-4 py-2 rounded-full bg-green-100 text-green-700">

                        Sudah Dibayar

                    </span>

                @else

                    <span class="px-4 py-2 rounded-full bg-red-100 text-red-700">

                        Ditolak

                    </span>

                @endif

            </div>

        </div>

    </div>



    {{-- Bukti Pembayaran --}}
    <div class="bg-white rounded-2xl shadow border p-8">

        <h2 class="text-xl font-bold mb-6">

            Bukti Pembayaran

        </h2>

        @if($registration->payment_proof)

            <img
                src="{{ asset('storage/'.$registration->payment_proof) }}"
                class="rounded-xl border w-full max-w-2xl">

        @else

            <div class="text-gray-500">

                Belum ada bukti pembayaran.

            </div>

        @endif

    </div>



    {{-- Tombol --}}
    @if($registration->payment_status=='waiting_verification')

    <div class="flex gap-4">

        <form
            action="{{ route('admin.registrations.payment.approve',$registration->id) }}"
            method="POST">

            @csrf
            @method('PATCH')

            <button
                class="px-6 py-3 rounded-xl bg-green-600 text-white">

                <i class="bi bi-check-circle"></i>

                Approve

            </button>

        </form>


        <form
            action="{{ route('admin.registrations.payment.reject',$registration->id) }}"
            method="POST">

            @csrf
            @method('PATCH')

            <button
                class="px-6 py-3 rounded-xl bg-red-600 text-white">

                <i class="bi bi-x-circle"></i>

                Reject

            </button>

        </form>

    </div>

    @endif

</div>

@endsection