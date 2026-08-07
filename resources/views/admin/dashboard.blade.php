@extends('layouts.admin')


@section('title')
Dashboard
@endsection


@section('content')


<div class="space-y-6">


{{-- HEADER --}}

<div>

<h1 class="text-2xl font-bold text-gray-800">
Dashboard Admin
</h1>

<p class="text-gray-500 mt-1">
Kelola data peserta dan proses pendaftaran Bina Insani
</p>

</div>




{{-- STATISTIC CARD --}}

<div class="grid grid-cols-1 md:grid-cols-5 gap-5">



{{-- Total Peserta --}}

<div class="bg-white rounded-2xl shadow-sm border p-5">

<div class="flex justify-between items-center">

<div>

<p class="text-sm text-gray-500">
Total Peserta
</p>

<h3 class="text-3xl font-bold mt-2 text-gray-800">
{{ $totalPeserta }}
</h3>

</div>


<div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center">

<i class="bi bi-people text-xl"></i>

</div>

</div>

</div>






{{-- Menunggu Verifikasi --}}

<div class="bg-white rounded-2xl shadow-sm border p-5">

<div class="flex justify-between items-center">

<div>

<p class="text-sm text-gray-500">
Menunggu Verifikasi
</p>

<h3 class="text-3xl font-bold mt-2 text-gray-800">
{{ $menungguVerifikasi }}
</h3>

</div>


<div class="w-12 h-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center">

<i class="bi bi-hourglass-split text-xl"></i>

</div>


</div>

</div>







{{-- Sudah Bayar --}}

<div class="bg-white rounded-2xl shadow-sm border p-5">

<div class="flex justify-between items-center">

<div>

<p class="text-sm text-gray-500">
Pembayaran Lunas
</p>

<h3 class="text-3xl font-bold mt-2">
{{ $pesertaPaid }}
</h3>

</div>


<div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">

<i class="bi bi-check-circle text-xl"></i>

</div>


</div>

</div>







{{-- Terverifikasi --}}

<div class="bg-white rounded-2xl shadow-sm border p-5">

<div class="flex justify-between items-center">

<div>

<p class="text-sm text-gray-500">
Peserta Aktif
</p>

<h3 class="text-3xl font-bold mt-2">
{{ $pesertaVerified }}
</h3>

</div>


<div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center">

<i class="bi bi-person-check text-xl"></i>

</div>


</div>

</div>






{{-- Program --}}

<div class="bg-white rounded-2xl shadow-sm border p-5">

<div class="flex justify-between items-center">

<div>

<p class="text-sm text-gray-500">
Program Aktif
</p>

<h3 class="text-3xl font-bold mt-2">
{{ $programAktif }}
</h3>

</div>


<div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center">

<i class="bi bi-mortarboard text-xl"></i>

</div>


</div>

</div>



</div>





{{-- PENDAFTARAN TERBARU --}}

<div class="bg-white rounded-2xl shadow-sm border">


<div class="p-6 border-b">

<h3 class="font-semibold text-lg text-gray-800">
Pendaftaran Terbaru
</h3>

</div>




<div class="overflow-x-auto">

<table class="w-full text-sm">


<thead class="bg-gray-50">

<tr>

<th class="px-6 py-4 text-left">
Nama
</th>

<th class="px-6 py-4 text-left">
Program
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


@foreach($recentRegistrations as $item)


<tr class="border-t hover:bg-gray-50">


<td class="px-6 py-4 font-medium">

{{ $item->full_name }}

</td>



<td class="px-6 py-4">

{{ $item->program->name ?? '-' }}

</td>



<td class="px-6 py-4">


@if($item->payment_status == 'waiting_verification')

<span class="px-3 py-1 rounded-full text-xs bg-orange-100 text-orange-700">
Menunggu Verifikasi
</span>


@elseif($item->payment_status == 'paid')

<span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">
Lunas
</span>


@elseif($item->payment_status == 'rejected')

<span class="px-3 py-1 rounded-full text-xs bg-red-100 text-red-700">
Ditolak
</span>


@else

<span class="px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-600">
Belum Upload
</span>


@endif


</td>




<td class="px-6 py-4">

{{ $item->created_at->format('d M Y') }}

</td>


</tr>


@endforeach


</tbody>


</table>


</div>


</div>





{{-- PROGRAM STATISTIC --}}

<div class="bg-white rounded-2xl shadow-sm border p-6">


<h3 class="font-semibold text-lg mb-5">
Statistik Program
</h3>



<div class="grid md:grid-cols-2 gap-5">


@foreach($programStats as $program)


<div class="border rounded-xl p-5 flex justify-between">


<div>

<p class="text-gray-500 text-sm">
{{ $program->name }}
</p>


<h4 class="text-2xl font-bold mt-2">
{{ $program->registrations_count }}
</h4>

<p class="text-xs text-gray-500">
Peserta
</p>


</div>


<i class="bi bi-mortarboard text-3xl text-blue-600"></i>


</div>


@endforeach


</div>


</div>




</div>


@endsection