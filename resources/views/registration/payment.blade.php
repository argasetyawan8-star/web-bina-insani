@extends('layouts.landing')

@section('title', 'Pembayaran')

@section('content')

@if($errors->any())

<div class="mx-auto max-w-5xl mb-10 rounded-xl bg-red-100 p-5 text-red-700">

<ul>
@foreach($errors->all() as $error)

<li>
{{ $error }}
</li>

@endforeach
</ul>

</div>

@endif

<section
    x-data="{ paymentMethod: 'qris' }"
    class="relative overflow-hidden bg-gradient-to-b from-slate-50 via-white to-slate-100 py-24">

    {{-- Background --}}
    <div class="absolute inset-0 -z-10">

        <div class="absolute -top-40 -left-32 h-96 w-96 rounded-full bg-blue-300/20 blur-3xl"></div>

        <div class="absolute top-20 right-0 h-[450px] w-[450px] rounded-full bg-orange-300/20 blur-3xl"></div>

        <div class="absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-yellow-300/20 blur-3xl"></div>

    </div>

    <div class="mx-auto max-w-7xl px-6">

        {{-- Header --}}
        <div class="text-center">

            <span
                class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-5 py-2 text-sm font-semibold text-blue-700">

                <i class="bi bi-wallet2"></i>

                Pembayaran Pendaftaran

            </span>

            <h1 class="mt-6 text-5xl font-extrabold text-slate-900">

                Selesaikan Pembayaran

            </h1>

            <p class="mx-auto mt-5 max-w-3xl text-lg leading-8 text-slate-500">

                Silakan lakukan pembayaran biaya pendaftaran sesuai metode yang dipilih.
                Setelah mengirim bukti pembayaran, admin akan melakukan verifikasi maksimal
                <span class="font-semibold text-blue-600">1 × 24 Jam Kerja.</span>

            </p>

        </div>

        {{-- ===========================
        CONTENT
=========================== --}}
<div class="mt-16 grid gap-10 lg:grid-cols-3">

    {{-- ===========================
            INFORMASI PESERTA
    ============================ --}}
    <div class="lg:col-span-2">

        <div class="overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-xl">

            {{-- Header --}}
            <div class="group flex items-center gap-3 rounded-2xl bg-[#2E3192] px-8 py-4 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900">

                <div>

                    <h2 class="text-2xl font-bold text-white">
                        Informasi Peserta
                    </h2>

                    <p class="mt-1 text-blue-100">
                        Pastikan seluruh data sudah benar.
                    </p>

                </div>

                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white/20">

                    <i class="bi bi-person-circle text-4xl text-white"></i>

                </div>

            </div>

            {{-- Body --}}
            <div class="grid gap-6 p-8 md:grid-cols-2">

                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">Nama Lengkap</p>
                    <h3 class="mt-2 text-lg font-bold">
                        {{ $registration->full_name }}
                    </h3>
                </div>

                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">Program</p>
                    <h3 class="mt-2 text-lg font-bold">
                        {{ $registration->program->name }}
                    </h3>
                </div>

                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">Email</p>
                    <h3 class="mt-2 text-lg">
                        {{ $registration->email }}
                    </h3>
                </div>

                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">Nomor WhatsApp</p>
                    <h3 class="mt-2 text-lg">
                        {{ $registration->phone }}
                    </h3>
                </div>

                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">Pendidikan</p>
                    <h3 class="mt-2 text-lg">
                        {{ $registration->education }}
                    </h3>
                </div>

                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">Pekerjaan</p>
                    <h3 class="mt-2 text-lg">
                        {{ $registration->job }}
                    </h3>
                </div>

            </div>

        </div>

    </div>

    {{-- ===========================
            RINGKASAN PEMBAYARAN
    ============================ --}}
    <div>

        <form
            action="{{ route('payment.store', $registration->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="sticky top-28 overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-2xl">

                {{-- Header --}}
                <div class="group flex items-center gap-3 rounded-2xl bg-[#2E3192] px-8 py-4 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900">

                    <h2 class="text-2xl font-bold text-white">
                        Ringkasan Pembayaran
                    </h2>

                    <p class="mt-2 text-blue-100">
                        Biaya yang harus dibayarkan
                    </p>

                </div>

                {{-- Body --}}
                <div class="space-y-6 p-8">

                    <div class="flex justify-between">
                        <span class="text-slate-500">Biaya Pendaftaran</span>
                        <span class="font-bold">
                            Rp {{ number_format($registration->program->registration_fee,0,',','.') }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-slate-500">Biaya Admin</span>
                        <span class="font-semibold text-green-600">
                            Gratis
                        </span>
                    </div>

                    <hr>

                    <div class="flex justify-between">
                        <span class="text-xl font-bold">
                            Total
                        </span>

                        <span class="text-3xl font-extrabold text-blue-600">
                            Rp {{ number_format($registration->program->registration_fee,0,',','.') }}
                        </span>
                    </div>

                    <div class="rounded-2xl bg-gradient-to-r from-blue-50 to-orange-50 p-5">

                        <h3 class="font-bold text-slate-800">
                            Yang Anda Dapatkan
                        </h3>

                        <div class="mt-4 space-y-3">

                            <div class="flex items-center gap-3">
                                <i class="bi bi-check-circle-fill text-green-500"></i>
                                Dashboard Peserta
                            </div>

                            <div class="flex items-center gap-3">
                                <i class="bi bi-check-circle-fill text-green-500"></i>
                                Verifikasi Dokumen
                            </div>

                            <div class="flex items-center gap-3">
                                <i class="bi bi-check-circle-fill text-green-500"></i>
                                Jadwal Diklat
                            </div>

                            <div class="flex items-center gap-3">
                                <i class="bi bi-check-circle-fill text-green-500"></i>
                                Pendampingan Hingga Berangkat
                            </div>

                        </div>

                    </div>
                    </div>
                    

                               

                           

                    </div>

            </div>

        </div>

        {{-- ===========================
                PILIH METODE PEMBAYARAN
        ============================ --}}

        <div class="mt-16">

            <div class="text-center">

                <h2 class="text-4xl font-extrabold text-slate-900">

                    Pilih Metode Pembayaran

                </h2>

                <p class="mt-3 text-slate-500">

                    Silakan pilih metode pembayaran yang paling nyaman.

                </p>

            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-2">

                {{-- QRIS --}}
                <label
                    @click="paymentMethod='qris'"
                    :class="paymentMethod=='qris'
                        ? 'border-blue-600 ring-4 ring-blue-100'
                        : 'border-slate-200'"
                    class="cursor-pointer rounded-3xl border-2 bg-white p-8 transition-all hover:shadow-xl">

                    <input
                        type="radio"
                        name="payment_method"
                        value="qris"
                        x-model="paymentMethod"
                        class="hidden">

                    <div class="flex items-center gap-5">

                        <div
                            class="rounded-2xl bg-red-100 p-5">

                            <i class="bi bi-qr-code text-5xl text-red-500"></i>

                        </div>

                        <div>

                            <h3 class="text-2xl font-bold">

                                QRIS

                            </h3>

                            <p class="mt-2 text-slate-500">

                                Scan menggunakan semua E-Wallet
                                maupun Mobile Banking.

                            </p>

                        </div>

                    </div>

                </label>

                {{-- Transfer --}}
                <label
                    @click="paymentMethod='transfer'"
                    :class="paymentMethod=='transfer'
                        ? 'border-blue-600 ring-4 ring-blue-100'
                        : 'border-slate-200'"
                    class="cursor-pointer rounded-3xl border-2 bg-white p-8 transition-all hover:shadow-xl">

                    <input
                        type="radio"
                        name="payment_method"
                        value="transfer"
                        x-model="paymentMethod"
                        class="hidden">

                    <div class="flex items-center gap-5">

                        <div
                            class="rounded-2xl bg-blue-100 p-5">

                            <i class="bi bi-bank text-5xl text-blue-600"></i>

                        </div>

                        <div>

                            <h3 class="text-2xl font-bold">

                                Transfer Bank

                            </h3>

                            <p class="mt-2 text-slate-500">

                                Transfer ke rekening resmi
                                Bina Insani.

                            </p>

                        </div>

                    </div>

                </label>

            </div>

        </div>

        {{-- ===========================
        DETAIL PEMBAYARAN
=========================== --}}

<div class="mt-14">

    {{-- QRIS --}}
    <div
        x-show="paymentMethod=='qris'"
        x-transition
        class="rounded-[32px] border border-slate-200 bg-white p-10 shadow-xl">

        <div class="text-center">

            <div
                class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-red-100">

                <i class="bi bi-qr-code text-5xl text-red-500"></i>

            </div>

            <h2 class="mt-6 text-3xl font-bold text-slate-900">

                Scan QRIS

            </h2>

            <p class="mt-2 text-slate-500">

                Scan QR Code menggunakan aplikasi pembayaran favorit Anda.

            </p>

        </div>

        <div class="mt-10 flex justify-center">

           @if(setting('qris'))

<img
src="{{ asset('storage/'.setting('qris')) }}"
class="mx-auto w-72 rounded-xl shadow">

@endif

        </div>

        <div class="mt-10 grid gap-4 md:grid-cols-5">

            <div class="rounded-2xl border p-5 text-center">

                <i class="bi bi-wallet2 text-3xl text-cyan-500"></i>

                <p class="mt-3 font-semibold">

                    GoPay

                </p>

            </div>

            <div class="rounded-2xl border p-5 text-center">

                <i class="bi bi-wallet2 text-3xl text-blue-500"></i>

                <p class="mt-3 font-semibold">

                    DANA

                </p>

            </div>

            <div class="rounded-2xl border p-5 text-center">

                <i class="bi bi-wallet2 text-3xl text-orange-500"></i>

                <p class="mt-3 font-semibold">

                    OVO

                </p>

            </div>

            <div class="rounded-2xl border p-5 text-center">

                <i class="bi bi-phone text-3xl text-green-500"></i>

                <p class="mt-3 font-semibold">

                    Mobile Banking

                </p>

            </div>

            <div class="rounded-2xl border p-5 text-center">

                <i class="bi bi-credit-card text-3xl text-purple-500"></i>

                <p class="mt-3 font-semibold">

                    QRIS

                </p>

            </div>

        </div>

    </div>

    {{-- Transfer --}}
    <div
        x-show="paymentMethod=='transfer'"
        x-transition
        class="rounded-[32px] border border-slate-200 bg-white p-10 shadow-xl">

        <div class="text-center">

            <div
                class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-blue-100">

                <i class="bi bi-bank text-5xl text-blue-600"></i>

            </div>

            <h2 class="mt-6 text-3xl font-bold">

                Transfer Bank

            </h2>

            <p class="mt-2 text-slate-500">

                Transfer ke rekening resmi berikut.

            </p>

        </div>

        <div
            class="mx-auto mt-10 max-w-xl rounded-3xl bg-slate-50 p-8">

            <div class="flex justify-between">

                <span class="text-slate-500">

                    Bank

                </span>

                <span class="font-bold">

                    BCA

                </span>

            </div>

            <hr class="my-5">

            <div class="flex justify-between">

                <span class="text-slate-500">

                    No Rekening

                </span>

                <span
                    id="rekening"
                    class="font-bold">

                   
                        {{ setting('bank_account') }}


                </span>

            </div>

            <hr class="my-5">

            <div class="flex justify-between">

                <span class="text-slate-500">

                    Atas Nama

                </span>

                <span class="font-bold">

                    Bina Insani Training Center

                </span>

            </div>

            <button
                type="button"
                onclick="copyRekening()"
                class="mt-8 w-full rounded-2xl bg-blue-600 py-3 font-bold text-white transition hover:bg-blue-700">

                <i class="bi bi-copy me-2"></i>

                Salin Nomor Rekening

            </button>

        </div>

    </div>

</div>

{{-- ===========================
        Upload Bukti
=========================== --}}

<div
    class="mt-14 rounded-[32px] border border-slate-200 bg-white p-10 shadow-xl">

    <div class="text-center">

        <div
            class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-green-100">

            <i class="bi bi-cloud-arrow-up text-5xl text-green-600"></i>

        </div>

        <h2 class="mt-6 text-3xl font-bold">

            Upload Bukti Pembayaran

        </h2>

        <p class="mt-2 text-slate-500">

            Upload screenshot atau foto bukti transfer.

        </p>

    </div>

    <div class="mx-auto mt-10 max-w-2xl">

        <input
            type="file"
            name="payment_proof"
            accept=".jpg,.jpeg,.png"
            onchange="previewPayment(event)"
            class="block w-full rounded-2xl border border-dashed border-blue-300 p-5">

        @error('payment_proof')

            <p class="mt-2 text-red-500">

                {{ $message }}

            </p>

        @enderror

        <div class="mt-8 flex justify-center">

            <img
                id="preview"
                class="hidden max-h-96 rounded-3xl shadow-xl">

        </div>

    </div>

</div>

{{-- ===========================
        Timeline
=========================== --}}

<div
    class="mt-14 rounded-[32px] border border-slate-200 bg-white p-10 shadow-xl">

    <h2 class="text-3xl font-bold text-slate-900">

        Alur Verifikasi Pembayaran

    </h2>

    <div class="mt-10 grid gap-8 md:grid-cols-4">

        <div class="text-center">

            <div
                class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-100">

                <i class="bi bi-credit-card text-3xl text-blue-600"></i>

            </div>

            <h3 class="mt-5 font-bold">

                1. Lakukan Pembayaran

            </h3>

            <p class="mt-2 text-sm text-slate-500">

                Bayar melalui QRIS atau Transfer Bank.

            </p>

        </div>

        <div class="text-center">

            <div
                class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-orange-100">

                <i class="bi bi-cloud-arrow-up text-3xl text-orange-500"></i>

            </div>

            <h3 class="mt-5 font-bold">

                2. Upload Bukti

            </h3>

            <p class="mt-2 text-sm text-slate-500">

                Upload bukti pembayaran yang jelas.

            </p>

        </div>

        <div class="text-center">

            <div
                class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-yellow-100">

                <i class="bi bi-search text-3xl text-yellow-500"></i>

            </div>

            <h3 class="mt-5 font-bold">

                3. Verifikasi Admin

            </h3>

            <p class="mt-2 text-sm text-slate-500">

                Admin akan memverifikasi pembayaran maksimal 1×24 jam kerja.

            </p>

        </div>

        <div class="text-center">

            <div
                class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-100">

                <i class="bi bi-check-circle text-3xl text-green-600"></i>

            </div>

            <h3 class="mt-5 font-bold">

                4. Pembayaran Berhasil

            </h3>

            <p class="mt-2 text-sm text-slate-500">

                Status pembayaran berubah menjadi Lunas.

            </p>

        </div>

    </div>

</div>

{{-- ===========================
        Informasi
=========================== --}}

<div
    class="mt-10 rounded-3xl border border-blue-200 bg-blue-50 p-8">

    <div class="flex items-start gap-4">

        <div
            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-600 text-white">

            <i class="bi bi-info-circle text-2xl"></i>

        </div>

        <div>

            <h3 class="text-xl font-bold text-slate-900">

                Informasi Penting

            </h3>

            <ul class="mt-4 space-y-2 text-slate-600">

                <li>• Pastikan nominal transfer sesuai dengan biaya pendaftaran.</li>

                <li>• Bukti pembayaran harus terlihat jelas.</li>

                <li>• Admin akan melakukan verifikasi maksimal 1×24 jam kerja.</li>

                <li>• Setelah diverifikasi, Anda akan dihubungi melalui WhatsApp.</li>

            </ul>

        </div>

    </div>

</div>

{{-- Tombol Submit --}}
<div class="mt-12">

    <button
        type="submit"
        class="group flex items-center gap-3 rounded-2xl bg-[#2E3192] px-8 py-4 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900">

        <i class="bi bi-check-circle-fill me-2"></i>

        Kirim Bukti Pembayaran

    </button>

</div>

</form>

</div>

</section>

{{-- ===========================
        Javascript
=========================== --}}

<script>

function previewPayment(event){

    const preview = document.getElementById('preview');

    preview.src = URL.createObjectURL(event.target.files[0]);

    preview.classList.remove('hidden');

}

function copyRekening(){

    const rekening = document.getElementById('rekening').innerText;

    navigator.clipboard.writeText(rekening);

    alert('Nomor rekening berhasil disalin.');

}

</script>

@endsection