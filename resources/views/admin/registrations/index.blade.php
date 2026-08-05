@extends('layouts.admin')


@section('title')

Data Peserta

@endsection



@section('content')


<div class="bg-white rounded-xl shadow-sm border">


<div class="p-6 border-b">

<h2 class="text-lg font-semibold">
    Data Peserta
</h2>

<form method="GET"
class="p-6 grid md:grid-cols-4 gap-4">


<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Cari nama peserta..."
class="border rounded-lg px-4 py-2">



<select name="payment_status"
class="border rounded-lg px-4 py-2">

<option value="">
Semua Pembayaran
</option>

<option value="paid"
{{ request('payment_status')=='paid'?'selected':'' }}>
Paid
</option>


<option value="unpaid"
{{ request('payment_status')=='unpaid'?'selected':'' }}>
Unpaid
</option>


</select>




<select name="status"
class="border rounded-lg px-4 py-2">

<option value="">
Semua Status
</option>


<option value="pending"
{{ request('status')=='pending'?'selected':'' }}>
Pending
</option>


<option value="verified"
{{ request('status')=='verified'?'selected':'' }}>
Verified
</option>


<option value="rejected"
{{ request('status')=='rejected'?'selected':'' }}>
Rejected
</option>


</select>




<select name="program_id"
class="border rounded-lg px-4 py-2">


<option value="">
Semua Program
</option>


@foreach($programs as $program)

<option value="{{ $program->id }}"
{{ request('program_id')==$program->id?'selected':'' }}>

{{ $program->name }}

</option>


@endforeach


</select>


<button
class="bg-purple-700 text-white rounded-lg px-4">

Filter

</button>


</form>

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
Pembayaran
</th>


<th class="px-6 py-4 text-left">
Status
</th>


<th class="px-6 py-4 text-left">
Aksi
</th>


</tr>


</thead>



<tbody>


@foreach($registrations as $item)


<tr class="border-t">


<td class="px-6 py-4">

{{ $item->full_name }}

</td>



<td class="px-6 py-4">

{{ $item->program->name ?? '-' }}

</td>




<td class="px-6 py-4">


@if($item->payment_status == 'paid')


<span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">

Paid

</span>


@else


<span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">

Unpaid

</span>


@endif


</td>




<td class="px-6 py-4">


@if($item->status == 'verified')


<span class="px-3 py-1 rounded-full text-xs bg-blue-100 text-blue-700">

Verified

</span>


@else


<span class="px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-700">

{{ ucfirst($item->status) }}

</span>


@endif


</td>





<td class="px-6 py-4">


<a href="{{ route('admin.registrations.show',$item->id) }}"
class="px-4 py-2 bg-purple-700 text-white rounded-lg text-xs">


Detail


</a>


</td>


</tr>


@endforeach


</tbody>


</table>


</div>



<div class="p-6">

{{ $registrations->links() }}

</div>


</div>


@endsection