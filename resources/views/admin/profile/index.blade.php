@extends('layouts.admin')

@section('title', 'Profil Saya')

@section('content')

<div class="mx-auto max-w-4xl">

    @if(session('success'))
        <div class="mb-6 flex items-center gap-4 rounded-2xl border border-green-200 bg-green-50 p-5">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-500 text-white">
                <i class="bi bi-check-circle-fill text-xl"></i>
            </div>

            <div>
                <h3 class="font-bold text-green-700">
                    Berhasil
                </h3>

                <p class="text-sm text-green-600">
                    {{ session('success') }}
                </p>
            </div>
        </div>
    @endif

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r from-[#2E3192] via-indigo-600 to-blue-600 px-8 py-8">

            <div class="flex items-center gap-5">

                <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-white/20 text-white">
                    <i class="bi bi-person-fill text-5xl"></i>
                </div>

                <div>
                    <h1 class="text-3xl font-bold text-white">
                        Profil Saya
                    </h1>

                    <p class="mt-1 text-blue-100">
                        Kelola informasi akun administrator.
                    </p>
                </div>

            </div>

        </div>


        {{-- FORM --}}
        <form
            action="{{ route('admin.profile.update') }}"
            method="POST"
            class="p-8"
        >

            @csrf
            @method('PUT')

            <div class="space-y-6">

                {{-- NAMA --}}
                <div>
                    <label class="mb-2 block font-semibold text-slate-700">
                        Nama
                    </label>

                    <div class="relative">

                        <i class="bi bi-person absolute left-4 top-1/2 -translate-y-1/2 text-[#2E3192]"></i>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 focus:border-[#2E3192] focus:ring-4 focus:ring-[#2E3192]/10"
                            required
                        >

                    </div>

                    @error('name')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- EMAIL --}}
                <div>
                    <label class="mb-2 block font-semibold text-slate-700">
                        Email
                    </label>

                    <div class="relative">

                        <i class="bi bi-envelope absolute left-4 top-1/2 -translate-y-1/2 text-[#2E3192]"></i>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 focus:border-[#2E3192] focus:ring-4 focus:ring-[#2E3192]/10"
                            required
                        >

                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- BUTTON --}}
                <div class="flex justify-end border-t border-slate-200 pt-6">

                    <button
                        type="submit"
                        class="inline-flex items-center gap-3 rounded-2xl bg-[#2E3192] px-7 py-4 font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:bg-indigo-800"
                    >

                        <i class="bi bi-check-circle-fill"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection