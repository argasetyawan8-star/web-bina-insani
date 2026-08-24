{{-- STEP 4 : REVIEW PENDAFTARAN --}}
<div
    x-show="step == 4"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-8"
    x-transition:enter-end="opacity-100 translate-y-0"
>

    {{-- HEADER --}}
    <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

        <div>
            <span
                class="inline-flex items-center gap-2 rounded-full bg-[#2E3192]/10 px-4 py-2 text-sm font-semibold text-[#2E3192]"
            >
                <i class="bi bi-clipboard-check-fill"></i>
                Review Pendaftaran
            </span>

            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-[#1E293B] sm:text-4xl">
                Periksa Kembali Data Anda
            </h2>

            <p class="mt-3 max-w-2xl leading-7 text-slate-500">
                Pastikan seluruh data yang telah diisi sudah benar sebelum
                melanjutkan ke proses pembayaran.
            </p>
        </div>

        <div
            class="w-fit rounded-2xl border border-[#F6D21A]/40 bg-[#F6D21A]/10 px-6 py-4"
        >
            <p class="text-sm font-medium text-yellow-700">
                Langkah
            </p>

            <h3 class="mt-1 text-3xl font-bold text-[#2E3192]">
                4 / 4
            </h3>
        </div>

    </div>


    {{-- ============================= --}}
    {{-- RINGKASAN PROGRAM --}}
    {{-- ============================= --}}

    <div
        class="mt-10 overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm"
    >

        {{-- Program Header --}}
        <div
            class="bg-gradient-to-r from-[#2E3192] to-blue-800 p-7 text-white"
        >

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div class="flex items-center gap-4">

                    <div
                        class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/15 backdrop-blur"
                    >
                        <i class="bi bi-mortarboard-fill text-2xl"></i>
                    </div>

                    <div>
                        <p class="text-sm text-blue-100">
                            Program Pelatihan
                        </p>

                        <h3 class="mt-1 text-2xl font-extrabold">
                            {{ $program->name }}
                        </h3>
                    </div>

                </div>

                <span
                    class="inline-flex w-fit items-center gap-2 rounded-full bg-green-500/20 px-4 py-2 text-sm font-semibold text-green-100"
                >
                    <i class="bi bi-check-circle-fill"></i>
                    Program Dipilih
                </span>

            </div>

        </div>


        {{-- Program Information --}}
        <div class="grid gap-4 p-7 sm:grid-cols-2 lg:grid-cols-4">

            {{-- Registration Fee --}}
            <div class="rounded-2xl bg-[#F8FAFC] p-5">

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#F6D21A]/20 text-yellow-700"
                    >
                        <i class="bi bi-wallet2 text-lg"></i>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-slate-500">
                            Biaya Pendaftaran
                        </p>

                        <p class="mt-1 font-bold text-[#1E293B]">
                            Rp {{ number_format($program->registration_fee, 0, ',', '.') }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- Training Fee --}}
            <div class="rounded-2xl bg-[#F8FAFC] p-5">

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192]"
                    >
                        <i class="bi bi-cash-stack text-lg"></i>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-slate-500">
                            Biaya Pelatihan
                        </p>

                        <p class="mt-1 font-bold text-[#1E293B]">
                            Rp {{ number_format($program->training_fee, 0, ',', '.') }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- Duration --}}
            <div class="rounded-2xl bg-[#F8FAFC] p-5">

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-600"
                    >
                        <i class="bi bi-clock-fill text-lg"></i>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-slate-500">
                            Durasi
                        </p>

                        <p class="mt-1 font-bold text-[#1E293B]">
                            {{ $program->duration ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- Schedule --}}
            <div class="rounded-2xl bg-[#F8FAFC] p-5">

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-yellow-100 text-yellow-700"
                    >
                        <i class="bi bi-calendar-event-fill text-lg"></i>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-slate-500">
                            Jadwal
                        </p>

                        <p class="mt-1 font-bold text-[#1E293B]">
                            {{ $program->schedule ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ============================= --}}
    {{-- REVIEW DATA --}}
    {{-- ============================= --}}

    <div class="mt-8 grid gap-8 lg:grid-cols-2">


        {{-- BIODATA --}}
        <div
            class="rounded-[28px] border border-slate-200 bg-white p-7 shadow-sm"
        >

            {{-- Header --}}
            <div class="flex items-center justify-between">

                <div class="flex items-center gap-4">

                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192]"
                    >
                        <i class="bi bi-person-vcard-fill text-xl"></i>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold text-[#1E293B]">
                            Biodata Peserta
                        </h3>

                        <p class="text-sm text-slate-500">
                            Data pribadi peserta
                        </p>
                    </div>

                </div>

                <span
                    class="hidden rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700 sm:inline-flex"
                >
                    Lengkap
                </span>

            </div>


            {{-- Data --}}
            <div class="mt-7 divide-y divide-slate-100">

                {{-- Nama --}}
                <div class="grid grid-cols-2 gap-4 py-4">

                    <span class="text-sm text-slate-500">
                        Nama Lengkap
                    </span>

                    <span
                        class="break-words text-right font-semibold text-[#1E293B]"
                        x-text="form.full_name || '-'"
                    ></span>

                </div>


                {{-- NIK --}}
                <div class="grid grid-cols-2 gap-4 py-4">

                    <span class="text-sm text-slate-500">
                        NIK
                    </span>

                    <span
                        class="break-all text-right font-semibold text-[#1E293B]"
                        x-text="form.nik || '-'"
                    ></span>

                </div>


                {{-- Tempat Lahir --}}
                <div class="grid grid-cols-2 gap-4 py-4">

                    <span class="text-sm text-slate-500">
                        Tempat Lahir
                    </span>

                    <span
                        class="break-words text-right font-semibold text-[#1E293B]"
                        x-text="form.birth_place || '-'"
                    ></span>

                </div>


                {{-- Tanggal Lahir --}}
                <div class="grid grid-cols-2 gap-4 py-4">

                    <span class="text-sm text-slate-500">
                        Tanggal Lahir
                    </span>

                    <span
                        class="text-right font-semibold text-[#1E293B]"
                        x-text="form.birth_date || '-'"
                    ></span>

                </div>


                {{-- Gender --}}
                <div class="grid grid-cols-2 gap-4 py-4">

                    <span class="text-sm text-slate-500">
                        Jenis Kelamin
                    </span>

                    <span
                        class="text-right font-semibold text-[#1E293B]"
                        x-text="form.gender || '-'"
                    ></span>

                </div>


                {{-- WhatsApp --}}
                <div class="grid grid-cols-2 gap-4 py-4">

                    <span class="text-sm text-slate-500">
                        WhatsApp
                    </span>

                    <span
                        class="break-all text-right font-semibold text-[#1E293B]"
                        x-text="form.phone || '-'"
                    ></span>

                </div>


                {{-- Email --}}
                <div class="grid grid-cols-2 gap-4 py-4">

                    <span class="text-sm text-slate-500">
                        Email
                    </span>

                    <span
                        class="break-all text-right font-semibold text-[#1E293B]"
                        x-text="form.email || '-'"
                    ></span>

                </div>


                {{-- Pendidikan --}}
                <div class="grid grid-cols-2 gap-4 py-4">

                    <span class="text-sm text-slate-500">
                        Pendidikan
                    </span>

                    <span
                        class="text-right font-semibold text-[#1E293B]"
                        x-text="form.education || '-'"
                    ></span>

                </div>


                {{-- Pekerjaan --}}
                <div class="grid grid-cols-2 gap-4 py-4">

                    <span class="text-sm text-slate-500">
                        Pekerjaan
                    </span>

                    <span
                        class="break-words text-right font-semibold text-[#1E293B]"
                        x-text="form.job || '-'"
                    ></span>

                </div>


                {{-- Alamat --}}
                <div class="py-4">

                    <span class="text-sm text-slate-500">
                        Alamat
                    </span>

                    <p
                        class="mt-2 rounded-xl bg-[#F8FAFC] p-4 text-sm leading-6 text-slate-700"
                        x-text="form.address || '-'"
                    ></p>

                </div>

            </div>

        </div>


        {{-- DOKUMEN --}}
        <div
            class="rounded-[28px] border border-slate-200 bg-white p-7 shadow-sm"
        >

            {{-- Header --}}
            <div class="flex items-center gap-4">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#F6D21A]/20 text-yellow-700"
                >
                    <i class="bi bi-folder-check text-xl"></i>
                </div>

                <div>
                    <h3 class="text-xl font-bold text-[#1E293B]">
                        Dokumen Persyaratan
                    </h3>

                    <p class="text-sm text-slate-500">
                        Dokumen yang telah dipilih
                    </p>
                </div>

            </div>


            {{-- Document List --}}
            <div class="mt-7 space-y-4">


                {{-- FOTO --}}
                <div
                    class="flex items-center justify-between rounded-2xl border border-slate-100 bg-[#F8FAFC] p-4"
                >

                    <div class="flex min-w-0 items-center gap-4">

                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600"
                        >
                            <i class="bi bi-camera-fill"></i>
                        </div>

                        <div class="min-w-0">

                            <h4 class="font-semibold text-[#1E293B]">
                                Pas Foto
                            </h4>

                            <p
                                class="truncate text-sm text-slate-500"
                                x-text="form.photo_name || 'Belum dipilih'"
                            ></p>

                        </div>

                    </div>

                    <i
                        class="bi bi-check-circle-fill ml-3 shrink-0 text-xl text-green-500"
                    ></i>

                </div>


                {{-- KTP --}}
                <div
                    class="flex items-center justify-between rounded-2xl border border-slate-100 bg-[#F8FAFC] p-4"
                >

                    <div class="flex min-w-0 items-center gap-4">

                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-orange-100 text-orange-600"
                        >
                            <i class="bi bi-person-vcard-fill"></i>
                        </div>

                        <div class="min-w-0">

                            <h4 class="font-semibold text-[#1E293B]">
                                KTP
                            </h4>

                            <p
                                class="truncate text-sm text-slate-500"
                                x-text="form.ktp_name || 'Belum dipilih'"
                            ></p>

                        </div>

                    </div>

                    <i
                        class="bi bi-check-circle-fill ml-3 shrink-0 text-xl text-green-500"
                    ></i>

                </div>


                {{-- IJAZAH --}}
                <div
                    class="flex items-center justify-between rounded-2xl border border-slate-100 bg-[#F8FAFC] p-4"
                >

                    <div class="flex min-w-0 items-center gap-4">

                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-green-100 text-green-600"
                        >
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                        <div class="min-w-0">

                            <h4 class="font-semibold text-[#1E293B]">
                                Ijazah
                            </h4>

                            <p
                                class="truncate text-sm text-slate-500"
                                x-text="form.ijazah_name || 'Belum dipilih'"
                            ></p>

                        </div>

                    </div>

                    <i
                        class="bi bi-check-circle-fill ml-3 shrink-0 text-xl text-green-500"
                    ></i>

                </div>

            </div>


            {{-- Document Info --}}
            <div
                class="mt-6 rounded-2xl border border-blue-100 bg-blue-50 p-5"
            >

                <div class="flex gap-3">

                    <i class="bi bi-info-circle-fill mt-0.5 text-blue-600"></i>

                    <p class="text-sm leading-6 text-blue-700">
                        Pastikan seluruh dokumen yang dipilih memiliki kualitas
                        yang jelas dan dapat dibaca untuk proses verifikasi.
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- ============================= --}}
    {{-- AGREEMENT --}}
    {{-- ============================= --}}

    <div
        class="mt-8 rounded-[28px] border border-[#F6D21A]/50 bg-gradient-to-r from-yellow-50 via-white to-orange-50 p-6 sm:p-7"
    >

        <label class="flex cursor-pointer items-start gap-4">

            <input
                id="agreement"
                type="checkbox"
                x-model="agreement"
                class="mt-1 h-5 w-5 shrink-0 rounded border-slate-300 text-[#2E3192] focus:ring-[#2E3192]"
            >

            <span class="text-sm leading-7 text-slate-600 sm:text-base">

                Saya menyatakan bahwa seluruh data yang saya isi adalah
                <strong class="text-[#1E293B]">
                    benar
                </strong>
                dan dapat dipertanggungjawabkan.

                Saya bersedia mengikuti seluruh proses pendaftaran sesuai
                ketentuan
                <strong class="text-[#2E3192]">
                    Bina Insani.
                </strong>

            </span>

        </label>

        <p
            x-show="!agreement"
            class="mt-3 ml-9 text-xs text-slate-500"
        >
            Centang persetujuan untuk melanjutkan ke pembayaran.
        </p>

    </div>


    {{-- ============================= --}}
    {{-- NAVIGATION --}}
    {{-- ============================= --}}

    <div
        class="mt-10 flex flex-col-reverse gap-4 border-t border-slate-200 pt-8 sm:flex-row sm:items-center sm:justify-between"
    >

        {{-- BACK --}}
        <button
            type="button"
            @click="step = 3"
            class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-300 bg-white px-7 py-3.5 font-semibold text-slate-700 transition duration-300 hover:-translate-y-0.5 hover:border-[#2E3192] hover:text-[#2E3192] hover:shadow-md"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali
        </button>


        {{-- PAYMENT --}}
        <button
            type="submit"
            :disabled="!agreement"
            :class="agreement
                ? 'bg-[#2E3192] hover:-translate-y-1 hover:bg-blue-900 shadow-lg cursor-pointer'
                : 'bg-slate-300 cursor-not-allowed opacity-70'"
            class="group inline-flex items-center justify-center gap-3 rounded-2xl px-8 py-4 font-bold text-white transition duration-300"
        >

            <i class="bi bi-credit-card-fill"></i>

            <span>
                Lanjut ke Pembayaran
            </span>

            <i
                class="bi bi-arrow-right transition group-hover:translate-x-1"
            ></i>

        </button>

    </div>

</div>