{{-- STEP 1 : PROGRAM DIPILIH --}}
<div
    x-show="step == 1"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-8"
    x-transition:enter-end="opacity-100 translate-y-0"
>

    {{-- PROGRAM ID --}}
    <input
        type="hidden"
        name="program_id"
        value="{{ $program->id }}"
    >

    {{-- HEADER STEP --}}
    <div
        class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between"
    >

        <div>
            <h2
                class="text-2xl font-extrabold leading-tight text-[#1E293B] sm:text-3xl"
            >
                Program Dipilih
            </h2>

            <p
                class="mt-2 text-sm leading-6 text-slate-500 sm:text-base"
            >
                Pastikan program pelatihan yang Anda pilih sudah sesuai.
            </p>
        </div>

        <span
            class="inline-flex w-fit items-center rounded-full bg-indigo-100 px-4 py-2 text-xs font-bold text-[#2E3192] sm:px-5 sm:text-sm"
        >
            STEP 01
        </span>

    </div>


    {{-- PROGRAM --}}
    <div class="mt-8 sm:mt-10">

        {{-- PROGRAM HEADER --}}
        <div
            class="flex items-center justify-between gap-5 border-b border-slate-200 pb-6"
        >

            <div class="min-w-0">

                <p
                    class="text-xs font-semibold uppercase tracking-wide text-[#2E3192] sm:text-sm"
                >
                    Program Pelatihan Korea
                </p>

                <h3
                    class="mt-2 break-words text-2xl font-extrabold leading-tight text-[#1E293B] sm:text-3xl"
                >
                    {{ $program->name }}
                </h3>

            </div>

            <div
                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-indigo-100 text-[#2E3192] sm:h-16 sm:w-16"
            >
                <i
                    class="bi bi-mortarboard-fill text-2xl sm:text-3xl"
                ></i>
            </div>

        </div>


        {{-- STATUS --}}
        <div
            class="flex items-center justify-between gap-4 border-b border-slate-200 py-6"
        >

            <div class="flex items-center gap-3">

                <i
                    class="bi bi-info-circle-fill text-lg text-[#2E3192]"
                ></i>

                <span
                    class="text-sm font-semibold text-slate-600 sm:text-base"
                >
                    Status Program
                </span>

            </div>

            <span
                class="inline-flex shrink-0 items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-xs font-bold text-green-700 sm:text-sm"
            >
                <i class="bi bi-check-circle-fill"></i>
                Tersedia
            </span>

        </div>


        {{-- INFORMASI PROGRAM --}}
        <div class="divide-y divide-slate-200">

            {{-- BIAYA PENDAFTARAN --}}
            <div
                class="flex items-center gap-4 py-6 sm:py-7"
            >

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-yellow-100 text-yellow-600"
                >
                    <i class="bi bi-wallet2 text-xl"></i>
                </div>

                <div class="min-w-0">

                    <p class="text-sm text-slate-500">
                        Biaya Pendaftaran
                    </p>

                    <p
                        class="mt-1 break-words text-lg font-extrabold text-[#1E293B] sm:text-xl"
                    >
                        Rp {{ number_format($program->registration_fee, 0, ',', '.') }}
                    </p>

                </div>

            </div>


            {{-- BIAYA PELATIHAN --}}
            <div
                class="flex items-center gap-4 py-6 sm:py-7"
            >

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-indigo-100 text-[#2E3192]"
                >
                    <i class="bi bi-cash-stack text-xl"></i>
                </div>

                <div class="min-w-0">

                    <p class="text-sm text-slate-500">
                        Biaya Pelatihan
                    </p>

                    <p
                        class="mt-1 break-words text-lg font-extrabold text-[#1E293B] sm:text-xl"
                    >
                        Rp {{ number_format($program->training_fee, 0, ',', '.') }}
                    </p>

                </div>

            </div>


            {{-- DURASI --}}
            <div
                class="flex items-center gap-4 py-6 sm:py-7"
            >

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-[#2E3192]"
                >
                    <i class="bi bi-clock-fill text-xl"></i>
                </div>

                <div class="min-w-0">

                    <p class="text-sm text-slate-500">
                        Durasi
                    </p>

                    <p
                        class="mt-1 break-words text-base font-extrabold text-[#1E293B] sm:text-lg"
                    >
                        {{ $program->duration }}
                    </p>

                </div>

            </div>


            {{-- JADWAL --}}
            <div
                class="flex items-center gap-4 py-6 sm:py-7"
            >

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-yellow-100 text-yellow-600"
                >
                    <i class="bi bi-calendar-event-fill text-xl"></i>
                </div>

                <div class="min-w-0">

                    <p class="text-sm text-slate-500">
                        Jadwal
                    </p>

                    <p
                        class="mt-1 break-words text-base font-extrabold text-[#1E293B] sm:text-lg"
                    >
                        {{ $program->schedule ?? '-' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- BUTTON --}}
        <div
            class="flex justify-stretch border-t border-slate-200 pt-6 sm:mt-4 sm:justify-end sm:pt-8"
        >

            <button
                type="button"
                @click="step = 2"
                class="group inline-flex w-full items-center justify-center gap-3 rounded-2xl bg-[#2E3192] px-6 py-4 text-sm font-bold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-blue-900 sm:w-auto sm:px-8 sm:text-base"
            >

                Lanjut Isi Biodata

                <i
                    class="bi bi-arrow-right text-lg transition duration-300 group-hover:translate-x-1"
                ></i>

            </button>

        </div>

    </div>

</div>