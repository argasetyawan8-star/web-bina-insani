@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto py-20">

    <div class="bg-white rounded-3xl shadow-lg p-12 text-center">

        <div class="text-6xl">

            ✅

        </div>

        <h1 class="text-3xl font-bold mt-6">

            Pendaftaran Berhasil

        </h1>

        <p class="mt-5 text-slate-600">

            Terima kasih telah melakukan pembayaran biaya pendaftaran.

        </p>

        <div class="mt-8 bg-slate-100 rounded-xl p-6">

            <p>

                Nomor Pendaftaran

            </p>

            <h2 class="text-2xl font-bold">

                {{ $registration->registration_code }}

            </h2>

        </div>

        <div class="mt-8 text-slate-600 leading-8">

            Customer Service Bina Insani akan menghubungi Anda
            melalui nomor WhatsApp atau email yang telah didaftarkan.

        </div>

        <a
            href="{{ route('home') }}"
            class="inline-block mt-10 bg-blue-600 text-white px-8 py-3 rounded-xl">

            Kembali ke Beranda

        </a>

    </div>

</div>

@endsection