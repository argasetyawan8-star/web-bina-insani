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
                                Pemulihan Akun
                            </p>

                            <h2 class="text-4xl font-extrabold leading-tight">

                                Lupa Password?

                                <span class="text-yellow-300">
                                    Jangan Khawatir
                                </span>

                            </h2>

                            <p class="mt-5 text-sm leading-7 text-white/80">
                                Masukkan email yang terdaftar di sistem Bina Insani.
                                Kami akan mengirimkan tautan untuk membuat password baru.
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
                                Sistem pemulihan akun tersedia
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
                                        Reset Password 🔐
                                    </h2>

                                    <p class="mt-2 text-sm leading-6 text-slate-500">
                                        Masukkan email akunmu untuk menerima tautan reset password.
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
                             STATUS
                        ================================================== --}}
                        @if (session('status'))

                            <div class="mb-5 rounded-xl border border-green-200 bg-green-50 p-4">

                                <div class="flex items-start gap-3">

                                    <i class="bi bi-check-circle-fill mt-0.5 text-green-600"></i>

                                    <p class="text-sm leading-6 text-green-700">
                                        {{ session('status') }}
                                    </p>

                                </div>

                            </div>

                        @endif


                        {{-- =================================================
                             FORM
                        ================================================== --}}
                        <form
                            method="POST"
                            action="{{ route('password.email') }}"
                            class="space-y-5"
                        >

                            @csrf


                            {{-- EMAIL --}}
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
                                        autofocus
                                        autocomplete="email"
                                        placeholder="Masukkan email yang terdaftar"
                                        class="block w-full rounded-xl border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm text-slate-800 shadow-sm outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-2 focus:ring-[#2E3192]/20"
                                    >

                                </div>

                                <x-input-error
                                    :messages="$errors->get('email')"
                                    class="mt-2"
                                />

                            </div>


                            {{-- INFO --}}
                            <div class="rounded-xl border border-blue-100 bg-blue-50 p-4">

                                <div class="flex items-start gap-3">

                                    <i class="bi bi-info-circle-fill mt-0.5 text-[#2E3192]"></i>

                                    <p class="text-xs leading-5 text-slate-600">
                                        Pastikan email yang dimasukkan sama dengan email
                                        yang digunakan saat membuat akun.
                                    </p>

                                </div>

                            </div>


                            {{-- BUTTON --}}
                            <button
                                type="submit"
                                class="group flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#2E3192] to-[#3f43a8] px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#2E3192]/20 transition duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-[#2E3192]/30 active:translate-y-0"
                            >

                                <span>
                                    Kirim Link Reset
                                </span>

                                <i class="bi bi-send transition-transform duration-300 group-hover:translate-x-1"></i>

                            </button>

                        </form>


                        {{-- =================================================
                             BACK TO LOGIN
                        ================================================== --}}
                        <div class="mt-7 text-center">

                            <a
                                href="{{ route('login') }}"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-[#2E3192]"
                            >
                                <i class="bi bi-arrow-left"></i>
                                Kembali ke Login
                            </a>

                        </div>


                        {{-- =================================================
                             HOME MOBILE
                        ================================================== --}}
                        <div class="mt-4 text-center sm:hidden">

                            <a
                                href="{{ route('home') }}"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-[#2E3192]"
                            >
                                <i class="bi bi-house"></i>
                                Halaman utama
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

</x-guest-layout>