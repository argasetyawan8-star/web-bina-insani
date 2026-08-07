@extends('layouts.admin')

@section('title','Edit Program')

@section('content')

<div class="max-w-5xl mx-auto">

<div class="bg-white rounded-3xl shadow border p-10">

<h1 class="text-3xl font-bold">

Edit Program Diklat

</h1>

<p class="text-gray-500 mt-2">

Perbarui informasi program.

</p>

<form
action="{{ route('admin.programs.update',$program) }}"
method="POST"
class="mt-10 space-y-6">

@csrf
@method('PUT')

<div>

<label class="font-medium">

Nama Program

</label>

<input
type="text"
name="name"
value="{{ old('name',$program->name) }}"
class="mt-2 w-full rounded-xl border p-3">

</div>



<div class="grid md:grid-cols-2 gap-6">

<div>

<label class="font-medium">

Biaya Pendaftaran

</label>

<input
type="number"
name="registration_fee"
value="{{ old('registration_fee',$program->registration_fee) }}"
class="mt-2 w-full rounded-xl border p-3">

</div>

<div>

<label class="font-medium">

Biaya Diklat

</label>

<input
type="number"
name="training_fee"
value="{{ old('training_fee',$program->training_fee) }}"
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
value="{{ old('training_days',$program->training_days) }}"
class="mt-2 w-full rounded-xl border p-3">

</div>

<div>

<label class="font-medium">

Jam Pelatihan

</label>

<input
type="text"
name="training_hours"
value="{{ old('training_hours',$program->training_hours) }}"
class="mt-2 w-full rounded-xl border p-3">

</div>

<div>

<label class="font-medium">

Durasi

</label>

<input
type="text"
name="duration"
value="{{ old('duration',$program->duration) }}"
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
class="mt-2 w-full rounded-xl border p-3">{{ old('description',$program->description) }}</textarea>

</div>



<div>

<label class="font-medium">

Status Program

</label>

<select
name="is_active"
class="mt-2 w-full rounded-xl border p-3">

<option value="1"
{{ $program->is_active ? 'selected' : '' }}>

Aktif

</option>

<option value="0"
{{ !$program->is_active ? 'selected' : '' }}>

Nonaktif

</option>

</select>

</div>



<div class="flex justify-end gap-4">

<a
href="{{ route('admin.programs.index') }}"
class="px-6 py-3 rounded-xl border">

Batal

</a>

<button
class="px-6 py-3 rounded-xl bg-blue-600 text-white">

<i class="bi bi-check-circle me-2"></i>

Update Program

</button>

</div>

</form>

</div>

</div>

@endsection