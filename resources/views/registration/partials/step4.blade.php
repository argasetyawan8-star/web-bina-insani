<div
    x-show="step == 4"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-8"
    x-transition:enter-end="opacity-100 translate-y-0">

    {{-- Header --}}
    <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

        <div>

            <span class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

                <i class="bi bi-clipboard-check-fill"></i>

                Review Pendaftaran

            </span>

            <h2 class="mt-4 text-4xl font-extrabold text-slate-900">

                Periksa Kembali Data Anda

            </h2>

            <p class="mt-3 max-w-2xl text-slate-500">

                Pastikan seluruh data yang telah diisi sudah benar sebelum melanjutkan ke proses pembayaran.

            </p>

        </div>

        <div
            class="rounded-2xl border border-orange-200 bg-orange-50 px-6 py-4">

            <p class="text-sm text-orange-500">

                Langkah

            </p>

            <h3 class="mt-1 text-3xl font-bold text-orange-600">

                4 / 4

            </h3>

        </div>

    </div>

    {{-- Ringkasan Program --}}
    <div
        class="mt-10 rounded-3xl border border-blue-100 bg-gradient-to-r from-blue-50 via-white to-orange-50 p-8">

        <div class="flex items-center justify-between">

            <div class="flex items-center gap-4">

                <div
                    class="flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-600 text-white">

                    <i class="bi bi-mortarboard-fill text-3xl"></i>

                </div>

                <div>

                    <h3 class="text-2xl font-bold text-slate-800">

                        Program Pelatihan

                    </h3>

                    <p class="text-slate-500">

                        Program yang dipilih peserta

                    </p>

                </div>

            </div>

            <span
                class="rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">

                Dipilih

            </span>

        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-2">

            <div class="rounded-2xl bg-white p-6 shadow-sm">

                <p class="text-sm text-slate-500">

                    Nama Program

                </p>

                <h4 class="mt-2 text-xl font-bold text-slate-800">

                    {{ $program->name }}

                </h4>

            </div>

            <div class="rounded-2xl bg-white p-6 shadow-sm">

                <p class="text-sm text-slate-500">

                    Biaya Pendaftaran

                </p>

                <h4 class="mt-2 text-xl font-bold text-orange-500">

                    Rp {{ number_format($program->registration_fee,0,',','.') }}

                </h4>

            </div>

        </div>

    </div>

        {{-- Review Biodata --}}
    <div class="mt-10 grid gap-8 lg:grid-cols-2">

        {{-- Biodata --}}
        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

            <div class="mb-6 flex items-center gap-3">

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-100">

                    <i class="bi bi-person-vcard-fill text-xl text-blue-600"></i>

                </div>

                <div>

                    <h3 class="text-xl font-bold text-slate-800">
                        Biodata Peserta
                    </h3>

                    <p class="text-sm text-slate-500">
                        Pastikan data sudah sesuai.
                    </p>

                </div>

            </div>

            <div class="space-y-5">

                <div class="flex justify-between border-b pb-3">
                    <span class="text-slate-500">Nama Lengkap</span>
                    <span class="font-semibold" x-text="form.full_name"></span>
                </div>

                <div class="flex justify-between border-b pb-3">
                    <span class="text-slate-500">NIK</span>
                    <span class="font-semibold" x-text="form.nik"></span>
                </div>

                <div class="flex justify-between border-b pb-3">
                    <span class="text-slate-500">Tempat Lahir</span>
                    <span class="font-semibold" x-text="form.birth_place"></span>
                </div>

                <div class="flex justify-between border-b pb-3">
                    <span class="text-slate-500">Tanggal Lahir</span>
                    <span class="font-semibold" x-text="form.birth_date"></span>
                </div>

                <div class="flex justify-between border-b pb-3">
                    <span class="text-slate-500">Jenis Kelamin</span>
                    <span class="font-semibold" x-text="form.gender"></span>
                </div>

                <div class="flex justify-between border-b pb-3">
                    <span class="text-slate-500">No. WhatsApp</span>
                    <span class="font-semibold" x-text="form.phone"></span>
                </div>

                <div class="flex justify-between border-b pb-3">
                    <span class="text-slate-500">Email</span>
                    <span class="font-semibold" x-text="form.email"></span>
                </div>

                <div class="flex justify-between border-b pb-3">
                    <span class="text-slate-500">Pendidikan</span>
                    <span class="font-semibold" x-text="form.education"></span>
                </div>

                <div class="flex justify-between">
                    <span class="text-slate-500">Pekerjaan</span>
                    <span class="font-semibold" x-text="form.job"></span>
                </div>

            </div>

        </div>

        {{-- Dokumen --}}
        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">

            <div class="mb-6 flex items-center gap-3">

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-orange-100">

                    <i class="bi bi-folder-check text-xl text-orange-500"></i>

                </div>

                <div>

                    <h3 class="text-xl font-bold text-slate-800">

                        Dokumen

                    </h3>

                    <p class="text-sm text-slate-500">

                        Dokumen yang telah diupload.

                    </p>

                </div>

            </div>

            <div class="space-y-5">

                <div class="flex items-center justify-between rounded-2xl bg-slate-50 p-4">

                    <div class="flex items-center gap-3">

                        <i class="bi bi-camera-fill text-2xl text-blue-600"></i>

                        <div>

                            <h4 class="font-semibold">

                                Pas Foto

                            </h4>

                            <p class="text-sm text-slate-500">

                                Sudah dipilih

                            </p>

                        </div>

                    </div>

                    <i class="bi bi-check-circle-fill text-2xl text-green-500"></i>

                </div>

                <div class="flex items-center justify-between rounded-2xl bg-slate-50 p-4">

                    <div class="flex items-center gap-3">

                        <i class="bi bi-person-vcard-fill text-2xl text-orange-500"></i>

                        <div>

                            <h4 class="font-semibold">

                                KTP

                            </h4>

                            <p class="text-sm text-slate-500">

                                Sudah dipilih

                            </p>

                        </div>

                    </div>

                    <i class="bi bi-check-circle-fill text-2xl text-green-500"></i>

                </div>

                <div class="flex items-center justify-between rounded-2xl bg-slate-50 p-4">

                    <div class="flex items-center gap-3">

                        <i class="bi bi-mortarboard-fill text-2xl text-yellow-500"></i>

                        <div>

                            <h4 class="font-semibold">

                                Ijazah

                            </h4>

                            <p class="text-sm text-slate-500">

                                Sudah dipilih

                            </p>

                        </div>

                    </div>

                    <i class="bi bi-check-circle-fill text-2xl text-green-500"></i>

                </div>

            </div>

        </div>

    </div>

        {{-- Persetujuan --}}
    <div
        class="mt-10 rounded-3xl border border-amber-200 bg-gradient-to-r from-yellow-50 via-white to-orange-50 p-8">

        <div class="flex items-start gap-4">

            <input
                id="agreement"
                type="checkbox"
                required
                class="mt-1 h-5 w-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500">

            <label
                for="agreement"
                class="leading-7 text-slate-600">

                Saya menyatakan bahwa seluruh data yang saya isi adalah
                <span class="font-semibold text-slate-800">benar</span>
                dan dapat dipertanggungjawabkan. Saya bersedia mengikuti
                seluruh proses pendaftaran sesuai ketentuan
                <span class="font-semibold text-blue-600">
                    Bina Insani.
                </span>

            </label>

        </div>

    </div>

    {{-- Navigation --}}
    <div
        class="mt-12 flex items-center justify-between border-t border-slate-200 pt-8">

        <button
            type="button"
            @click="step = 3"
            class="inline-flex items-center gap-2 rounded-2xl border border-slate-300 bg-white px-8 py-3 font-semibold text-slate-700 transition duration-300 hover:border-blue-500 hover:text-blue-600 hover:shadow-md">

            <i class="bi bi-arrow-left"></i>

            Kembali

        </button>

        <button
            type="submit"
            class="group flex items-center gap-3 rounded-2xl bg-[#2E3192] px-8 py-4 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900">

            <i class="bi bi-credit-card-fill"></i>

            Lanjut ke Pembayaran

        </button>

    </div>

</div>