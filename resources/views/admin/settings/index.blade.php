@extends('layouts.admin')

@section('title', 'Pengaturan Website')

@section('content')

{{-- SUCCESS --}}
@if(session('success'))
    <div
        class="mb-6 flex items-center gap-4 rounded-2xl border border-green-200 bg-green-50 p-5"
    >
        <div
            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-green-500 text-white"
        >
            <i class="bi bi-check-circle-fill text-xl"></i>
        </div>

        <div>
            <h3 class="font-bold text-green-700">
                Berhasil
            </h3>

            <p class="mt-1 text-sm text-green-600">
                {{ session('success') }}
            </p>
        </div>
    </div>
@endif


{{-- ERROR --}}
@if($errors->any())
    <div
        class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5"
    >
        <div class="flex gap-4">

            <div
                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-red-500 text-white"
            >
                <i class="bi bi-exclamation-triangle-fill text-xl"></i>
            </div>

            <div>
                <h3 class="font-bold text-red-700">
                    Terjadi Kesalahan
                </h3>

                <ul class="mt-2 space-y-1 text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li class="flex gap-2">
                            <span>•</span>
                            <span>{{ $error }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
@endif


<form
    action="{{ route('admin.settings.update') }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf

    <div
        class="overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-sm"
    >

        {{-- ===================================================== --}}
        {{-- HEADER --}}
        {{-- ===================================================== --}}

        <div
            class="relative overflow-hidden bg-gradient-to-br from-[#2E3192] via-[#3437a8] to-indigo-700 px-8 py-10"
        >

            {{-- Decorative --}}
            <div
                class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-white/10 blur-2xl"
            ></div>

            <div
                class="absolute -bottom-32 left-1/3 h-72 w-72 rounded-full bg-[#F6D21A]/10 blur-3xl"
            ></div>


            <div
                class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between"
            >

                <div>

                    <div
                        class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-semibold text-white backdrop-blur"
                    >
                        <i class="bi bi-sliders"></i>
                        Website Configuration
                    </div>

                    <h1
                        class="text-3xl font-extrabold tracking-tight text-white lg:text-4xl"
                    >
                        Pengaturan Website
                    </h1>

                    <p
                        class="mt-3 max-w-2xl leading-7 text-blue-100"
                    >
                        Kelola informasi utama website Bina Insani,
                        mulai dari logo, kontak, alamat hingga media sosial.
                    </p>

                </div>


                <div
                    class="hidden h-24 w-24 items-center justify-center rounded-[28px] border border-white/20 bg-white/10 backdrop-blur lg:flex"
                >
                    <i
                        class="bi bi-gear-wide-connected text-5xl text-white"
                    ></i>
                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- BODY --}}
        {{-- ===================================================== --}}

        <div class="p-6 lg:p-8">


            {{-- INFORMATION --}}
            <div
                class="mb-8 overflow-hidden rounded-2xl border border-[#2E3192]/10 bg-[#2E3192]/5"
            >

                <div class="flex gap-4 p-6">

                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#2E3192] text-white"
                    >
                        <i class="bi bi-info-circle-fill text-xl"></i>
                    </div>

                    <div>

                        <h3 class="font-bold text-slate-800">
                            Tentang Pengaturan Website
                        </h3>

                        <p
                            class="mt-2 max-w-4xl text-sm leading-7 text-slate-600"
                        >
                            Data yang disimpan pada halaman ini akan digunakan
                            secara otomatis pada Landing Page Bina Insani.
                            Pastikan informasi seperti nomor WhatsApp,
                            email, alamat dan media sosial sudah benar.
                        </p>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- GRID FORM --}}
            {{-- ================================================= --}}

            <div class="grid gap-8 lg:grid-cols-2">


                {{-- ================================================= --}}
                {{-- LOGO WEBSITE --}}
                {{-- ================================================= --}}

                <div class="lg:col-span-2">

                    <div
                        class="rounded-3xl border border-slate-200 bg-slate-50/70 p-6"
                    >

                        <div class="mb-5 flex items-center gap-3">

                            <div
                                class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]"
                            >
                                <i class="bi bi-image-fill text-xl"></i>
                            </div>

                            <div>

                                <h3 class="font-bold text-slate-800">
                                    Logo Website
                                </h3>

                                <p class="text-sm text-slate-500">
                                    Logo yang akan digunakan pada website.
                                </p>

                            </div>

                        </div>


                        <div class="grid gap-6 md:grid-cols-[220px_1fr]">

                            {{-- Preview --}}
                            <div
                                class="flex min-h-[180px] items-center justify-center rounded-2xl border border-slate-200 bg-white p-6"
                            >

                                @if(setting('logo'))

                                    <img
                                        src="{{ asset('images/'.setting('logo')) }}"
                                        alt="Logo Website"
                                        class="max-h-36 max-w-full object-contain"
                                    >

                                @else

                                    <div class="text-center">

                                        <div
                                            class="mx-auto flex h-20 w-20 items-center justify-center rounded-2xl bg-slate-100"
                                        >
                                            <i
                                                class="bi bi-image text-4xl text-slate-300"
                                            ></i>
                                        </div>

                                        <p
                                            class="mt-3 text-sm text-slate-400"
                                        >
                                            Belum ada logo
                                        </p>

                                    </div>

                                @endif

                            </div>


                            {{-- Upload --}}
                            <div class="flex flex-col justify-center">

                                <label
                                    class="mb-2 block font-semibold text-slate-700"
                                >
                                    Upload Logo Baru
                                </label>

                                <input
                                    type="file"
                                    name="logo"
                                    accept=".jpg,.jpeg,.png,.svg"
                                    class="block w-full rounded-2xl border border-slate-300 bg-white p-3 text-sm transition focus:border-[#2E3192] focus:ring-4 focus:ring-[#2E3192]/10"
                                >

                                <p class="mt-3 text-xs text-slate-500">
                                    Format yang didukung:
                                    JPG, JPEG, PNG atau SVG.
                                </p>

                                @error('logo')
                                    <p class="mt-2 text-sm font-medium text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- WHATSAPP --}}
                {{-- ================================================= --}}

                <div>

                    <label
                        class="mb-2 block font-semibold text-slate-700"
                    >
                        WhatsApp Admin
                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-whatsapp absolute left-4 top-1/2 -translate-y-1/2 text-xl text-green-500"
                        ></i>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone', setting('phone')) }}"
                            placeholder="6281234567890"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"
                        >

                    </div>

                    <p class="mt-2 text-xs text-slate-400">
                        Gunakan format internasional tanpa tanda +.
                        Contoh: 6281234567890
                    </p>

                    @error('phone')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ================================================= --}}
                {{-- EMAIL --}}
                {{-- ================================================= --}}

                <div>

                    <label
                        class="mb-2 block font-semibold text-slate-700"
                    >
                        Email Admin
                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-envelope-fill absolute left-4 top-1/2 -translate-y-1/2 text-xl text-sky-500"
                        ></i>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', setting('email')) }}"
                            placeholder="admin@binainsani.id"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                        >

                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ================================================= --}}
                {{-- ALAMAT --}}
                {{-- ================================================= --}}

                <div class="lg:col-span-2">

                    <label
                        class="mb-2 block font-semibold text-slate-700"
                    >
                        Alamat Kantor
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        placeholder="Masukkan alamat lengkap kantor..."
                        class="w-full rounded-2xl border border-slate-300 px-5 py-4 outline-none transition focus:border-[#2E3192] focus:ring-4 focus:ring-[#2E3192]/10"
                    >{{ old('address', setting('address')) }}</textarea>

                    @error('address')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ================================================= --}}
                {{-- FACEBOOK --}}
                {{-- ================================================= --}}

                <div>

                    <label class="mb-2 block font-semibold text-slate-700">
                        Facebook
                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-facebook absolute left-4 top-1/2 -translate-y-1/2 text-xl text-blue-600"
                        ></i>

                        <input
                            type="url"
                            name="facebook"
                            value="{{ old('facebook', setting('facebook')) }}"
                            placeholder="https://facebook.com/binainsani"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                        >

                    </div>

                    @error('facebook')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ================================================= --}}
                {{-- INSTAGRAM --}}
                {{-- ================================================= --}}

                <div>

                    <label class="mb-2 block font-semibold text-slate-700">
                        Instagram
                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-instagram absolute left-4 top-1/2 -translate-y-1/2 text-xl text-pink-500"
                        ></i>

                        <input
                            type="url"
                            name="instagram"
                            value="{{ old('instagram', setting('instagram')) }}"
                            placeholder="https://instagram.com/binainsani"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 outline-none transition focus:border-pink-500 focus:ring-4 focus:ring-pink-100"
                        >

                    </div>

                    @error('instagram')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ================================================= --}}
                {{-- TIKTOK --}}
                {{-- ================================================= --}}

                <div>

                    <label class="mb-2 block font-semibold text-slate-700">
                        TikTok
                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-tiktok absolute left-4 top-1/2 -translate-y-1/2 text-xl text-slate-800"
                        ></i>

                        <input
                            type="url"
                            name="tiktok"
                            value="{{ old('tiktok', setting('tiktok')) }}"
                            placeholder="https://tiktok.com/@binainsani"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 outline-none transition focus:border-slate-500 focus:ring-4 focus:ring-slate-100"
                        >

                    </div>

                    @error('tiktok')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ================================================= --}}
                {{-- YOUTUBE --}}
                {{-- ================================================= --}}

                <div>

                    <label class="mb-2 block font-semibold text-slate-700">
                        YouTube
                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-youtube absolute left-4 top-1/2 -translate-y-1/2 text-xl text-red-500"
                        ></i>

                        <input
                            type="url"
                            name="youtube"
                            value="{{ old('youtube', setting('youtube')) }}"
                            placeholder="https://youtube.com/@binainsani"
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 outline-none transition focus:border-red-500 focus:ring-4 focus:ring-red-100"
                        >

                    </div>

                    @error('youtube')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ================================================= --}}
                {{-- COPYRIGHT --}}
                {{-- ================================================= --}}

                <div class="lg:col-span-2">

                    <label
                        class="mb-2 block font-semibold text-slate-700"
                    >
                        Copyright Website
                    </label>

                    <div class="relative">

                        <i
                            class="bi bi-c-circle absolute left-4 top-1/2 -translate-y-1/2 text-xl text-slate-500"
                        ></i>

                        <input
                            type="text"
                            name="copyright"
                            value="{{ old('copyright', setting('copyright')) }}"
                            placeholder="© 2026 Bina Insani Training Center. All Rights Reserved."
                            class="w-full rounded-2xl border border-slate-300 py-4 pl-12 pr-5 outline-none transition focus:border-[#2E3192] focus:ring-4 focus:ring-[#2E3192]/10"
                        >

                    </div>

                    @error('copyright')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ================================================= --}}
                {{-- PREVIEW --}}
                {{-- ================================================= --}}

                <div class="lg:col-span-2">

                    <div
                        class="rounded-3xl border border-slate-200 bg-gradient-to-br from-slate-50 via-white to-slate-50 p-7"
                    >

                        <div class="flex items-center gap-4">

                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#2E3192] text-white shadow-sm"
                            >
                                <i class="bi bi-eye-fill text-2xl"></i>
                            </div>

                            <div>

                                <h3 class="text-xl font-bold text-slate-800">
                                    Preview Informasi Website
                                </h3>

                                <p class="text-sm text-slate-500">
                                    Informasi yang saat ini tersimpan.
                                </p>

                            </div>

                        </div>


                        <div class="mt-7 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                            {{-- WhatsApp --}}
                            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-100 text-green-600"
                                    >
                                        <i class="bi bi-whatsapp"></i>
                                    </div>

                                    <div>

                                        <p class="text-xs text-slate-400">
                                            WhatsApp
                                        </p>

                                        <p class="mt-1 font-semibold text-slate-800">
                                            {{ setting('phone') ?: '-' }}
                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- Email --}}
                            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-100 text-sky-600"
                                    >
                                        <i class="bi bi-envelope-fill"></i>
                                    </div>

                                    <div>

                                        <p class="text-xs text-slate-400">
                                            Email
                                        </p>

                                        <p class="mt-1 break-all font-semibold text-slate-800">
                                            {{ setting('email') ?: '-' }}
                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- Address --}}
                            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:col-span-2 lg:col-span-1">

                                <div class="flex items-start gap-3">

                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]"
                                    >
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>

                                    <div>

                                        <p class="text-xs text-slate-400">
                                            Alamat
                                        </p>

                                        <p class="mt-1 text-sm font-semibold leading-6 text-slate-800">
                                            {{ setting('address') ?: '-' }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Social Media --}}
                        <div class="mt-6">

                            <p
                                class="mb-3 text-sm font-semibold text-slate-700"
                            >
                                Media Sosial
                            </p>

                            <div class="flex flex-wrap gap-3">

                                @if(setting('facebook'))
                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-blue-50 px-4 py-2 text-sm font-medium text-blue-600"
                                    >
                                        <i class="bi bi-facebook"></i>
                                        Facebook
                                    </span>
                                @endif

                                @if(setting('instagram'))
                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-pink-50 px-4 py-2 text-sm font-medium text-pink-600"
                                    >
                                        <i class="bi bi-instagram"></i>
                                        Instagram
                                    </span>
                                @endif

                                @if(setting('tiktok'))
                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700"
                                    >
                                        <i class="bi bi-tiktok"></i>
                                        TikTok
                                    </span>
                                @endif

                                @if(setting('youtube'))
                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-red-50 px-4 py-2 text-sm font-medium text-red-600"
                                    >
                                        <i class="bi bi-youtube"></i>
                                        YouTube
                                    </span>
                                @endif

                                @if(
                                    !setting('facebook') &&
                                    !setting('instagram') &&
                                    !setting('tiktok') &&
                                    !setting('youtube')
                                )
                                    <span class="text-sm text-slate-400">
                                        Belum ada media sosial yang ditambahkan.
                                    </span>
                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- FOOTER ACTION --}}
        {{-- ===================================================== --}}

        <div
            class="flex flex-col items-center justify-between gap-5 border-t border-slate-200 bg-slate-50 px-6 py-6 md:flex-row lg:px-8"
        >

            <div class="flex items-center gap-3">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100"
                >
                    <i
                        class="bi bi-shield-check text-2xl text-emerald-600"
                    ></i>
                </div>

                <div>

                    <h4 class="font-bold text-slate-800">
                        Pengaturan Aman
                    </h4>

                    <p class="text-sm text-slate-500">
                        Perubahan akan diterapkan setelah disimpan.
                    </p>

                </div>

            </div>


            <button
                type="submit"
                class="inline-flex w-full items-center justify-center gap-3 rounded-2xl bg-[#2E3192] px-8 py-4 font-bold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-indigo-800 hover:shadow-xl md:w-auto"
            >
                <i class="bi bi-check-circle-fill text-lg"></i>

                Simpan Pengaturan
            </button>

        </div>

    </div>

</form>

@endsection