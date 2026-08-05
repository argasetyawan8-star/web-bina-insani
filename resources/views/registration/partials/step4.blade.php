<div
    x-show="step == 4"
    x-transition>

    <div class="flex items-center justify-between">

        <div>

            <h2 class="text-3xl font-bold text-slate-800">
                Review Pendaftaran
            </h2>

            <p class="mt-2 text-slate-500">
                Pastikan seluruh data yang Anda masukkan sudah benar.
            </p>

        </div>

        <span
            class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-semibold">

            STEP 4

        </span>

    </div>

    {{-- Biodata --}}
    <div class="mt-10 bg-slate-50 rounded-2xl p-6">

        <h3 class="font-bold text-xl mb-6">
            Biodata Peserta
        </h3>

        <div class="grid md:grid-cols-2 gap-5">

            <div>

                <p class="text-slate-500 text-sm">Nama Lengkap</p>

                <p
                    class="font-semibold"
                    x-text="document.getElementsByName('full_name')[0].value">
                </p>

            </div>

            <div>

                <p class="text-slate-500 text-sm">NIK</p>

                <p
                    class="font-semibold"
                    x-text="document.getElementsByName('nik')[0].value">
                </p>

            </div>

            <div>

                <p class="text-slate-500 text-sm">Tempat Lahir</p>

                <p
                    class="font-semibold"
                    x-text="document.getElementsByName('birth_place')[0].value">
                </p>

            </div>

            <div>

                <p class="text-slate-500 text-sm">Tanggal Lahir</p>

                <p
                    class="font-semibold"
                    x-text="document.getElementsByName('birth_date')[0].value">
                </p>

            </div>

            <div>

                <p class="text-slate-500 text-sm">Jenis Kelamin</p>

                <p
                    class="font-semibold"
                    x-text="document.getElementsByName('gender')[0].value">
                </p>

            </div>

            <div>

                <p class="text-slate-500 text-sm">Nomor HP</p>

                <p
                    class="font-semibold"
                    x-text="document.getElementsByName('phone')[0].value">
                </p>

            </div>

            <div>

                <p class="text-slate-500 text-sm">Email</p>

                <p
                    class="font-semibold"
                    x-text="document.getElementsByName('email')[0].value">
                </p>

            </div>

            <div>

                <p class="text-slate-500 text-sm">Pendidikan</p>

                <p
                    class="font-semibold"
                    x-text="document.getElementsByName('education')[0].value">
                </p>

            </div>

            <div class="md:col-span-2">

                <p class="text-slate-500 text-sm">Pekerjaan</p>

                <p
                    class="font-semibold"
                    x-text="document.getElementsByName('job')[0].value">
                </p>

            </div>

            <div class="md:col-span-2">

                <p class="text-slate-500 text-sm">Alamat</p>

                <p
                    class="font-semibold whitespace-pre-line"
                    x-text="document.getElementsByName('address')[0].value">
                </p>

            </div>

        </div>

    </div>

    {{-- Dokumen --}}
    <div class="mt-8 bg-slate-50 rounded-2xl p-6">

        <h3 class="font-bold text-xl mb-5">
            Dokumen
        </h3>

        <div class="space-y-4">

            <div class="flex justify-between">

                <span>Pas Foto</span>

                <span
                    class="text-green-600 font-semibold"
                    x-text="document.getElementsByName('photo')[0].files[0]?.name">
                </span>

            </div>

            <div class="flex justify-between">

                <span>KTP</span>

                <span
                    class="text-green-600 font-semibold"
                    x-text="document.getElementsByName('ktp')[0].files[0]?.name">
                </span>

            </div>

            <div class="flex justify-between">

                <span>Ijazah</span>

                <span
                    class="text-green-600 font-semibold"
                    x-text="document.getElementsByName('ijazah')[0].files[0]?.name">
                </span>

            </div>

        </div>

    </div>

    {{-- Tombol --}}
    <div class="mt-10 flex justify-between">

        <button
            type="button"
            @click="step = 3"
            class="px-8 py-3 rounded-xl border hover:bg-slate-100">

            ← Kembali

        </button>

       <button type="submit" 
            class="px-8 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold shadow-lg">
    
    

    Daftar & Lanjut ke Pembayaran

</button>

    </div>

</div>