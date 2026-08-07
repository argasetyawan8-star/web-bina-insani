@extends('layouts.admin')

@section('title', 'Edit FAQ')

@section('content')

<form
    action="{{ route('admin.faqs.update', $faq) }}"
    method="POST"
    class="space-y-6">

    @csrf
    @method('PUT')

    <div class="rounded-2xl bg-white p-8 shadow">

        <h1 class="mb-6 text-2xl font-bold text-slate-800">
            Edit FAQ
        </h1>

        {{-- Pertanyaan --}}
        <div>

            <label class="font-semibold text-slate-700">
                Pertanyaan
            </label>

            <input
                type="text"
                name="question"
                value="{{ old('question', $faq->question) }}"
                class="mt-2 w-full rounded-xl border border-slate-300 p-3 focus:border-blue-500 focus:outline-none">

            @error('question')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>

        {{-- Jawaban --}}
        <div class="mt-6">

            <label class="font-semibold text-slate-700">
                Jawaban
            </label>

            <textarea
                name="answer"
                rows="6"
                class="mt-2 w-full rounded-xl border border-slate-300 p-3 focus:border-blue-500 focus:outline-none">{{ old('answer', $faq->answer) }}</textarea>

            @error('answer')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>

        {{-- Status --}}
        <div class="mt-6">

            <label class="inline-flex items-center gap-2">

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ old('is_active', $faq->is_active) ? 'checked' : '' }}>

                <span>Aktif</span>

            </label>

        </div>

        {{-- Tombol --}}
        <div class="mt-8 flex gap-3">

            <button
                type="submit"
                class="rounded-xl bg-blue-600 px-6 py-3 font-semibold text-white hover:bg-blue-700">

                <i class="bi bi-check-circle me-2"></i>
                Simpan Perubahan

            </button>

            <a
                href="{{ route('admin.faqs.index') }}"
                class="rounded-xl bg-slate-200 px-6 py-3 font-semibold text-slate-700 hover:bg-slate-300">

                Batal

            </a>

        </div>

    </div>

</form>

@endsection