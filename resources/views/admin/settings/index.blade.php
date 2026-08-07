@extends('layouts.admin')

@section('title', 'Pengaturan Website')

@section('content')

@if(session('success'))

<div
    class="mb-6 flex items-center gap-3 rounded-2xl border border-green-200 bg-green-50 p-5">

    <div
        class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-500 text-white">

        <i class="bi bi-check-circle-fill text-xl"></i>

    </div>

    <div>

        <h3 class="font-semibold text-green-700">

            Berhasil

        </h3>

        <p class="text-sm text-green-600">

            {{ session('success') }}

        </p>

    </div>

</div>

@endif


<form
    action="{{ route('admin.settings.update') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- HEADER --}}
        <div
            class="border-b bg-gradient-to-r from-blue-600 via-sky-500 to-indigo-600 px-8 py-8">

            <div class="flex items-center justify-between">

                <div>

                    <h1
                        class="text-3xl font-bold text-white">

                        Pengaturan Website

                    </h1>

                    <p
                        class="mt-2 text-blue-100">

                        Kelola informasi website Bina Insani yang tampil
                        pada Landing Page.

                    </p>

                </div>

                <div
                    class="hidden h-20 w-20 items-center justify-center rounded-3xl bg-white/20 lg:flex">

                    <i
                        class="bi bi-gear-fill text-5xl text-white">

                    </i>

                </div>

            </div>

        </div>

        {{-- BODY --}}
        <div class="p-8">

            {{-- Informasi --}}
            <div
                class="mb-8 rounded-2xl border border-blue-200 bg-blue-50 p-6">

                <div class="flex gap-4">

                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white">

                        <i
                            class="bi bi-info-circle-fill text-xl">

                        </i>

                    </div>

                    <div>

                        <h3
                            class="font-semibold text-slate-800">

                            Informasi

                        </h3>

                        <p
                            class="mt-2 text-sm leading-7 text-slate-600">

                            Semua data yang diubah di halaman ini akan langsung
                            digunakan pada Landing Page seperti logo,
                            nama website, kontak admin,
                            footer serta media sosial.

                        </p>

                    </div>

                </div>

            </div>

            {{-- GRID FORM --}}
            <div
                class="grid gap-8 lg:grid-cols-2">

                                {{-- ===========================
                        LOGO WEBSITE
                ============================ --}}
                <div>

                    <label class="mb-2 block font-semibold text-slate-700">

                        Logo Website

                    </label>

                    <div
                        class="rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 p-6">

                        @if(setting('logo'))

                            <div class="mb-6 flex justify-center">

                                <img
                                    src="{{ asset('storage/'.setting('logo')) }}"
                                    class="h-28 rounded-xl object-contain">

                            </div>

                        @else

                            <div
                                class="mb-6 flex h-28 items-center justify-center rounded-xl bg-white">

                                <i
                                    class="bi bi-image text-6xl text-slate-300">

                                </i>

                            </div>

                        @endif

                        <input
                            type="file"
                            name="logo"
                            class="block w-full rounded-xl border bg-white p-3">

                        <p
                            class="mt-3 text-xs text-slate-500">

                            Format JPG, PNG atau SVG.

                        </p>

                    </div>

                </div>



                {{-- ===========================
                        NAMA WEBSITE
                ============================ --}}
                <div>

                    <label
                        class="mb-2 block font-semibold text-slate-700">

                        Nama Website

                    </label>

                    <input
                        type="text"
                        name="site_name"
                        value="{{ setting('site_name') }}"
                        placeholder="Bina Insani Platform"
                        class="w-full rounded-2xl border border-slate-300 px-5 py-4 focus:border-blue-500 focus:ring-4 focus:ring-blue-100">

                </div>



                {{-- ===========================
                        WHATSAPP
                ============================ --}}
                <div>

                    <label
                        class="mb-2 block font-semibold text-slate-700">

                        WhatsApp Admin

                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-whatsapp absolute left-4 top-1/2 -translate-y-1/2 text-xl text-green-500">

                        </i>

                        <input
                            type="text"
                            name="phone"
                            value="{{ setting('phone') }}"
                            placeholder="6281234567890"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 focus:border-green-500 focus:ring-4 focus:ring-green-100">

                    </div>

                </div>



                {{-- ===========================
                        EMAIL
                ============================ --}}
                <div>

                    <label
                        class="mb-2 block font-semibold text-slate-700">

                        Email Admin

                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-envelope-fill absolute left-4 top-1/2 -translate-y-1/2 text-sky-500">

                        </i>

                        <input
                            type="email"
                            name="email"
                            value="{{ setting('email') }}"
                            placeholder="admin@binainsani.id"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                    </div>

                </div>

                                {{-- ===========================
                        ALAMAT
                ============================ --}}
                <div class="lg:col-span-2">

                    <label
                        class="mb-2 block font-semibold text-slate-700">

                        Alamat Kantor

                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        placeholder="Masukkan alamat lengkap kantor..."
                        class="w-full rounded-2xl border border-slate-300 px-5 py-4 focus:border-blue-500 focus:ring-4 focus:ring-blue-100">{{ setting('address') }}</textarea>

                </div>



                {{-- ===========================
                        FACEBOOK
                ============================ --}}
                <div>

                    <label
                        class="mb-2 block font-semibold text-slate-700">

                        Facebook

                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-facebook absolute left-4 top-1/2 -translate-y-1/2 text-blue-600">

                        </i>

                        <input
                            type="text"
                            name="facebook"
                            value="{{ setting('facebook') }}"
                            placeholder="https://facebook.com/binainsani"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 focus:border-blue-500 focus:ring-4 focus:ring-blue-100">

                    </div>

                </div>



                {{-- ===========================
                        INSTAGRAM
                ============================ --}}
                <div>

                    <label
                        class="mb-2 block font-semibold text-slate-700">

                        Instagram

                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-instagram absolute left-4 top-1/2 -translate-y-1/2 text-pink-500">

                        </i>

                        <input
                            type="text"
                            name="instagram"
                            value="{{ setting('instagram') }}"
                            placeholder="https://instagram.com/binainsani"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 focus:border-pink-500 focus:ring-4 focus:ring-pink-100">

                    </div>

                </div>



                {{-- ===========================
                        TIKTOK
                ============================ --}}
                <div>

                    <label
                        class="mb-2 block font-semibold text-slate-700">

                        TikTok

                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-tiktok absolute left-4 top-1/2 -translate-y-1/2 text-slate-800">

                        </i>

                        <input
                            type="text"
                            name="tiktok"
                            value="{{ setting('tiktok') }}"
                            placeholder="https://tiktok.com/@binainsani"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 focus:border-slate-500 focus:ring-4 focus:ring-slate-100">

                    </div>

                </div>



                {{-- ===========================
                        YOUTUBE
                ============================ --}}
                <div>

                    <label
                        class="mb-2 block font-semibold text-slate-700">

                        YouTube

                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-youtube absolute left-4 top-1/2 -translate-y-1/2 text-red-500">

                        </i>

                        <input
                            type="text"
                            name="youtube"
                            value="{{ setting('youtube') }}"
                            placeholder="https://youtube.com/@binainsani"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 focus:border-red-500 focus:ring-4 focus:ring-red-100">

                    </div>

                </div>



                {{-- ===========================
                        PREVIEW KONTAK
                ============================ --}}
                <div class="lg:col-span-2">

                    <div
                        class="rounded-3xl border border-slate-200 bg-gradient-to-r from-slate-50 via-white to-slate-50 p-8">

                        <div class="flex items-center gap-3">

                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-600 text-white">

                                <i class="bi bi-eye-fill text-2xl"></i>

                            </div>

                            <div>

                                <h3
                                    class="text-xl font-bold text-slate-800">

                                    Preview Informasi Website

                                </h3>

                                <p
                                    class="text-slate-500">

                                    Data berikut akan ditampilkan pada Landing Page.

                                </p>

                            </div>

                        </div>

                        <div
                            class="mt-8 grid gap-5 md:grid-cols-2">

                            <div class="rounded-2xl bg-white p-5 shadow-sm">

                                <p class="text-sm text-slate-500">

                                    WhatsApp

                                </p>

                                <p class="mt-2 font-semibold text-slate-800">

                                    {{ setting('whatsapp') ?: '-' }}

                                </p>

                            </div>

                            <div class="rounded-2xl bg-white p-5 shadow-sm">

                                <p class="text-sm text-slate-500">

                                    Email

                                </p>

                                <p class="mt-2 font-semibold text-slate-800">

                                    {{ setting('email') ?: '-' }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                                {{-- ===========================
                        COPYRIGHT
                ============================ --}}
                <div class="lg:col-span-2">

                    <label
                        class="mb-2 block font-semibold text-slate-700">

                        Copyright Website

                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-c-circle absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">

                        </i>

                        <input
                            type="text"
                            name="copyright"
                            value="{{ setting('copyright') }}"
                            placeholder="© 2026 Bina Insani Training Center. All Rights Reserved."
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 focus:border-blue-500 focus:ring-4 focus:ring-blue-100">

                    </div>

                </div>

            </div>

        </div>

        {{-- ===========================
                FOOTER ACTION
        ============================ --}}
        <div
            class="flex flex-col items-center justify-between gap-5 border-t bg-slate-50 px-8 py-6 md:flex-row">

            <div class="flex items-center gap-3">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100">

                    <i
                        class="bi bi-shield-check text-2xl text-emerald-600">

                    </i>

                </div>

                <div>

                    <h4
                        class="font-semibold text-slate-800">

                        Pengaturan Aman

                    </h4>

                    <p
                        class="text-sm text-slate-500">

                        Data akan langsung digunakan pada Landing Page
                        setelah disimpan.

                    </p>

                </div>

            </div>

            <button
                type="submit"
                class="inline-flex items-center gap-3 rounded-2xl bg-gradient-to-r from-blue-600 via-sky-500 to-indigo-600 px-8 py-4 text-white font-semibold shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <i class="bi bi-check-circle-fill text-lg"></i>

                Simpan Pengaturan

            </button>

        </div>

    </div>

</form>

@endsection