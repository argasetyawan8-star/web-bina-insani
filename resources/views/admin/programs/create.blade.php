@extends('layouts.admin')

@section('title','Tambah Program')

@section('content')

<div class="max-w-5xl mx-auto">

<div class="bg-white rounded-3xl shadow border p-10">

<h1 class="text-3xl font-bold">

Tambah Program Diklat

</h1>

<p class="text-gray-500 mt-2">

Masukkan informasi program pelatihan.

</p>

<form
action="{{ route('admin.programs.store') }}"
method="POST"
class="mt-10 space-y-6">

@csrf

<div>

<label class="font-medium">

Nama Program

</label>

<input
type="text"
name="name"
class="mt-2 w-full rounded-xl border p-3"
placeholder="Contoh : Diklat Intensif">

</div>



<div class="grid md:grid-cols-2 gap-6">

<div>

<label class="font-medium">

Biaya Pendaftaran

</label>

<input
type="number"
name="registration_fee"
class="mt-2 w-full rounded-xl border p-3">

</div>

<div>

<label class="font-medium">

Biaya Diklat

</label>

<input
type="number"
name="training_fee"
class="mt-2 w-full rounded-xl border p-3">

</div>

</div>



<div class="grid md:grid-cols-3 gap-6">

<div>

<label class="font-medium">

Hari Pelatihan

</label>

<input
type="text"
name="training_days"
class="mt-2 w-full rounded-xl border p-3">

</div>

<div>

<label class="font-medium">

Jam Pelatihan

</label>

<input
type="text"
name="training_hours"
class="mt-2 w-full rounded-xl border p-3">

</div>

<div>

<label class="font-medium">

Durasi

</label>

<input
type="text"
name="duration"
class="mt-2 w-full rounded-xl border p-3">

</div>

</div>



<div>

<label class="font-medium">

Deskripsi

</label>

<textarea
name="description"
rows="5"
class="mt-2 w-full rounded-xl border p-3"></textarea>

</div>



<div class="flex justify-end gap-4">

<a
href="{{ route('admin.programs.index') }}"
class="px-6 py-3 rounded-xl border">

Batal

</a>

<button
class="px-6 py-3 rounded-xl bg-blue-600 text-white hover:bg-blue-700">

<i class="bi bi-check-circle me-2"></i>

Simpan Program

</button>

</div>

</form>

</div>

</div>

@endsection