<div
    x-show="step == 1"
    x-transition>

    <input
        type="hidden"
        name="program_id"
        value="{{ $program->id }}">

    <div class="flex items-center justify-between">

        <div>

            <h2 class="text-3xl font-bold text-slate-800">

                Program Dipilih

            </h2>

            <p class="text-slate-500 mt-2">

                Pastikan program yang Anda pilih sudah sesuai.

            </p>

        </div>

        <span
            class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-semibold">

            STEP 1

        </span>

    </div>

    <div
        class="mt-10 rounded-3xl border border-slate-200 p-8">

        <div class="flex items-center justify-between">

            <div>

                <h3 class="text-3xl font-bold">

                    {{ $program->name }}

                </h3>

                <p class="mt-2 text-slate-500">

                    Program Pelatihan Bahasa Korea

                </p>

            </div>

            <div>

                <span
                    class="bg-green-100 text-green-700 px-4 py-2 rounded-full">

                    Tersedia

                </span>

            </div>

        </div>

        <div
            class="grid md:grid-cols-2 gap-6 mt-10">

            <div
                class="rounded-2xl bg-slate-50 p-6">

                <p class="text-slate-500">

                    Biaya Pendaftaran

                </p>

                <h3 class="text-2xl font-bold mt-2">

                    Rp {{ number_format($program->registration_fee,0,',','.') }}

                </h3>

            </div>

            <div
                class="rounded-2xl bg-slate-50 p-6">

                <p class="text-slate-500">

                    Biaya Pelatihan

                </p>

                <h3 class="text-2xl font-bold mt-2">

                    Rp {{ number_format($program->training_fee,0,',','.') }}

                </h3>

            </div>

            <div
                class="rounded-2xl bg-slate-50 p-6">

                <p class="text-slate-500">

                    Durasi

                </p>

                <h3 class="text-xl font-semibold mt-2">

                    {{ $program->duration }}

                </h3>

            </div>

            <div
                class="rounded-2xl bg-slate-50 p-6">

                <p class="text-slate-500">

                    Jadwal

                </p>

                <h3 class="text-xl font-semibold mt-2">

                    {{ $program->schedule }}

                </h3>

            </div>

        </div>

        <div
            class="mt-12 flex justify-end">

            <button
                type="button"
                @click="step = 2"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-2xl font-semibold transition">

                Selanjutnya →

            </button>

        </div>

    </div>

</div>