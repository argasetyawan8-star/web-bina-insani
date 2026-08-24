@extends('layouts.admin')

@section('title', 'Ubah Password')

@section('content')

<div class="mx-auto max-w-3xl">

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

                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white/20 text-white">
                    <i class="bi bi-shield-lock-fill text-3xl"></i>
                </div>

                <div>
                    <h1 class="text-3xl font-bold text-white">
                        Ubah Password
                    </h1>

                    <p class="mt-1 text-blue-100">
                        Perbarui password akun administrator Anda.
                    </p>
                </div>

            </div>

        </div>


        {{-- FORM --}}
        <form
            action="{{ route('admin.password.update') }}"
            method="POST"
            class="p-8"
        >

            @csrf
            @method('PUT')

            <div class="space-y-6">

                {{-- PASSWORD LAMA --}}
                <div>

                    <label class="mb-2 block font-semibold text-slate-700">
                        Password Saat Ini
                    </label>

                    <div class="relative">

                        <i class="bi bi-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                        <input
                            type="password"
                            name="current_password"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 focus:border-[#2E3192] focus:ring-4 focus:ring-[#2E3192]/10"
                            required
                        >

                    </div>

                    @error('current_password')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- PASSWORD BARU --}}
                <div>

                    <label class="mb-2 block font-semibold text-slate-700">
                        Password Baru
                    </label>

                    <div class="relative">

                        <i class="bi bi-lock-fill absolute left-4 top-1/2 -translate-y-1/2 text-[#2E3192]"></i>

                        <input
                            type="password"
                            name="password"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 focus:border-[#2E3192] focus:ring-4 focus:ring-[#2E3192]/10"
                            required
                        >

                    </div>

                    <p class="mt-2 text-xs text-slate-400">
                        Password minimal 8 karakter.
                    </p>

                    @error('password')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- KONFIRMASI --}}
                <div>

                    <label class="mb-2 block font-semibold text-slate-700">
                        Konfirmasi Password Baru
                    </label>

                    <div class="relative">

                        <i class="bi bi-shield-check absolute left-4 top-1/2 -translate-y-1/2 text-green-500"></i>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 focus:border-[#2E3192] focus:ring-4 focus:ring-[#2E3192]/10"
                            required
                        >

                    </div>

                </div>


                {{-- INFO --}}
                <div class="rounded-2xl border border-blue-200 bg-blue-50 p-5">

                    <div class="flex gap-3">

                        <i class="bi bi-info-circle-fill mt-1 text-blue-600"></i>

                        <p class="text-sm leading-6 text-blue-700">
                            Gunakan password yang kuat dan jangan membagikan
                            password kepada orang lain.
                        </p>

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('admin.profile.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-300 px-7 py-4 font-semibold text-slate-700 transition hover:bg-slate-50"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-3 rounded-2xl bg-[#2E3192] px-7 py-4 font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:bg-indigo-800"
                    >
                        <i class="bi bi-shield-check"></i>
                        Simpan Password
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection