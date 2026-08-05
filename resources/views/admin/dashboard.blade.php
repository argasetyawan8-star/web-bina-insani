@extends('layouts.admin')


@section('title')

Dashboard

@endsection



@section('content')


<div class="space-y-6">



{{-- STATISTIC CARD --}}

<div class="grid grid-cols-1 md:grid-cols-4 gap-6">


    {{-- Total Peserta --}}
    <div class="bg-white rounded-xl shadow-sm p-6 border">


        <div class="flex justify-between">


            <div>

                <p class="text-sm text-gray-500">
                    Total Peserta
                </p>


                <h3 class="text-3xl font-bold mt-2">
                    {{ $totalPeserta }}
                </h3>

            </div>


            <div class="w-12 h-12 bg-purple-100 text-purple-700 rounded-lg flex items-center justify-center">

                <i class="bi bi-people text-xl"></i>

            </div>


        </div>


    </div>




    {{-- Sudah Bayar --}}
    <div class="bg-white rounded-xl shadow-sm p-6 border">


        <div class="flex justify-between">


            <div>

                <p class="text-sm text-gray-500">
                    Sudah Bayar
                </p>


                <h3 class="text-3xl font-bold mt-2">
                    {{ $pesertaPaid }}
                </h3>

            </div>


            <div class="w-12 h-12 bg-green-100 text-green-700 rounded-lg flex items-center justify-center">

                <i class="bi bi-check-circle text-xl"></i>

            </div>


        </div>


    </div>





    {{-- Belum Bayar --}}
    <div class="bg-white rounded-xl shadow-sm p-6 border">


        <div class="flex justify-between">


            <div>

                <p class="text-sm text-gray-500">
                    Belum Bayar
                </p>


                <h3 class="text-3xl font-bold mt-2">
                    {{ $pesertaUnpaid }}
                </h3>

            </div>


            <div class="w-12 h-12 bg-yellow-100 text-yellow-700 rounded-lg flex_center">

                <i class="bi bi-clock text-xl"></i>

            </div>


        </div>


    </div>





    {{-- Program --}}
    <div class="bg-white rounded-xl shadow-sm p-6 border">


        <div class="flex justify-between">


            <div>

                <p class="text-sm text-gray-500">
                    Program Aktif
                </p>


                <h3 class="text-3xl font-bold mt-2">
                    {{ $programAktif }}
                </h3>

            </div>


            <div class="w-12 h-12 bg-blue-100 text-blue-700 rounded-lg flex items-center justify-center">

                <i class="bi bi-mortarboard text-xl"></i>

            </div>


        </div>


    </div>



</div>







{{-- TABLE REGISTRASI TERBARU --}}

<div class="bg-white rounded-xl shadow-sm border">


<div class="p-6 border-b">

<h3 class="font-semibold text-lg">
    Pendaftaran Terbaru
</h3>

</div>



<div class="overflow-x-auto">


<table class="w-full text-sm">


<thead class="bg-gray-50">

<tr>

<th class="text-left px-6 py-4">
Nama
</th>


<th class="text-left px-6 py-4">
Program
</th>


<th class="text-left px-6 py-4">
Pembayaran
</th>


<th class="text-left px-6 py-4">
Tanggal
</th>

</tr>

</thead>



<tbody>


@foreach($recentRegistrations as $item)


<tr class="border-t">


<td class="px-6 py-4">
{{ $item->full_name }}
</td>


<td class="px-6 py-4">
{{ $item->program->name ?? '-' }}
</td>


<td class="px-6 py-4">


@if($item->payment_status == 'paid')

<span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
Paid
</span>

@else

<span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
Unpaid
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




</div>


@endsection