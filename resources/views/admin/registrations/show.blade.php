@extends('layouts.admin')


@section('title')
Detail Peserta
@endsection



@section('content')

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-lg">

{{ session('success') }}

</div>

@endif

<div class="space-y-6">


{{-- HEADER --}}

<div class="bg-white rounded-xl shadow-sm border p-6 flex justify-between items-center">


<div>

<h2 class="text-xl font-bold">
{{ $registration->full_name }}
</h2>

<p class="text-gray-500 text-sm">
Kode Pendaftaran:
{{ $registration->registration_code }}
</p>

</div>


<a href="{{ route('admin.registrations.index') }}"
class="px-4 py-2 border rounded-lg text-sm">

Kembali

</a>
@if($registration->status != 'verified')

<form method="POST"
action="{{ route('admin.registrations.verify',$registration->id) }}">

@csrf
@method('PATCH')


<button
class="px-4 py-2 bg-green-600 text-white rounded-lg">

Verifikasi Peserta

</button>


</form>

@else

<span class="px-4 py-2 rounded-lg bg-green-100 text-green-700">

Peserta Terverifikasi

</span>

@endif


</div>





{{-- BIODATA --}}

<div class="bg-white rounded-xl shadow-sm border">


<div class="p-6 border-b">

<h3 class="font-semibold">
Biodata Peserta
</h3>

</div>



<div class="p-6 grid md:grid-cols-2 gap-5">


<div>
<p class="text-gray-500 text-sm">
Nama Lengkap
</p>

<p class="font-medium">
{{ $registration->full_name }}
</p>
</div>



<div>
<p class="text-gray-500 text-sm">
NIK
</p>

<p class="font-medium">
{{ $registration->nik }}
</p>
</div>



<div>
<p class="text-gray-500 text-sm">
Tempat Lahir
</p>

<p class="font-medium">
{{ $registration->birth_place }}
</p>
</div>



<div>
<p class="text-gray-500 text-sm">
Tanggal Lahir
</p>

<p class="font-medium">
{{ $registration->birth_date->format('d M Y') }}
</p>
</div>



<div>
<p class="text-gray-500 text-sm">
Jenis Kelamin
</p>

<p class="font-medium">
{{ $registration->gender }}
</p>
</div>



<div>
<p class="text-gray-500 text-sm">
No HP
</p>

<p class="font-medium">
{{ $registration->phone }}
</p>
</div>



<div>
<p class="text-gray-500 text-sm">
Email
</p>

<p class="font-medium">
{{ $registration->email }}
</p>
</div>



<div>
<p class="text-gray-500 text-sm">
Pendidikan
</p>

<p class="font-medium">
{{ $registration->education }}
</p>
</div>



<div class="md:col-span-2">

<p class="text-gray-500 text-sm">
Alamat
</p>

<p class="font-medium">
{{ $registration->address }}
</p>

</div>


</div>

</div>





{{-- PROGRAM --}}

<div class="bg-white rounded-xl shadow-sm border p-6">


<h3 class="font-semibold mb-4">
Program
</h3>


<p>
{{ $registration->program->name ?? '-' }}
</p>


</div>







{{-- PEMBAYARAN --}}

<div class="bg-white rounded-xl shadow-sm border">


<div class="p-6 border-b">

<h3 class="font-semibold">
Informasi Pembayaran
</h3>

</div>


<div class="p-6 grid md:grid-cols-2 gap-5">


<div>

<p class="text-gray-500 text-sm">
Status Pembayaran
</p>


@if($registration->payment_status == 'paid')

<span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">
PAID
</span>

@else

<span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">
UNPAID
</span>

@endif


</div>




<div>

<p class="text-gray-500 text-sm">
Metode Pembayaran
</p>

<p>
{{ $registration->payment_type ?? '-' }}
</p>

</div>




<div>

<p class="text-gray-500 text-sm">
Transaction ID
</p>

<p>
{{ $registration->transaction_id ?? '-' }}
</p>

</div>



<div>

<p class="text-gray-500 text-sm">
Tanggal Bayar
</p>

<p>

{{ $registration->paid_at?->format('d M Y H:i') ?? '-' }}

</p>

</div>


</div>


</div>






{{-- DOKUMEN --}}

<div class="bg-white rounded-xl shadow-sm border p-6">


<h3 class="font-semibold mb-5">
Dokumen Peserta
</h3>


<div class="grid md:grid-cols-3 gap-5">


<a target="_blank"
href="{{ asset('storage/'.$registration->photo) }}"
class="border rounded-lg p-4 text-center hover:bg-gray-50">

Foto

</a>



<a target="_blank"
href="{{ asset('storage/'.$registration->ktp) }}"
class="border rounded-lg p-4 text-center hover:bg-gray-50">

KTP

</a>



<a target="_blank"
href="{{ asset('storage/'.$registration->ijazah) }}"
class="border rounded-lg p-4 text-center hover:bg-gray-50">

Ijazah

</a>


</div>


</div>



</div>


@endsection