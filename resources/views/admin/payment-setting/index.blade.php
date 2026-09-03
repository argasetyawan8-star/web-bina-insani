@extends('layouts.admin')

@section('title', 'Payment Website')

@section('content')

<div class="mx-auto max-w-3xl">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if(session('error'))
        <div class="mt-4 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    <div class="rounded-3xl bg-white p-8 shadow">

        <h2 class="text-3xl font-bold">
            Pengaturan Pembayaran
        </h2>

        <p class="mt-2 text-slate-500">
            Atur QRIS dan rekening pembayaran peserta.
        </p>

        @php
            $qris = setting('qris');

            $qrisUrl = $qris
                ? (str_starts_with($qris, 'https://res.cloudinary.com/')
                    ? $qris
                    : asset('images/' . $qris))
                : null;
        @endphp

        <form
            action="{{ route('admin.payment-setting.update') }}"
            method="POST"
            enctype="multipart/form-data"
            class="mt-8 space-y-6"
        >

            @csrf

            {{-- QRIS --}}
            <div>
                <label class="font-semibold">
                    Upload QRIS
                </label>

                <input
                    type="file"
                    name="qris"
                    accept="image/*"
                    class="mt-2 w-full rounded-xl border p-3"
                >

                @if($qrisUrl)
                    <div class="mt-5">
                        <p class="mb-3 text-sm font-medium text-slate-500">
                            QRIS Saat Ini
                        </p>

                        <img
                            src="{{ $qrisUrl }}"
                            alt="QRIS Pembayaran"
                            class="w-48 rounded-xl border border-slate-200 object-contain shadow-sm"
                        >
                    </div>
                @endif
            </div>

            {{-- NOMOR REKENING --}}
            <div>
                <label class="font-semibold">
                    Nomor Rekening
                </label>

                <input
                    type="text"
                    name="bank_number"
                    value="{{ setting('bank_account') }}"
                    class="mt-2 w-full rounded-xl border p-3"
                    placeholder="Contoh: BCA 123456789"
                >
            </div>

            {{-- BUTTON --}}
            <button
                type="submit"
                class="rounded-xl bg-blue-600 px-6 py-3 font-bold text-white transition hover:bg-blue-700"
            >
                Simpan Perubahan
            </button>

        </form>

    </div>

</div>

@endsection