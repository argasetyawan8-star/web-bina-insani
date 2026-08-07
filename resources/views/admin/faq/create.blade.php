@extends('layouts.admin')

@section('title','Tambah FAQ')

@section('content')

<form
action="{{ route('admin.faqs.store') }}"
method="POST"
class="space-y-6">

@csrf

<div class="rounded-xl bg-white p-6 shadow">

<label class="font-semibold">

Pertanyaan

</label>

<input
type="text"
name="question"
class="mt-2 w-full rounded-xl border p-3">

<label class="mt-6 block font-semibold">

Jawaban

</label>

<textarea
name="answer"
rows="6"
class="mt-2 w-full rounded-xl border p-3"></textarea>

<button
class="mt-6 rounded-xl bg-blue-600 px-6 py-3 text-white">

Simpan

</button>

</div>

</form>

@endsection