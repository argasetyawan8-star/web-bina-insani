{{-- STEP 4 : REVIEW PENDAFTARAN --}}
<div
    x-show="step == 4"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-8"
    x-transition:enter-end="opacity-100 translate-y-0"
    class="w-full"
>

    {{-- ============================= --}}
    {{-- HEADER --}}
    {{-- ============================= --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div class="min-w-0">
            <span
                class="inline-flex items-center gap-2 rounded-full bg-[#2E3192]/10 px-3.5 py-2 text-xs font-semibold text-[#2E3192] sm:px-4 sm:text-sm"
            >
                <i class="bi bi-clipboard-check-fill"></i>
                Review Pendaftaran
            </span>

            <h2
                class="mt-4 text-2xl font-extrabold leading-tight tracking-tight text-[#1E293B] sm:text-4xl"
            >
                Periksa Kembali Data Anda
            </h2>

            <p
                class="mt-3 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base sm:leading-7"
            >
                Pastikan seluruh data yang telah diisi sudah benar sebelum
                melanjutkan ke proses pembayaran.
            </p>
        </div>

        <div
            class="w-fit rounded-2xl border border-[#F6D21A]/40 bg-[#F6D21A]/10 px-5 py-3 sm:px-6 sm:py-4"
        >
            <p class="text-xs font-medium text-yellow-700 sm:text-sm">
                Langkah
            </p>

            <h3
                class="mt-1 text-2xl font-bold text-[#2E3192] sm:text-3xl"
            >
                4 / 4
            </h3>
        </div>

    </div>


    {{-- ============================= --}}
    {{-- RINGKASAN PROGRAM --}}
    {{-- ============================= --}}
    <div
        class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm sm:mt-10 sm:rounded-[28px]"
    >

        {{-- PROGRAM HEADER --}}
        <div
            class="bg-gradient-to-r from-[#2E3192] to-blue-800 px-5 py-6 text-white sm:p-7"
        >

            <div
                class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between"
            >

                <div class="flex min-w-0 items-center gap-3 sm:gap-4">

                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/15 backdrop-blur sm:h-14 sm:w-14 sm:rounded-2xl"
                    >
                        <i class="bi bi-mortarboard-fill text-xl sm:text-2xl"></i>
                    </div>

                    <div class="min-w-0">
                        <p class="text-xs text-blue-100 sm:text-sm">
                            Program Pelatihan
                        </p>

                        <h3
                            class="mt-1 break-words text-xl font-extrabold leading-tight sm:text-2xl"
                        >
                            {{ $program->name }}
                        </h3>
                    </div>

                </div>

                <span
                    class="inline-flex w-fit items-center gap-2 rounded-full bg-green-500/20 px-3.5 py-2 text-xs font-semibold text-green-100 sm:px-4 sm:text-sm"
                >
                    <i class="bi bi-check-circle-fill"></i>
                    Program Dipilih
                </span>

            </div>

        </div>


        {{-- PROGRAM INFORMATION --}}
        <div
            class="grid grid-cols-1 gap-3 p-5 sm:grid-cols-2 sm:gap-4 sm:p-7 lg:grid-cols-4"
        >

            {{-- REGISTRATION FEE --}}
            <div
                class="rounded-2xl bg-[#F8FAFC] p-4 sm:p-5"
            >
                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#F6D21A]/20 text-yellow-700 sm:h-11 sm:w-11"
                    >
                        <i class="bi bi-wallet2 text-lg"></i>
                    </div>

                    <div class="min-w-0">
                        <p class="text-xs font-medium text-slate-500">
                            Biaya Pendaftaran
                        </p>

                        <p
                            class="mt-1 break-words text-sm font-bold text-[#1E293B] sm:text-base"
                        >
                            Rp {{ number_format($program->registration_fee, 0, ',', '.') }}
                        </p>
                    </div>

                </div>
            </div>


            {{-- TRAINING FEE --}}
            <div
                class="rounded-2xl bg-[#F8FAFC] p-4 sm:p-5"
            >
                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192] sm:h-11 sm:w-11"
                    >
                        <i class="bi bi-cash-stack text-lg"></i>
                    </div>

                    <div class="min-w-0">
                        <p class="text-xs font-medium text-slate-500">
                            Biaya Pelatihan
                        </p>

                        <p
                            class="mt-1 break-words text-sm font-bold text-[#1E293B] sm:text-base"
                        >
                            Rp {{ number_format($program->training_fee, 0, ',', '.') }}
                        </p>
                    </div>

                </div>
            </div>


            {{-- DURATION --}}
            <div
                class="rounded-2xl bg-[#F8FAFC] p-4 sm:p-5"
            >
                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600 sm:h-11 sm:w-11"
                    >
                        <i class="bi bi-clock-fill text-lg"></i>
                    </div>

                    <div class="min-w-0">
                        <p class="text-xs font-medium text-slate-500">
                            Durasi
                        </p>

                        <p
                            class="mt-1 break-words text-sm font-bold leading-5 text-[#1E293B] sm:text-base"
                        >
                            {{ $program->duration ?? '-' }}
                        </p>
                    </div>

                </div>
            </div>


            {{-- SCHEDULE --}}
            <div
                class="rounded-2xl bg-[#F8FAFC] p-4 sm:p-5"
            >
                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-yellow-100 text-yellow-700 sm:h-11 sm:w-11"
                    >
                        <i class="bi bi-calendar-event-fill text-lg"></i>
                    </div>

                    <div class="min-w-0">
                        <p class="text-xs font-medium text-slate-500">
                            Jadwal
                        </p>

                        <p
                            class="mt-1 break-words text-sm font-bold leading-5 text-[#1E293B] sm:text-base"
                        >
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
    <div
        class="mt-6 grid grid-cols-1 gap-6 sm:mt-8 sm:gap-8 lg:grid-cols-2"
    >

        {{-- ============================= --}}
        {{-- BIODATA --}}
        {{-- ============================= --}}
        <div
            class="min-w-0 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:rounded-[28px] sm:p-7"
        >

            {{-- HEADER --}}
            <div class="flex items-center gap-3 sm:gap-4">

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192] sm:h-12 sm:w-12 sm:rounded-2xl"
                >
                    <i class="bi bi-person-vcard-fill text-lg sm:text-xl"></i>
                </div>

                <div class="min-w-0">
                    <h3
                        class="text-lg font-bold text-[#1E293B] sm:text-xl"
                    >
                        Biodata Peserta
                    </h3>

                    <p class="text-xs text-slate-500 sm:text-sm">
                        Data pribadi peserta
                    </p>
                </div>

            </div>


            {{-- DATA --}}
            <div class="mt-5 divide-y divide-slate-100 sm:mt-7">

                {{-- NAMA --}}
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-2 sm:gap-4 sm:py-4">
                    <span class="text-xs text-slate-500 sm:text-sm">
                        Nama Lengkap
                    </span>

                    <span
                        class="break-words font-semibold text-[#1E293B] sm:text-right"
                        x-text="form.full_name || '-'"
                    ></span>
                </div>


                {{-- NIK --}}
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-2 sm:gap-4 sm:py-4">
                    <span class="text-xs text-slate-500 sm:text-sm">
                        NIK
                    </span>

                    <span
                        class="break-all font-semibold text-[#1E293B] sm:text-right"
                        x-text="form.nik || '-'"
                    ></span>
                </div>


                {{-- TEMPAT LAHIR --}}
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-2 sm:gap-4 sm:py-4">
                    <span class="text-xs text-slate-500 sm:text-sm">
                        Tempat Lahir
                    </span>

                    <span
                        class="break-words font-semibold text-[#1E293B] sm:text-right"
                        x-text="form.birth_place || '-'"
                    ></span>
                </div>


                {{-- TANGGAL LAHIR --}}
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-2 sm:gap-4 sm:py-4">
                    <span class="text-xs text-slate-500 sm:text-sm">
                        Tanggal Lahir
                    </span>

                    <span
                        class="break-words font-semibold text-[#1E293B] sm:text-right"
                        x-text="form.birth_date || '-'"
                    ></span>
                </div>


                {{-- GENDER --}}
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-2 sm:gap-4 sm:py-4">
                    <span class="text-xs text-slate-500 sm:text-sm">
                        Jenis Kelamin
                    </span>

                    <span
                        class="break-words font-semibold text-[#1E293B] sm:text-right"
                        x-text="form.gender || '-'"
                    ></span>
                </div>


                {{-- WHATSAPP --}}
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-2 sm:gap-4 sm:py-4">
                    <span class="text-xs text-slate-500 sm:text-sm">
                        WhatsApp
                    </span>

                    <span
                        class="break-all font-semibold text-[#1E293B] sm:text-right"
                        x-text="form.phone || '-'"
                    ></span>
                </div>


                {{-- EMAIL --}}
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-2 sm:gap-4 sm:py-4">
                    <span class="text-xs text-slate-500 sm:text-sm">
                        Email
                    </span>

                    <span
                        class="break-all font-semibold text-[#1E293B] sm:text-right"
                        x-text="form.email || '-'"
                    ></span>
                </div>


                {{-- PENDIDIKAN --}}
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-2 sm:gap-4 sm:py-4">
                    <span class="text-xs text-slate-500 sm:text-sm">
                        Pendidikan
                    </span>

                    <span
                        class="break-words font-semibold text-[#1E293B] sm:text-right"
                        x-text="form.education || '-'"
                    ></span>
                </div>


                {{-- PEKERJAAN --}}
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-2 sm:gap-4 sm:py-4">
                    <span class="text-xs text-slate-500 sm:text-sm">
                        Pekerjaan
                    </span>

                    <span
                        class="break-words font-semibold text-[#1E293B] sm:text-right"
                        x-text="form.job || '-'"
                    ></span>
                </div>


                {{-- ALAMAT --}}
                <div class="py-3 sm:py-4">

                    <span class="text-xs text-slate-500 sm:text-sm">
                        Alamat
                    </span>

                    <p
                        class="mt-2 break-words rounded-xl bg-[#F8FAFC] p-3 text-sm leading-6 text-slate-700 sm:p-4"
                        x-text="form.address || '-'"
                    ></p>

                </div>

            </div>

        </div>


        {{-- ============================= --}}
        {{-- DOKUMEN --}}
        {{-- ============================= --}}
        <div
            class="min-w-0 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:rounded-[28px] sm:p-7"
        >

            {{-- HEADER --}}
            <div class="flex items-center gap-3 sm:gap-4">

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#F6D21A]/20 text-yellow-700 sm:h-12 sm:w-12 sm:rounded-2xl"
                >
                    <i class="bi bi-folder-check text-lg sm:text-xl"></i>
                </div>

                <div class="min-w-0">
                    <h3
                        class="text-lg font-bold text-[#1E293B] sm:text-xl"
                    >
                        Dokumen Persyaratan
                    </h3>

                    <p class="text-xs text-slate-500 sm:text-sm">
                        Dokumen yang telah dipilih
                    </p>
                </div>

            </div>


            {{-- DOCUMENT LIST --}}
            <div class="mt-5 space-y-3 sm:mt-7 sm:space-y-4">

                {{-- FOTO --}}
                <div
                    class="flex min-w-0 items-center justify-between gap-3 rounded-2xl border border-slate-100 bg-[#F8FAFC] p-3 sm:p-4"
                >

                    <div class="flex min-w-0 items-center gap-3 sm:gap-4">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600 sm:h-11 sm:w-11"
                        >
                            <i class="bi bi-camera-fill"></i>
                        </div>

                        <div class="min-w-0">
                            <h4
                                class="text-sm font-semibold text-[#1E293B] sm:text-base"
                            >
                                Pas Foto
                            </h4>

                            <p
                                class="max-w-[180px] truncate text-xs text-slate-500 sm:max-w-xs sm:text-sm"
                                x-text="form.photo_name || 'Sudah dipilih'"
                            ></p>
                        </div>

                    </div>

                    <i
                        class="bi bi-check-circle-fill shrink-0 text-lg text-green-500 sm:text-xl"
                    ></i>

                </div>


                {{-- KTP --}}
                <div
                    class="flex min-w-0 items-center justify-between gap-3 rounded-2xl border border-slate-100 bg-[#F8FAFC] p-3 sm:p-4"
                >

                    <div class="flex min-w-0 items-center gap-3 sm:gap-4">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-orange-100 text-orange-600 sm:h-11 sm:w-11"
                        >
                            <i class="bi bi-person-vcard-fill"></i>
                        </div>

                        <div class="min-w-0">
                            <h4
                                class="text-sm font-semibold text-[#1E293B] sm:text-base"
                            >
                                KTP
                            </h4>

                            <p
                                class="max-w-[180px] truncate text-xs text-slate-500 sm:max-w-xs sm:text-sm"
                                x-text="form.ktp_name || 'Sudah dipilih'"
                            ></p>
                        </div>

                    </div>

                    <i
                        class="bi bi-check-circle-fill shrink-0 text-lg text-green-500 sm:text-xl"
                    ></i>

                </div>


                {{-- IJAZAH --}}
                <div
                    class="flex min-w-0 items-center justify-between gap-3 rounded-2xl border border-slate-100 bg-[#F8FAFC] p-3 sm:p-4"
                >

                    <div class="flex min-w-0 items-center gap-3 sm:gap-4">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-green-100 text-green-600 sm:h-11 sm:w-11"
                        >
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                        <div class="min-w-0">
                            <h4
                                class="text-sm font-semibold text-[#1E293B] sm:text-base"
                            >
                                Ijazah
                            </h4>

                            <p
                                class="max-w-[180px] truncate text-xs text-slate-500 sm:max-w-xs sm:text-sm"
                                x-text="form.ijazah_name || 'Sudah dipilih'"
                            ></p>
                        </div>

                    </div>

                    <i
                        class="bi bi-check-circle-fill shrink-0 text-lg text-green-500 sm:text-xl"
                    ></i>

                </div>

            </div>


            {{-- DOCUMENT INFO --}}
            <div
                class="mt-5 rounded-2xl border border-blue-100 bg-blue-50 p-4 sm:mt-6 sm:p-5"
            >

                <div class="flex gap-3">

                    <i
                        class="bi bi-info-circle-fill mt-0.5 shrink-0 text-blue-600"
                    ></i>

                    <p
                        class="text-xs leading-6 text-blue-700 sm:text-sm"
                    >
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
        class="mt-6 rounded-2xl border border-[#F6D21A]/50 bg-gradient-to-r from-yellow-50 via-white to-orange-50 p-5 sm:mt-8 sm:rounded-[28px] sm:p-7"
    >

        <label
            class="flex cursor-pointer items-start gap-3 sm:gap-4"
        >

            <input
                id="agreement"
                type="checkbox"
                x-model="agreement"
                class="mt-1 h-5 w-5 shrink-0 rounded border-slate-300 text-[#2E3192] focus:ring-[#2E3192]"
            >

            <span
                class="text-xs leading-6 text-slate-600 sm:text-base sm:leading-7"
            >
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
            class="ml-8 mt-3 text-xs text-slate-500 sm:ml-9"
        >
            Centang persetujuan untuk melanjutkan ke pembayaran.
        </p>

    </div>


    {{-- ============================= --}}
    {{-- NAVIGATION --}}
    {{-- ============================= --}}
    <div
        class="mt-7 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:mt-10 sm:flex-row sm:items-center sm:justify-between sm:gap-4 sm:pt-8"
    >

        {{-- BACK --}}
        <button
            type="button"
            @click="step = 3"
            class="inline-flex w-full items-center justify-center gap-2 rounded-2xl border border-slate-300 bg-white px-6 py-3.5 text-sm font-semibold text-slate-700 transition duration-300 hover:-translate-y-0.5 hover:border-[#2E3192] hover:text-[#2E3192] hover:shadow-md sm:w-auto sm:px-7"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali
        </button>


        {{-- PAYMENT --}}
        <button
            type="submit"
            :disabled="!agreement"
            :class="
                agreement
                    ? 'bg-[#2E3192] hover:-translate-y-1 hover:bg-blue-900 shadow-lg cursor-pointer'
                    : 'bg-slate-300 cursor-not-allowed opacity-70'
            "
            class="group inline-flex w-full items-center justify-center gap-3 rounded-2xl px-6 py-3.5 text-sm font-bold text-white transition duration-300 sm:w-auto sm:px-8 sm:py-4 sm:text-base"
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