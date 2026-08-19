@extends('layouts.admin')

@section('title','Payment Website')

@section('content')


<div class="max-w-3xl mx-auto">

@if(session('success'))

        <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">

            {{ session('success') }}

        </div>

    @endif

<div class="rounded-3xl bg-white p-8 shadow">


<h2 class="text-3xl font-bold">
Pengaturan Pembayaran
</h2>


<p class="mt-2 text-slate-500">
Atur QRIS dan rekening pembayaran peserta.
</p>



<form
action="{{ route('admin.payment-setting.update') }}"
method="POST"
enctype="multipart/form-data"
class="mt-8 space-y-6">


@csrf


<div>

<label class="font-semibold">
Upload QRIS
</label>

<input
type="file"
name="qris"
class="mt-2 w-full rounded-xl border p-3">


@if(setting('qris'))

<img
src="{{ asset('storage/'.setting('qris')) }}"
class="mt-5 w-48 rounded-xl">

@endif

</div>



<div>

<label class="font-semibold">
Nomor Rekening
</label>


<input
type="text"
name="bank_number"
value="{{ setting('bank_account') }}"
class="mt-2 w-full rounded-xl border p-3"
placeholder="Contoh: BCA 123456789">


</div>



<button
class="rounded-xl bg-blue-600 px-6 py-3 font-bold text-white">

Simpan Perubahan

</button>


</form>


</div>


</div>


@endsection