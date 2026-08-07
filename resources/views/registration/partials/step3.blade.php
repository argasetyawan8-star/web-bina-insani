{{-- STEP 3 : UPLOAD DOCUMENT --}}
<div
    x-show="step == 3"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-8"
    x-transition:enter-end="opacity-100 translate-y-0">

<div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

    <div>

        <span class="inline-flex items-center gap-2 rounded-full bg-orange-100 px-4 py-2 text-sm font-semibold text-orange-600">

            <i class="bi bi-cloud-arrow-up-fill"></i>

            Upload Dokumen

        </span>


        <h2 class="mt-4 text-4xl font-extrabold text-slate-900">

            Lengkapi Dokumen Persyaratan

        </h2>


        <p class="mt-3 max-w-xl text-slate-500">

            Upload dokumen resmi untuk proses verifikasi administrasi peserta.

        </p>

    </div>


    <div class="rounded-2xl border border-blue-200 bg-blue-50 px-6 py-4">

        <p class="text-sm text-blue-500">

            Langkah

        </p>

        <h3 class="mt-1 text-3xl font-bold text-blue-600">

            3 / 4

        </h3>

    </div>

</div>



{{-- Upload Cards --}}

<div class="mt-12 grid gap-8 md:grid-cols-3">


    {{-- FOTO --}}

    <div
        class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm hover:shadow-xl transition">


        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-100 text-blue-600">

            <i class="bi bi-person-bounding-box text-3xl"></i>

        </div>


        <h3 class="mt-6 text-xl font-bold">

            Foto Peserta

        </h3>


        <p class="mt-2 text-sm text-slate-500">

            Upload foto terbaru ukuran formal.

        </p>



        <label
            class="mt-6 flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-300 p-6 hover:border-blue-500 hover:bg-blue-50 transition">


            <i class="bi bi-upload text-3xl text-slate-400"></i>


            <span class="mt-3 text-sm text-slate-500">

                Klik untuk upload

            </span>


            <input

                type="file"

                name="photo"

                accept="image/*"

                class="hidden"

            >

        </label>


    </div>




    {{-- KTP --}}

    <div
        class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm hover:shadow-xl transition">


        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-orange-100 text-orange-500">

            <i class="bi bi-card-heading text-3xl"></i>

        </div>


        <h3 class="mt-6 text-xl font-bold">

            KTP

        </h3>


        <p class="mt-2 text-sm text-slate-500">

            Upload scan KTP yang masih berlaku.

        </p>



        <label
            class="mt-6 flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-300 p-6 hover:border-orange-500 hover:bg-orange-50 transition">


            <i class="bi bi-upload text-3xl text-slate-400"></i>


            <span class="mt-3 text-sm text-slate-500">

                Klik untuk upload

            </span>


            <input

                type="file"

                name="ktp"

                accept="image/*"

                class="hidden"

            >


        </label>


    </div>





    {{-- IJAZAH --}}

    <div
        class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm hover:shadow-xl transition">


        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-green-100 text-green-600">

            <i class="bi bi-mortarboard-fill text-3xl"></i>

        </div>


        <h3 class="mt-6 text-xl font-bold">

            Ijazah

        </h3>


        <p class="mt-2 text-sm text-slate-500">

            Upload ijazah pendidikan terakhir.

        </p>



        <label
            class="mt-6 flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-300 p-6 hover:border-green-500 hover:bg-green-50 transition">


            <i class="bi bi-upload text-3xl text-slate-400"></i>


            <span class="mt-3 text-sm text-slate-500">

                Klik untuk upload

            </span>


            <input

                type="file"

                name="ijazah"

                accept=".pdf,image/*"

                class="hidden"

            >


        </label>


    </div>


</div>





{{-- Info --}}

<div
    class="mt-10 rounded-3xl bg-blue-50 border border-blue-100 p-6">


    <div class="flex gap-4">


        <div
            class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white">

            <i class="bi bi-info-circle-fill"></i>

        </div>


        <div>


            <h4 class="font-bold text-blue-700">

                Perhatikan sebelum upload

            </h4>


            <ul class="mt-2 space-y-1 text-sm text-slate-600">


                <li>
                    ✓ File harus jelas dan dapat terbaca
                </li>


                <li>
                    ✓ Ukuran maksimal 2 MB
                </li>


                <li>
                    ✓ Format JPG, PNG, atau PDF
                </li>


            </ul>


        </div>


    </div>


</div>





{{-- Navigation --}}

<div class="mt-12 flex justify-between">


    <button
        type="button"
        @click="step = 2"

        class="inline-flex items-center gap-2 rounded-2xl border border-slate-300 bg-white px-7 py-3 font-semibold text-slate-700 hover:border-blue-500 hover:text-blue-600 transition">


        <i class="bi bi-arrow-left"></i>

        Kembali


    </button>




    <button
        type="button"

        @click="step = 4"

        class="group flex items-center gap-3 rounded-2xl bg-[#2E3192] px-8 py-4 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900">


        Review Data

        <i class="bi bi-arrow-right"></i>


    </button>


</div>

</div>