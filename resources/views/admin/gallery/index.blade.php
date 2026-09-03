@extends('layouts.admin')

@section('title', 'Gallery Website')

@section('content')

<div class="space-y-6">

    @if(session('success'))
        <div class="rounded-lg bg-green-100 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-xl bg-white p-6 shadow">

        <h2 class="mb-5 text-2xl font-bold">

            Gallery Website

        </h2>

        <form
            action="{{ route('admin.gallery.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <input
                type="file"
                name="image"
                required
                class="mb-4 block w-full rounded-lg border p-3">

            <button
                class="rounded-lg bg-blue-600 px-5 py-3 text-white">

                Upload Foto

            </button>

        </form>

    </div>

    <div class="grid gap-6 md:grid-cols-3">

        @foreach($galleries as $gallery)

            <div class="overflow-hidden rounded-xl bg-white shadow">

                <img
                    src="{{ asset('images/'.$gallery->image) }}"
                    class="h-64 w-full object-cover">

                <div class="p-4">

                    <form
                        action="{{ route('admin.gallery.destroy', $gallery) }}"
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Hapus foto ini?')"
                            class="w-full rounded-lg bg-red-600 py-2 text-white">

                            Hapus

                        </button>

                    </form>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection