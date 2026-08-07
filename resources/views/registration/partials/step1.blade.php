<div
    x-show="step == 1"
    x-transition>

<input
    type="hidden"
    name="program_id"
    value="{{ $program->id }}">


<div class="flex items-center justify-between">

    <div>

        <h2 class="text-3xl font-extrabold text-[#1E293B]">

            Program Dipilih

        </h2>

        <p class="mt-2 text-slate-500">

            Pastikan program pelatihan yang Anda pilih sudah sesuai.

        </p>

    </div>


    <span
        class="rounded-full bg-indigo-100 px-5 py-2 text-sm font-bold text-[#2E3192]">

        STEP 01

    </span>

</div>




{{-- PROGRAM CARD --}}
<div
    class="mt-10 overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-xl">


    {{-- Header --}}
    <div
        class="bg-gradient-to-r from-[#2E3192] to-blue-800 p-8 text-white">


        <div class="flex items-center justify-between">


            <div>

                <span class="text-sm text-blue-100">

                    Program Pelatihan Korea

                </span>


                <h3 class="mt-2 text-3xl font-extrabold">

                    {{ $program->name }}

                </h3>


            </div>



            <div
                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/20 backdrop-blur">


                <i class="bi bi-mortarboard-fill text-3xl"></i>


            </div>


        </div>


    </div>





    <div class="p-8">


        <div class="flex items-center justify-between">


            <p class="text-slate-500">

                Status Program

            </p>


            <span
                class="rounded-full bg-green-100 px-4 py-2 text-sm font-bold text-green-700">


                <i class="bi bi-check-circle-fill mr-1"></i>

                Tersedia


            </span>


        </div>






        {{-- INFO GRID --}}
        <div
            class="mt-8 grid gap-6 md:grid-cols-2">



            <div
                class="rounded-2xl bg-[#F8FAFC] p-6">


                <div class="flex items-center gap-3">


                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-100 text-yellow-600">


                        <i class="bi bi-wallet2 text-xl"></i>


                    </div>


                    <div>


                        <p class="text-sm text-slate-500">

                            Biaya Pendaftaran

                        </p>


                        <h4 class="mt-1 text-xl font-bold text-[#1E293B]">


                            Rp {{ number_format($program->registration_fee,0,',','.') }}


                        </h4>


                    </div>


                </div>


            </div>





            <div
                class="rounded-2xl bg-[#F8FAFC] p-6">


                <div class="flex items-center gap-3">


                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-[#2E3192]">


                        <i class="bi bi-cash-stack text-xl"></i>


                    </div>


                    <div>


                        <p class="text-sm text-slate-500">

                            Biaya Pelatihan

                        </p>


                        <h4 class="mt-1 text-xl font-bold">


                            Rp {{ number_format($program->training_fee,0,',','.') }}


                        </h4>


                    </div>


                </div>


            </div>






            <div
                class="rounded-2xl bg-[#F8FAFC] p-6">


                <div class="flex items-center gap-3">


                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-[#2E3192]">


                        <i class="bi bi-clock-fill text-xl"></i>


                    </div>


                    <div>


                        <p class="text-sm text-slate-500">

                            Durasi

                        </p>


                        <h4 class="mt-1 font-bold">


                            {{ $program->duration }}


                        </h4>


                    </div>


                </div>


            </div>







            <div
                class="rounded-2xl bg-[#F8FAFC] p-6">


                <div class="flex items-center gap-3">


                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-100 text-yellow-600">


                        <i class="bi bi-calendar-event-fill text-xl"></i>


                    </div>


                    <div>


                        <p class="text-sm text-slate-500">

                            Jadwal

                        </p>


                        <h4 class="mt-1 font-bold">


                            {{ $program->schedule ?? '-' }}


                        </h4>


                    </div>


                </div>


            </div>



        </div>






        {{-- BUTTON --}}
        <div
            class="mt-10 flex justify-end">


            <button

                type="button"

                @click="step = 2"

                class="group flex items-center gap-3 rounded-2xl bg-[#2E3192] px-8 py-4 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900">


                Lanjut Isi Biodata


                <i class="bi bi-arrow-right transition group-hover:translate-x-1"></i>


            </button>


        </div>



    </div>


</div>

</div>