<x-guest-layout>

    <div class="min-h-screen bg-slate-50 flex items-center justify-center p-4">

        <div class="w-full max-w-5xl overflow-hidden rounded-3xl bg-white shadow-2xl">

            <div class="grid md:grid-cols-2">

                {{-- LEFT SIDE --}}
                <div class="relative hidden md:flex flex-col justify-between overflow-hidden bg-gradient-to-br from-[#2E3192] via-[#3b3fa5] to-[#ED1C24] p-10 text-white">

                    {{-- Decorative Circle --}}
                    <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-white/10"></div>
                    <div class="absolute -bottom-32 -left-20 h-80 w-80 rounded-full bg-white/10"></div>

                    <div class="relative z-10">

                        {{-- Logo --}}
                        <div class="mb-10 flex items-center gap-3">

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white shadow-lg">
                                <span class="text-xl font-black text-[#2E3192]">
                                    BI
                                </span>
                            </div>

                            <div>
                                <h1 class="text-lg font-bold">
                                    Bina Insani
                                </h1>

                                <p class="text-xs text-white/70">
                                    Lembaga Pelatihan Kerja
                                </p>
                            </div>

                        </div>


                        {{-- Hero --}}
                        <div class="max-w-md">

                            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-white/70">
                                Selamat Datang
                            </p>

                            <h2 class="text-4xl font-extrabold leading-tight">
                                Bangun Masa Depan
                                <span class="text-yellow-300">
                                    Bersama Bina Insani
                                </span>
                            </h2>

                            <p class="mt-5 text-sm leading-7 text-white/80">
                                Akses sistem Bina Insani untuk mengelola
                                program pelatihan, peserta, pembayaran,
                                dan informasi lainnya dengan mudah.
                            </p>

                        </div>

                    </div>


                    {{-- Bottom --}}
                    <div class="relative z-10">

                        <div class="mb-5 flex items-center gap-3">

                            <div class="h-2 w-2 rounded-full bg-green-300"></div>

                            <span class="text-sm text-white/80">
                                Sistem tersedia
                            </span>

                        </div>

                        <p class="text-xs text-white/60">
                            © {{ date('Y') }} Bina Insani. All rights reserved.
                        </p>

                    </div>

                </div>


                {{-- RIGHT SIDE --}}
                <div class="flex items-center justify-center p-8 sm:p-12">

                    <div class="w-full max-w-md">

                        {{-- Mobile Logo --}}
                        <div class="mb-8 text-center md:hidden">

                            <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#2E3192] text-xl font-black text-white shadow-lg">
                                BI
                            </div>

                            <h1 class="text-xl font-bold text-slate-800">
                                Bina Insani
                            </h1>

                            <p class="text-sm text-slate-500">
                                Lembaga Pelatihan Kerja
                            </p>

                        </div>


                        {{-- Heading --}}
                        <div class="mb-8">

                            <h2 class="text-3xl font-bold tracking-tight text-slate-800">
                                Selamat Datang 👋
                            </h2>

                            <p class="mt-2 text-sm text-slate-500">
                                Silakan masuk untuk melanjutkan ke dashboard.
                            </p>

                        </div>


                        {{-- Session Status --}}
                        <x-auth-session-status
                            class="mb-4"
                            :status="session('status')"
                        />


                        {{-- Login Form --}}
                        <form method="POST" action="{{ route('login') }}" class="space-y-5">

                            @csrf


                            {{-- Email --}}
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
                                        autocomplete="username"
                                        placeholder="Masukkan email Anda"
                                        class="block w-full rounded-xl border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm text-slate-800 shadow-sm outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-2 focus:ring-[#2E3192]/20"
                                    >

                                </div>

                                <x-input-error
                                    :messages="$errors->get('email')"
                                    class="mt-2"
                                />

                            </div>


                            {{-- Password --}}
                            <div>

                                <div class="mb-2 flex items-center justify-between">

                                    <label
                                        for="password"
                                        class="block text-sm font-semibold text-slate-700"
                                    >
                                        Password
                                    </label>

                                    @if (Route::has('password.request'))

                                        <a
                                            href="{{ route('password.request') }}"
                                            class="text-xs font-semibold text-[#2E3192] transition hover:text-[#ED1C24]"
                                        >
                                            Lupa password?
                                        </a>

                                    @endif

                                </div>


                                <div class="relative">

                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i class="bi bi-lock text-slate-400"></i>
                                    </div>

                                    <input
                                        id="password"
                                        type="password"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                        placeholder="Masukkan password"
                                        class="block w-full rounded-xl border-slate-200 bg-slate-50 py-3.5 pl-11 pr-12 text-sm text-slate-800 shadow-sm outline-none transition focus:border-[#2E3192] focus:bg-white focus:ring-2 focus:ring-[#2E3192]/20"
                                    >

                                    <button
                                        type="button"
                                        onclick="togglePassword()"
                                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400 transition hover:text-[#2E3192]"
                                    >
                                        <i id="passwordIcon" class="bi bi-eye"></i>
                                    </button>

                                </div>

                                <x-input-error
                                    :messages="$errors->get('password')"
                                    class="mt-2"
                                />

                            </div>


                            {{-- Remember --}}
                            <div class="flex items-center">

                                <label class="inline-flex cursor-pointer items-center">

                                    <input
                                        id="remember_me"
                                        type="checkbox"
                                        name="remember"
                                        class="h-4 w-4 rounded border-slate-300 text-[#2E3192] focus:ring-[#2E3192]"
                                    >

                                    <span class="ml-2 text-sm text-slate-500">
                                        Ingat saya
                                    </span>

                                </label>

                            </div>


                            {{-- Button --}}
                            <button
                                type="submit"
                                class="group flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#2E3192] to-[#3f43a8] px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#2E3192]/20 transition duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-[#2E3192]/30 active:translate-y-0"
                            >

                                <span>
                                    Masuk ke Dashboard
                                </span>

                                <i class="bi bi-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>

                            </button>

                        </form>


                        {{-- Footer --}}
                        <div class="mt-8 text-center">

                            <p class="text-xs text-slate-400">
                                Sistem Informasi Bina Insani
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Password Toggle --}}
    <script>

        function togglePassword() {

            const password = document.getElementById('password');
            const icon = document.getElementById('passwordIcon');

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