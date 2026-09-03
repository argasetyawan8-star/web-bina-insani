@extends('layouts.admin')

@section('title', 'About Website')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-800">
            About Website
        </h1>

        <p class="text-slate-500 mt-2">
            Upload foto yang akan ditampilkan pada section About.
        </p>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-xl bg-green-100 text-green-700 px-5 py-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <form
            action="{{ route('admin.about.update') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="mb-8">

                <label class="block font-semibold mb-3">
                    Foto About
                </label>

                @if($about->image)

                    <img
                        src="{{ asset('images/'.$about->image) }}"
                        class="w-full max-w-md rounded-2xl shadow border">

                @else

                    <div class="w-full max-w-md h-64 rounded-2xl border-2 border-dashed border-slate-300 flex items-center justify-center text-slate-400">

                        Belum ada foto

                    </div>

                @endif

            </div>

            <div class="mb-8">

                <label class="block font-semibold mb-3">
                    Upload Foto Baru
                </label>

                <input
                    type="file"
                    name="image"
                    class="block w-full border rounded-xl px-4 py-3">

                @error('image')

                    <p class="text-red-500 text-sm mt-2">

                        {{ $message }}

                    </p>

                @enderror

            </div>

            <button
                class="px-8 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

@endsection