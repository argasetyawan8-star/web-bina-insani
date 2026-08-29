<x-guest-layout>

    <div class="min-h-screen bg-slate-50 flex items-center justify-center p-4">

        <div class="w-full max-w-5xl overflow-hidden rounded-3xl bg-white shadow-2xl">

            <div class="grid md:grid-cols-2">

                {{-- =========================================================
                     LEFT SIDE
                ========================================================== --}}
                <div class="relative hidden flex-col justify-between overflow-hidden bg-gradient-to-br from-[#2E3192] via-[#3b3fa5] to-[#ED1C24] p-10 text-white md:flex">

                    {{-- Decorative Circle --}}
                    <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-white/10"></div>
                    <div class="absolute -bottom-32 -left-20 h-80 w-80 rounded-full bg-white/10"></div>

                    {{-- =====================================================
                         TOP CONTENT
                    ====================================================== --}}
                    <div class="relative z-10">

                        {{-- Logo --}}
                        <div class="mb-10 flex items-center gap-3">

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white shadow-lg">

                                @if (setting('logo'))

                                    <img
                                        src="{{ asset('storage/' . setting('logo')) }}"
                                        alt="{{ setting('website_name', 'Bina Insani') }}"
                                        class="h-full w-full object-contain p-2"
                                    >

                                @else

                                    <span class="text-xl font-black text-[#2E3192]">
                                        BI
                                    </span>

                                @endif

                            </div>

                            <div>

                                <h1 class="text-lg font-bold">
                                    {{ setting('website_name', 'Bina Insani') }}
                                </h1>

                                <p class="text-xs text-white/70">
                                    Lembaga Pelatihan Kerja
                                </p>

                            </div>

                        </div>


                        {{-- Hero --}}
                        <div class="max-w-md">

                            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-white/70">
                                Mulai Bersama Kami
                            </p>

                            <h2 class="text-4xl font-extrabold leading-tight">

                                Persiapkan Masa Depanmu

                                <span class="text-yellow-300">
                                    Bersama Bina Insani
                                </span>

                            </h2>

                            <p class="mt-5 text-sm leading-7 text-white/80">
                                Buat akun untuk mengakses program pelatihan,
                                melakukan pendaftaran, mengunggah dokumen,
                                dan memantau proses pendaftaranmu.
                            </p>

                        </div>

                    </div>


                    {{-- =====================================================
                         BOTTOM
                    ====================================================== --}}
                    <div class="relative z-10">

                        <div class="mb-5 flex items-center gap-3">

                            <div class="h-2 w-2 rounded-full bg-green-300"></div>

                            <span class="text-sm text-white/80">
                                Pendaftaran akun tersedia
                            </span>

                        </div>

                        <p class="text-xs text-white/60">
                            © {{ date('Y') }}
                            {{ setting('website_name', 'Bina Insani') }}.
                            All rights reserved.
                        </p>

                    </div>

                </div>


                {{-- =========================================================
                     RIGHT SIDE
                ========================================================== --}}
                <div class="flex items-center justify-center p-8 sm:p-12">

                    <div class="w-full max-w-md">

                        {{-- =================================================
                             MOBILE LOGO
                        ================================================== --}}
                        <div class="mb-8 text-center md:hidden">

                            <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#2E3192] text-xl font-black text-white shadow-lg">

                                @if (setting('logo'))

                                    <img
                                        src="{{ asset('storage/' . setting('logo')) }}"
                                        alt="{{ setting('website_name', 'Bina Insani') }}"
                                        class="h-full w-full rounded-2xl object-contain p-2"
                                    >

                                @else

                                    BI

                                @endif

                            </div>

                            <h1 class="text-xl font-bold text-slate-800">
                                {{ setting('website_name', 'Bina Insani') }}
                            </h1>

                            <p class="text-sm text-slate-500">
                                Lembaga Pelatihan Kerja
                            </p>

                        </div>


                        {{-- =================================================
                             HEADING
                        ================================================== --}}
                        <div class="mb-8">

                            <div class="flex items-start justify-between gap-4">

                                <div>

                                    <h2 class="text-3xl font-bold tracking-tight text-slate-800">
                                        Buat Akun 👋
                                    </h2>

                                    <p class="mt-2 text-sm leading-6 text-slate-500">
                                        Daftarkan dirimu untuk mulai mengikuti program Bina Insani.
                                    </p>

                                </div>

                                {{-- Home --}}
                                <a
                                    href="{{ route('home') }}"
                                    aria-label="Kembali ke halaman utama"
                                    class="hidden h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-slate-200 text-slate-400 transition hover:border-[#2E3192] hover:bg-[#2E3192]/5 hover:text-[#2E3192] sm:flex"
                                >
                                    <i class="bi bi-house"></i>
                                </a>

                            </div>

                        </div>


                        {{-- =================================================
                             REGISTER FORM
                        ================================================== --}}
                        <form
                            method="POST"
                            action="{{ route('register') }}"
                            class="space-y-5"
                        >

                            @csrf


                            {{-- =================================================
                                 NAME
                            ================================================== --}}
                            <div>

                                <label
                                    for="name"
                                    class="mb-2 block text-sm font-semibold text-slate-700"
                                >
                                    Nama Lengkap
                                </label>

                                <div class="relative">

                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i class="bi bi-person text-slate-400"></i>
                                    </div>

                                    <input
                                        id="name"
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                        autofocus
                                        autocomplete="name"
                                        placeholder="Masukkan nama lengkap"
                                        class="block w-full rounded-xl border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm text-slate-800 shadow-sm outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-2 focus:ring-[#2E3192]/20"
                                    >

                                </div>

                                <x-input-error
                                    :messages="$errors->get('name')"
                                    class="mt-2"
                                />

                            </div>


                            {{-- =================================================
                                 EMAIL
                            ================================================== --}}
                            <div>

                                <label
                                    for="email"
                                    class="mb-2 block text-sm font-semibold text-slate-700"
                                >
                                    Email
                                </label>

                                <div class="relative">

                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i class="bi bi-envelope text-slate-400"></i>
                                    </div>

                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autocomplete="username"
                                        placeholder="Masukkan email aktif"
                                        class="block w-full rounded-xl border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm text-slate-800 shadow-sm outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-2 focus:ring-[#2E3192]/20"
                                    >

                                </div>

                                <x-input-error
                                    :messages="$errors->get('email')"
                                    class="mt-2"
                                />

                            </div>


                            {{-- =================================================
                                 PASSWORD
                            ================================================== --}}
                            <div>

                                <label
                                    for="password"
                                    class="mb-2 block text-sm font-semibold text-slate-700"
                                >
                                    Password
                                </label>

                                <div class="relative">

                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i class="bi bi-lock text-slate-400"></i>
                                    </div>

                                    <input
                                        id="password"
                                        type="password"
                                        name="password"
                                        required
                                        autocomplete="new-password"
                                        placeholder="Buat password"
                                        class="block w-full rounded-xl border-slate-200 bg-slate-50 py-3.5 pl-11 pr-12 text-sm text-slate-800 shadow-sm outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-2 focus:ring-[#2E3192]/20"
                                    >

                                    <button
                                        type="button"
                                        onclick="toggleRegisterPassword('password', 'passwordIcon')"
                                        aria-label="Tampilkan atau sembunyikan password"
                                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400 transition hover:text-[#2E3192]"
                                    >
                                        <i
                                            id="passwordIcon"
                                            class="bi bi-eye"
                                        ></i>
                                    </button>

                                </div>

                                <x-input-error
                                    :messages="$errors->get('password')"
                                    class="mt-2"
                                />

                            </div>


                            {{-- =================================================
                                 CONFIRM PASSWORD
                            ================================================== --}}
                            <div>

                                <label
                                    for="password_confirmation"
                                    class="mb-2 block text-sm font-semibold text-slate-700"
                                >
                                    Konfirmasi Password
                                </label>

                                <div class="relative">

                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i class="bi bi-shield-lock text-slate-400"></i>
                                    </div>

                                    <input
                                        id="password_confirmation"
                                        type="password"
                                        name="password_confirmation"
                                        required
                                        autocomplete="new-password"
                                        placeholder="Ulangi password"
                                        class="block w-full rounded-xl border-slate-200 bg-slate-50 py-3.5 pl-11 pr-12 text-sm text-slate-800 shadow-sm outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-2 focus:ring-[#2E3192]/20"
                                    >

                                    <button
                                        type="button"
                                        onclick="toggleRegisterPassword('password_confirmation', 'confirmationIcon')"
                                        aria-label="Tampilkan atau sembunyikan konfirmasi password"
                                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400 transition hover:text-[#2E3192]"
                                    >
                                        <i
                                            id="confirmationIcon"
                                            class="bi bi-eye"
                                        ></i>
                                    </button>

                                </div>

                                <x-input-error
                                    :messages="$errors->get('password_confirmation')"
                                    class="mt-2"
                                />

                            </div>


                            {{-- =================================================
                                 INFO
                            ================================================== --}}
                            <div class="rounded-xl border border-blue-100 bg-blue-50 p-4">

                                <div class="flex items-start gap-3">

                                    <i class="bi bi-info-circle-fill mt-0.5 text-[#2E3192]"></i>

                                    <p class="text-xs leading-5 text-slate-600">
                                        Akun yang dibuat melalui halaman ini akan
                                        digunakan sebagai akun peserta untuk melakukan
                                        pendaftaran program.
                                    </p>

                                </div>

                            </div>


                            {{-- =================================================
                                 REGISTER BUTTON
                            ================================================== --}}
                            <button
                                type="submit"
                                class="group flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#2E3192] to-[#3f43a8] px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#2E3192]/20 transition duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-[#2E3192]/30 active:translate-y-0"
                            >

                                <span>
                                    Buat Akun
                                </span>

                                <i class="bi bi-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>

                            </button>

                        </form>


                        {{-- =================================================
                             LOGIN LINK
                        ================================================== --}}
                        <div class="mt-7">

                            <div class="flex items-center gap-3">

                                <div class="h-px flex-1 bg-slate-200"></div>

                                <span class="text-xs font-medium text-slate-400">
                                    atau
                                </span>

                                <div class="h-px flex-1 bg-slate-200"></div>

                            </div>

                            <p class="mt-5 text-center text-sm text-slate-500">

                                Sudah punya akun?

                                <a
                                    href="{{ route('login') }}"
                                    class="font-bold text-[#2E3192] transition hover:text-[#ED1C24]"
                                >
                                    Masuk sekarang
                                </a>

                            </p>

                        </div>


                        {{-- =================================================
                             MOBILE HOME
                        ================================================== --}}
                        <div class="mt-6 text-center sm:hidden">

                            <a
                                href="{{ route('home') }}"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-[#2E3192]"
                            >
                                <i class="bi bi-arrow-left"></i>
                                Kembali ke halaman utama
                            </a>

                        </div>


                        {{-- =================================================
                             FOOTER
                        ================================================== --}}
                        <div class="mt-8 text-center">

                            <p class="text-xs text-slate-400">
                                {{ setting('website_name', 'Bina Insani Platform') }}
                            </p>

                            <p class="mt-1 text-[11px] text-slate-300">
                                Sistem Informasi Pendaftaran
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         PASSWORD TOGGLE
    ========================================================== --}}
    <script>
        function toggleRegisterPassword(inputId, iconId) {

            const password = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (!password || !icon) {
                return;
            }

            if (password.type === 'password') {

                password.type = 'text';

                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');

            } else {

                password.type = 'password';

                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');

            }
        }
    </script>

</x-guest-layout>