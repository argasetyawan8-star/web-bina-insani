@extends('layouts.admin')

@section('title','Hero Website')

@section('content')

@if(session('success'))

<div
    class="mb-6 flex items-center gap-4 rounded-2xl border border-green-200 bg-green-50 p-5">

    <div
        class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-500 text-white">

        <i class="bi bi-check-circle-fill text-xl"></i>

    </div>

    <div>

        <h3 class="font-semibold text-green-700">

            Berhasil

        </h3>

        <p class="text-green-600">

            {{ session('success') }}

        </p>

    </div>

</div>

@endif

<form
    action="{{ route('admin.hero.update') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- HEADER --}}
        <div
            class="bg-gradient-to-r from-blue-600 via-sky-500 to-indigo-600 px-8 py-8">

            <div class="flex items-center justify-between">

                <div>

                    <h1
                        class="text-3xl font-bold text-white">

                        Hero Landing Page

                    </h1>

                    <p
                        class="mt-2 text-blue-100">

                        Kelola tampilan utama website Bina Insani.

                    </p>

                </div>

                <div
                    class="hidden lg:flex h-20 w-20 items-center justify-center rounded-3xl bg-white/20">

                    <i
                        class="bi bi-stars text-5xl text-white"></i>

                </div>

            </div>

        </div>

        {{-- BODY --}}
        <div class="p-8">

            <div
                class="grid gap-8 lg:grid-cols-2">

                                {{-- Judul --}}
                <div class="lg:col-span-2">

                    <label
                        class="mb-2 block font-semibold text-slate-700">

                        Judul Hero

                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title',$hero->title) }}"
                        class="w-full rounded-2xl border border-slate-300 px-5 py-4 focus:border-blue-500 focus:ring-4 focus:ring-blue-100">

                </div>

                {{-- Subtitle --}}
                <div class="lg:col-span-2">

                    <label
                        class="mb-2 block font-semibold text-slate-700">

                        Subtitle

                    </label>

                    <textarea
                        rows="5"
                        name="subtitle"
                        class="w-full rounded-2xl border border-slate-300 px-5 py-4 focus:border-blue-500 focus:ring-4 focus:ring-blue-100">{{ old('subtitle',$hero->subtitle) }}</textarea>

                </div>

                {{-- Button 1 --}}
                <div>

                    <label
                        class="mb-2 block font-semibold">

                        Tombol Pertama

                    </label>

                    <input
                        type="text"
                        name="button_text"
                        value="{{ old('button_text',$hero->button_text) }}"
                        class="w-full rounded-xl border px-4 py-3">

                </div>

                <div>

                    <label
                        class="mb-2 block font-semibold">

                        Link Tombol Pertama

                    </label>

                    <input
                        type="text"
                        name="button_link"
                        value="{{ old('button_link',$hero->button_link) }}"
                        class="w-full rounded-xl border px-4 py-3">

                </div>

                {{-- Button 2 --}}
                <div>

                    <label
                        class="mb-2 block font-semibold">

                        Tombol Kedua

                    </label>

                    <input
                        type="text"
                        name="button2_text"
                        value="{{ old('button2_text',$hero->button2_text) }}"
                        class="w-full rounded-xl border px-4 py-3">

                </div>

                <div>

                    <label
                        class="mb-2 block font-semibold">

                        Link Tombol Kedua

                    </label>

                    <input
                        type="text"
                        name="button2_link"
                        value="{{ old('button2_link',$hero->button2_link) }}"
                        class="w-full rounded-xl border px-4 py-3">

                </div>

                                {{-- Upload Gambar --}}
                <div class="lg:col-span-2">

                    <label class="mb-2 block font-semibold text-slate-700">

                        Gambar Hero

                    </label>

                    <div class="rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 p-6">

                        @if($hero->image)

                            <div class="mb-6 flex justify-center">

                                <img
                                    src="{{ asset('storage/'.$hero->image) }}"
                                    class="h-64 rounded-2xl object-cover shadow-lg">

                            </div>

                        @else

                            <div
                                class="mb-6 flex h-64 items-center justify-center rounded-2xl bg-white">

                                <div class="text-center">

                                    <i class="bi bi-image text-6xl text-slate-300"></i>

                                    <p class="mt-3 text-slate-500">

                                        Belum ada gambar Hero

                                    </p>

                                </div>

                            </div>

                        @endif

                        <input
                            type="file"
                            name="image"
                            class="block w-full rounded-xl border bg-white p-3">

                        <p class="mt-3 text-xs text-slate-500">

                            Format JPG / PNG • Maksimal 2 MB

                        </p>

                    </div>

                </div>

                {{-- Preview --}}
                <div class="lg:col-span-2">

                    <div
                        class="rounded-3xl bg-gradient-to-r from-blue-600 via-sky-500 to-indigo-700 p-10 text-white shadow-xl">

                        <span
                            class="rounded-full bg-white/20 px-4 py-2 text-sm">

                            Preview Landing Page

                        </span>

                        <h1
                            class="mt-6 text-5xl font-extrabold leading-tight">

                            {{ $hero->title ?: 'Judul Hero' }}

                        </h1>

                        <p
                            class="mt-6 max-w-3xl text-lg leading-8 text-blue-100">

                            {{ $hero->subtitle ?: 'Subtitle Hero akan muncul di sini.' }}

                        </p>

                        <div class="mt-8 flex flex-wrap gap-4">

                            @if($hero->button_text)

                                <span
                                    class="rounded-xl bg-orange-500 px-6 py-3 font-semibold">

                                    {{ $hero->button_text }}

                                </span>

                            @endif

                            @if($hero->button2_text)

                                <span
                                    class="rounded-xl border border-white px-6 py-3 font-semibold">

                                    {{ $hero->button2_text }}

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Footer --}}
        <div
            class="flex items-center justify-between border-t bg-slate-50 px-8 py-6">

            <div>

                <h3
                    class="font-semibold text-slate-800">

                    Hero Landing Page

                </h3>

                <p
                    class="text-sm text-slate-500">

                    Perubahan akan langsung tampil pada Landing Page setelah disimpan.

                </p>

            </div>

            <button
                type="submit"
                class="inline-flex items-center gap-3 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:shadow-xl">

                <i class="bi bi-check-circle-fill"></i>

                Simpan Hero

            </button>

        </div>

    </div>

</form>

@endsection