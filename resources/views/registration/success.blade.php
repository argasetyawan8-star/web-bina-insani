@extends('layouts.landing')

@section('title', 'Pembayaran Berhasil')

@section('content')


<section 
class="relative overflow-hidden bg-gradient-to-b from-slate-50 via-white to-slate-100 py-32 min-h-screen">


{{-- Background --}}
<div class="absolute inset-0 -z-10">

    <div class="absolute -top-40 -left-32 h-96 w-96 rounded-full bg-blue-300/30 blur-3xl"></div>

    <div class="absolute top-40 right-0 h-[450px] w-[450px] rounded-full bg-orange-300/20 blur-3xl"></div>

    <div class="absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-yellow-300/20 blur-3xl"></div>

</div>



<div class="mx-auto max-w-5xl px-6">


<div class="rounded-[40px] border border-white bg-white/90 p-10 shadow-2xl backdrop-blur-xl lg:p-16">



{{-- Icon --}}
<div class="mx-auto flex h-28 w-28 items-center justify-center rounded-full bg-blue-100">

    <i class="bi bi-cloud-check-fill text-7xl text-blue-600"></i>

</div>



<h1 class="mt-10 text-center text-5xl font-extrabold text-slate-900">

    Bukti Pembayaran Berhasil Dikirim 🎉

</h1>



<p class="mx-auto mt-6 max-w-3xl text-center text-lg leading-8 text-slate-500">

    Terima kasih telah melakukan pembayaran.
    Bukti pembayaran Anda telah berhasil diterima.
    Tim Bina Insani akan melakukan verifikasi terlebih dahulu.

</p>




{{-- Informasi Peserta --}}
<div class="mt-12 grid gap-6 md:grid-cols-2">


<div class="rounded-3xl border bg-slate-50 p-6">

    <p class="text-sm text-slate-500">
        Nama Peserta
    </p>

    <h3 class="mt-2 text-lg font-bold text-slate-800">

        {{ $registration->full_name }}

    </h3>

</div>



<div class="rounded-3xl border bg-slate-50 p-6">

    <p class="text-sm text-slate-500">
        Program
    </p>

    <h3 class="mt-2 text-lg font-bold text-slate-800">

        {{ $registration->program->name }}

    </h3>

</div>




<div class="rounded-3xl border bg-slate-50 p-6">

    <p class="text-sm text-slate-500">
        Kode Pendaftaran
    </p>

    <h3 class="mt-2 text-lg font-bold text-blue-600">

        {{ $registration->registration_code }}

    </h3>

</div>




<div class="rounded-3xl border bg-slate-50 p-6">

    <p class="text-sm text-slate-500">
        Status Pembayaran
    </p>


    <span
    class="mt-3 inline-flex rounded-full bg-orange-100 px-5 py-2 text-sm font-semibold text-orange-700">

        <i class="bi bi-clock-history mr-2"></i>

        Menunggu Verifikasi

    </span>


</div>


</div>





{{-- Progress --}}
<div class="mt-12 rounded-3xl bg-gradient-to-r from-blue-50 via-white to-orange-50 p-8">


<h2 class="text-2xl font-bold text-slate-900">

    Status Proses Pendaftaran

</h2>



<div class="mt-8 space-y-5">


<div class="flex items-center gap-4">

    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100">

        <i class="bi bi-check-lg text-green-600"></i>

    </div>


    <div>

        <h3 class="font-semibold">
            Data Pendaftaran
        </h3>

        <p class="text-sm text-slate-500">
            Biodata peserta berhasil disimpan.
        </p>

    </div>

</div>





<div class="flex items-center gap-4">


    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100">

        <i class="bi bi-check-lg text-green-600"></i>

    </div>


    <div>

        <h3 class="font-semibold">
            Dokumen Peserta
        </h3>

        <p class="text-sm text-slate-500">
            Dokumen berhasil diupload.
        </p>

    </div>


</div>





<div class="flex items-center gap-4">


    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100">

        <i class="bi bi-check-lg text-green-600"></i>

    </div>


    <div>

        <h3 class="font-semibold">
            Bukti Pembayaran
        </h3>

        <p class="text-sm text-slate-500">
            Bukti pembayaran berhasil dikirim.
        </p>

    </div>


</div>





<div class="flex items-center gap-4">


    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-orange-100">

        <i class="bi bi-hourglass-split text-orange-600"></i>

    </div>


    <div>

        <h3 class="font-semibold">

            Verifikasi Admin

        </h3>


        <p class="text-sm text-slate-500">

            Menunggu pengecekan pembayaran oleh admin.

        </p>


    </div>


</div>


</div>


</div>






{{-- Informasi --}}
<div class="mt-10 rounded-3xl border border-blue-200 bg-blue-50 p-8">


<div class="flex gap-4">


<div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-600 text-white">

<i class="bi bi-info-circle text-2xl"></i>

</div>



<div>

<h3 class="text-xl font-bold text-slate-900">

Informasi Penting

</h3>



<ul class="mt-4 space-y-2 text-slate-600">


<li>
• Admin melakukan verifikasi maksimal 1×24 jam kerja.
</li>


<li>
• Pastikan nomor WhatsApp aktif untuk menerima informasi.
</li>


<li>
• Setelah pembayaran diverifikasi, peserta akan mendapatkan informasi berikutnya.
</li>


</ul>


</div>


</div>


</div>






{{-- Button --}}
<div class="mt-12 flex flex-wrap justify-center gap-4">


<a
href="/"
class="group flex items-center gap-3 rounded-2xl bg-[#2E3192] px-8 py-4 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900">


<i class="bi bi-house-fill mr-2"></i>

Kembali ke Beranda


</a>



<a
href="https://wa.me/{{ setting('whatsapp') }}"
class="rounded-2xl border border-slate-300 bg-white px-8 py-4 font-semibold text-slate-700 transition hover:bg-slate-100">


<i class="bi bi-whatsapp mr-2 text-green-500"></i>

Hubungi Admin


</a>



</div>




</div>


</div>


</section>



@endsection