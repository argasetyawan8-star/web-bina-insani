<div
    x-show="step == 3"
    x-transition>

    <div class="flex items-center justify-between">

        <div>

            <h2 class="text-3xl font-bold text-slate-800">
                Upload Dokumen
            </h2>

            <p class="mt-2 text-slate-500">
                Upload dokumen yang diperlukan untuk proses verifikasi.
            </p>

        </div>

        <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-semibold">
            STEP 3
        </span>

    </div>

    <div class="mt-10 grid md:grid-cols-3 gap-6">

        {{-- Pas Foto --}}
        <div class="border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center">

            <div class="text-5xl mb-4">📷</div>

            <h3 class="font-semibold text-lg">
                Pas Foto
            </h3>

            <p class="text-sm text-slate-500 mt-2">
                JPG / PNG<br>Maks. 2 MB
            </p>

           <input
                type="file"
                name="photo"
                accept=".jpg,.jpeg,.png"
                class="mt-6 w-full text-sm">

            <p
                x-show="errors.photo"
                x-text="errors.photo"
                class="text-red-500 text-sm mt-3">
            </p>

        </div>

        {{-- KTP --}}
        <div class="border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center">

            <div class="text-5xl mb-4">🪪</div>

            <h3 class="font-semibold text-lg">
                KTP
            </h3>

            <p class="text-sm text-slate-500 mt-2">
                JPG / PNG / PDF<br>Maks. 5 MB
            </p>

            <input
                type="file"
                name="ktp"
                accept=".jpg,.jpeg,.png,.pdf"
                class="mt-6 w-full text-sm">

            <p
                x-show="errors.ktp"
                x-text="errors.ktp"
                class="text-red-500 text-sm mt-3">
            </p>


        </div>

        {{-- Ijazah --}}
        <div class="border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center">

            <div class="text-5xl mb-4">🎓</div>

            <h3 class="font-semibold text-lg">
                Ijazah
            </h3>

            <p class="text-sm text-slate-500 mt-2">
                JPG / PNG / PDF<br>Maks. 5 MB
            </p>

            <input
            type="file"
            name="ijazah"
            accept=".jpg,.jpeg,.png,.pdf"
            class="mt-6 w-full text-sm">

            <p
                x-show="errors.ijazah"
                x-text="errors.ijazah"
                class="text-red-500 text-sm mt-3">
            </p>

        </div>

    </div>

    <div class="mt-8 rounded-2xl bg-amber-50 border border-amber-200 p-5">

        <h4 class="font-semibold text-amber-700">
            Persyaratan Dokumen
        </h4>

        <ul class="mt-3 text-sm text-slate-600 space-y-2 list-disc list-inside">
            <li>Pas foto menggunakan latar belakang yang jelas.</li>
            <li>KTP harus masih berlaku dan terbaca dengan jelas.</li>
            <li>Ijazah atau surat kelulusan dapat digunakan.</li>
            <li>Pastikan file tidak melebihi batas ukuran.</li>
        </ul>

    </div>

    <div class="mt-10 flex justify-between">

        <button
            type="button"
            @click="step = 2"
            class="px-8 py-3 rounded-2xl border border-slate-300 hover:bg-slate-100">

            ← Kembali

        </button>

        <button
            type="button"
           @click="validateStep3()"
            class="px-8 py-3 rounded-2xl bg-blue-600 text-white hover:bg-blue-700">

            Selanjutnya →

        </button>

    </div>

</div>