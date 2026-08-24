{{-- STEP 1 : PROGRAM DIPILIH --}}
<div
    x-show="step == 1"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-8"
    x-transition:enter-end="opacity-100 translate-y-0">

    <input
        type="hidden"
        name="program_id"
        value="{{ $program->id }}"
    >

    {{-- HEADER --}}
    <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

        <div class="min-w-0">
            <h2 class="text-2xl font-extrabold leading-tight text-[#1E293B] sm:text-3xl">
                Program Dipilih
            </h2>

            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base">
                Pastikan program pelatihan yang Anda pilih sudah sesuai.
            </p>
        </div>

        <span
            class="inline-flex w-fit shrink-0 items-center rounded-full bg-indigo-100 px-4 py-2 text-xs font-bold text-[#2E3192] sm:px-5 sm:text-sm">
            STEP 01
        </span>

    </div>


    {{-- PROGRAM CARD --}}
    <div
        class="mt-8 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-lg sm:mt-10 sm:rounded-[32px]">

        {{-- HEADER PROGRAM --}}
        <div
            class="bg-gradient-to-r from-[#2E3192] to-blue-800 p-6 text-white sm:p-8">

            <div class="flex items-start justify-between gap-4">

                <div class="min-w-0 flex-1">

                    <span class="text-xs font-medium text-blue-100 sm:text-sm">
                        Program Pelatihan Korea
                    </span>

                    <h3
                        class="mt-2 break-words text-2xl font-extrabold leading-tight sm:text-3xl">
                        {{ $program->name }}
                    </h3>

                </div>

                {{-- ICON --}}
                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/20 backdrop-blur sm:h-14 sm:w-14 sm:rounded-2xl">

                    <i class="bi bi-mortarboard-fill text-2xl sm:text-3xl"></i>

                </div>

            </div>

        </div>


        {{-- BODY --}}
        <div class="p-5 sm:p-8">

            {{-- STATUS --}}
            <div
                class="flex flex-col gap-3 rounded-2xl border border-slate-100 bg-slate-50 p-4 sm:flex-row sm:items-center sm:justify-between sm:border-0 sm:bg-transparent sm:p-0">

                <p class="text-sm font-medium text-slate-500">
                    Status Program
                </p>

                <span
                    class="inline-flex w-fit items-center rounded-full bg-green-100 px-3 py-2 text-xs font-bold text-green-700 sm:px-4 sm:text-sm">

                    <i class="bi bi-check-circle-fill mr-1.5"></i>

                    Tersedia

                </span>

            </div>


            {{-- INFO GRID --}}
            <div class="mt-6 grid gap-4 sm:mt-8 sm:grid-cols-2 sm:gap-6">

                {{-- BIAYA PENDAFTARAN --}}
                <div
                    class="rounded-2xl bg-[#F8FAFC] p-4 sm:p-6">

                    <div class="flex items-start gap-3">

                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-yellow-100 text-yellow-600 sm:h-12 sm:w-12">

                            <i class="bi bi-wallet2 text-lg sm:text-xl"></i>

                        </div>

                        <div class="min-w-0">

                            <p class="text-xs leading-5 text-slate-500 sm:text-sm">
                                Biaya Pendaftaran
                            </p>

                            <h4
                                class="mt-1 break-words text-base font-bold leading-6 text-[#1E293B] sm:text-xl">

                                Rp {{ number_format($program->registration_fee, 0, ',', '.') }}

                            </h4>

                        </div>

                    </div>

                </div>


                {{-- BIAYA PELATIHAN --}}
                <div
                    class="rounded-2xl bg-[#F8FAFC] p-4 sm:p-6">

                    <div class="flex items-start gap-3">

                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-[#2E3192] sm:h-12 sm:w-12">

                            <i class="bi bi-cash-stack text-lg sm:text-xl"></i>

                        </div>

                        <div class="min-w-0">

                            <p class="text-xs leading-5 text-slate-500 sm:text-sm">
                                Biaya Pelatihan
                            </p>

                            <h4
                                class="mt-1 break-words text-base font-bold leading-6 text-[#1E293B] sm:text-xl">

                                Rp {{ number_format($program->training_fee, 0, ',', '.') }}

                            </h4>

                        </div>

                    </div>

                </div>


                {{-- DURASI --}}
                <div
                    class="rounded-2xl bg-[#F8FAFC] p-4 sm:p-6">

                    <div class="flex items-start gap-3">

                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-[#2E3192] sm:h-12 sm:w-12">

                            <i class="bi bi-clock-fill text-lg sm:text-xl"></i>

                        </div>

                        <div class="min-w-0">

                            <p class="text-xs leading-5 text-slate-500 sm:text-sm">
                                Durasi
                            </p>

                            <h4
                                class="mt-1 break-words text-sm font-bold leading-6 text-[#1E293B] sm:text-base">

                                {{ $program->duration }}

                            </h4>

                        </div>

                    </div>

                </div>


                {{-- JADWAL --}}
                <div
                    class="rounded-2xl bg-[#F8FAFC] p-4 sm:p-6">

                    <div class="flex items-start gap-3">

                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-yellow-100 text-yellow-600 sm:h-12 sm:w-12">

                            <i class="bi bi-calendar-event-fill text-lg sm:text-xl"></i>

                        </div>

                        <div class="min-w-0">

                            <p class="text-xs leading-5 text-slate-500 sm:text-sm">
                                Jadwal
                            </p>

                            <h4
                                class="mt-1 break-words text-sm font-bold leading-6 text-[#1E293B] sm:text-base">

                                {{ $program->schedule ?? '-' }}

                            </h4>

                        </div>

                    </div>

                </div>

            </div>


            {{-- BUTTON --}}
            <div class="mt-8 flex justify-stretch sm:mt-10 sm:justify-end">

                <button
                    type="button"
                    @click="step = 2"
                    class="group inline-flex w-full items-center justify-center gap-3 rounded-2xl bg-[#2E3192] px-6 py-4 text-sm font-bold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-blue-900 sm:w-auto sm:px-8 sm:text-base">

                    Lanjut Isi Biodata

                    <i
                        class="bi bi-arrow-right transition duration-300 group-hover:translate-x-1">
                    </i>

                </button>

            </div>

        </div>

    </div>

</div>