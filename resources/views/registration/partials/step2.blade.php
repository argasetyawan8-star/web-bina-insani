{{-- STEP 2 : BIODATA --}}
<div
    x-show="step == 2"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-8"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-cloak
>

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div class="min-w-0">

            <span
                class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-3 py-1.5 text-xs font-semibold text-blue-700 sm:px-4 sm:py-2 sm:text-sm"
            >
                <i class="bi bi-person-vcard-fill"></i>
                Biodata Peserta
            </span>

            <h2
                class="mt-3 text-2xl font-extrabold leading-tight text-slate-900 sm:mt-4 sm:text-3xl lg:text-4xl"
            >
                Lengkapi Data Diri
            </h2>

            <p
                class="mt-2 max-w-xl text-sm leading-6 text-slate-500 sm:mt-3 sm:text-base"
            >
                Pastikan seluruh data sesuai KTP atau identitas resmi agar
                proses verifikasi berjalan lebih cepat.
            </p>

        </div>

        {{-- STEP INDICATOR --}}
        <div
            class="flex w-fit items-center gap-3 rounded-2xl border border-orange-200 bg-orange-50 px-4 py-3 sm:px-5 sm:py-3"
        >
            <div>
                <p class="text-xs text-orange-500">
                    Langkah
                </p>

                <h3 class="mt-0.5 text-xl font-bold text-orange-600 sm:text-2xl">
                    2 / 4
                </h3>
            </div>

            <div
                class="flex h-9 w-9 items-center justify-center rounded-xl bg-orange-100 text-orange-600"
            >
                <i class="bi bi-person-fill"></i>
            </div>
        </div>

    </div>


    {{-- FORM --}}
    <div class="mt-8 grid grid-cols-1 gap-5 sm:gap-6 md:grid-cols-2 lg:mt-10 lg:gap-7">

        {{-- NAMA --}}
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Nama Lengkap
            </label>

            <div class="relative">
                <i
                    class="bi bi-person absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 sm:left-5"
                ></i>

                <input
                    x-model="form.full_name"
                    type="text"
                    name="full_name"
                    placeholder="Masukkan nama lengkap"
                    class="w-full rounded-xl border bg-white py-3.5 pl-11 pr-4 text-sm outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 sm:rounded-2xl sm:py-4 sm:pl-14 sm:pr-5 sm:text-base"
                    :class="errors.full_name
                        ? 'border-red-500 ring-4 ring-red-100'
                        : 'border-slate-200'"
                >
            </div>

            <p
                x-show="errors.full_name"
                x-text="errors.full_name"
                class="mt-1.5 text-xs text-red-500 sm:text-sm"
            ></p>
        </div>


        {{-- NIK --}}
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Nomor Induk Kependudukan
            </label>

            <div class="relative">
                <i
                    class="bi bi-credit-card-2-front absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 sm:left-5"
                ></i>

                <input
                    x-model="form.nik"
                    type="number"
                    inputmode="numeric"
                    maxlength="16"
                    name="nik"
                    placeholder="16 Digit NIK"
                    class="w-full rounded-xl border bg-white py-3.5 pl-11 pr-4 text-sm outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 sm:rounded-2xl sm:py-4 sm:pl-14 sm:pr-5 sm:text-base"
                    :class="errors.nik
                        ? 'border-red-500 ring-4 ring-red-100'
                        : 'border-slate-200'"
                >
            </div>

            <p
                x-show="errors.nik"
                x-text="errors.nik"
                class="mt-1.5 text-xs text-red-500 sm:text-sm"
            ></p>
        </div>


        {{-- TEMPAT LAHIR --}}
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Tempat Lahir
            </label>

            <div class="relative">
                <i
                    class="bi bi-geo-alt absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 sm:left-5"
                ></i>

                <input
                    x-model="form.birth_place"
                    type="text"
                    name="birth_place"
                    placeholder="Contoh: Ciamis"
                    class="w-full rounded-xl border bg-white py-3.5 pl-11 pr-4 text-sm outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 sm:rounded-2xl sm:py-4 sm:pl-14 sm:pr-5 sm:text-base"
                    :class="errors.birth_place
                        ? 'border-red-500 ring-4 ring-red-100'
                        : 'border-slate-200'"
                >
            </div>

            <p
                x-show="errors.birth_place"
                x-text="errors.birth_place"
                class="mt-1.5 text-xs text-red-500 sm:text-sm"
            ></p>
        </div>


        {{-- TANGGAL LAHIR --}}
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Tanggal Lahir
            </label>

            <div class="relative">
                <i
                    class="bi bi-calendar-event absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 sm:left-5"
                ></i>

                <input
                    x-model="form.birth_date"
                    type="date"
                    name="birth_date"
                    class="w-full rounded-xl border bg-white py-3.5 pl-11 pr-4 text-sm outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 sm:rounded-2xl sm:py-4 sm:pl-14 sm:pr-5 sm:text-base"
                    :class="errors.birth_date
                        ? 'border-red-500 ring-4 ring-red-100'
                        : 'border-slate-200'"
                >
            </div>

            <p
                x-show="errors.birth_date"
                x-text="errors.birth_date"
                class="mt-1.5 text-xs text-red-500 sm:text-sm"
            ></p>
        </div>


        {{-- JENIS KELAMIN --}}
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Jenis Kelamin
            </label>

            <div class="relative">

                <i
                    class="bi bi-people absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 sm:left-5"
                ></i>

                <select
                    x-model="form.gender"
                    name="gender"
                    class="w-full appearance-none rounded-xl border bg-white py-3.5 pl-11 pr-11 text-sm outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 sm:rounded-2xl sm:py-4 sm:pl-14 sm:pr-12 sm:text-base"
                    :class="errors.gender
                        ? 'border-red-500 ring-4 ring-red-100'
                        : 'border-slate-200'"
                >

                    <option value="">
                        Pilih Jenis Kelamin
                    </option>

                    <option value="Laki-laki">
                        Laki-laki
                    </option>

                    <option value="Perempuan">
                        Perempuan
                    </option>

                </select>

                <i
                    class="bi bi-chevron-down pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 sm:right-5"
                ></i>

            </div>

            <p
                x-show="errors.gender"
                x-text="errors.gender"
                class="mt-1.5 text-xs text-red-500 sm:text-sm"
            ></p>
        </div>


        {{-- NOMOR WHATSAPP --}}
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Nomor WhatsApp
            </label>

            <div class="relative">

                <i
                    class="bi bi-whatsapp absolute left-4 top-1/2 -translate-y-1/2 text-green-500 sm:left-5"
                ></i>

                <input
                    x-model="form.phone"
                    type="number"
                    inputmode="numeric"
                    name="phone"
                    placeholder="08xxxxxxxxxx"
                    class="w-full rounded-xl border bg-white py-3.5 pl-11 pr-4 text-sm outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 sm:rounded-2xl sm:py-4 sm:pl-14 sm:pr-5 sm:text-base"
                    :class="errors.phone
                        ? 'border-red-500 ring-4 ring-red-100'
                        : 'border-slate-200'"
                >

            </div>

            <p
                x-show="errors.phone"
                x-text="errors.phone"
                class="mt-1.5 text-xs text-red-500 sm:text-sm"
            ></p>
        </div>


        {{-- EMAIL --}}
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Email Aktif
            </label>

            <div class="relative">

                <i
                    class="bi bi-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 sm:left-5"
                ></i>

                <input
                    x-model="form.email"
                    type="email"
                    name="email"
                    placeholder="nama@email.com"
                    class="w-full rounded-xl border bg-white py-3.5 pl-11 pr-4 text-sm outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 sm:rounded-2xl sm:py-4 sm:pl-14 sm:pr-5 sm:text-base"
                    :class="errors.email
                        ? 'border-red-500 ring-4 ring-red-100'
                        : 'border-slate-200'"
                >

            </div>

            <p
                x-show="errors.email"
                x-text="errors.email"
                class="mt-1.5 text-xs text-red-500 sm:text-sm"
            ></p>
        </div>


        {{-- PENDIDIKAN --}}
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Pendidikan Terakhir
            </label>

            <div class="relative">

                <i
                    class="bi bi-mortarboard absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 sm:left-5"
                ></i>

                <select
                    x-model="form.education"
                    name="education"
                    class="w-full appearance-none rounded-xl border bg-white py-3.5 pl-11 pr-11 text-sm outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 sm:rounded-2xl sm:py-4 sm:pl-14 sm:pr-12 sm:text-base"
                    :class="errors.education
                        ? 'border-red-500 ring-4 ring-red-100'
                        : 'border-slate-200'"
                >

                    <option value="">
                        Pilih Pendidikan
                    </option>

                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA/SMK">SMA / SMK</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="D5">D5</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>

                </select>

                <i
                    class="bi bi-chevron-down pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 sm:right-5"
                ></i>

            </div>

            <p
                x-show="errors.education"
                x-text="errors.education"
                class="mt-1.5 text-xs text-red-500 sm:text-sm"
            ></p>
        </div>


        {{-- PEKERJAAN --}}
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Pekerjaan Saat Ini
            </label>

            <div class="relative">

                <i
                    class="bi bi-briefcase-fill absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 sm:left-5"
                ></i>

                <input
                    x-model="form.job"
                    type="text"
                    name="job"
                    placeholder="Contoh: Pelajar, Mahasiswa, Karyawan"
                    class="w-full rounded-xl border bg-white py-3.5 pl-11 pr-4 text-sm outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 sm:rounded-2xl sm:py-4 sm:pl-14 sm:pr-5 sm:text-base"
                    :class="errors.job
                        ? 'border-red-500 ring-4 ring-red-100'
                        : 'border-slate-200'"
                >

            </div>

            <p
                x-show="errors.job"
                x-text="errors.job"
                class="mt-1.5 text-xs text-red-500 sm:text-sm"
            ></p>
        </div>


        {{-- ALAMAT --}}
        <div class="md:col-span-2">

            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Alamat Lengkap
            </label>

            <div class="relative">

                <i
                    class="bi bi-geo-alt-fill absolute left-4 top-5 text-slate-400 sm:left-5"
                ></i>

                <textarea
                    x-model="form.address"
                    name="address"
                    rows="4"
                    placeholder="Masukkan alamat lengkap sesuai KTP"
                    class="w-full resize-none rounded-xl border bg-white py-3.5 pl-11 pr-4 text-sm outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 sm:rounded-2xl sm:py-4 sm:pl-14 sm:pr-5 sm:text-base"
                    :class="errors.address
                        ? 'border-red-500 ring-4 ring-red-100'
                        : 'border-slate-200'"
                ></textarea>

            </div>

            <p
                x-show="errors.address"
                x-text="errors.address"
                class="mt-1.5 text-xs text-red-500 sm:text-sm"
            ></p>

        </div>

    </div>


    {{-- NAVIGATION --}}
    <div
        class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:mt-10 sm:flex-row sm:items-center sm:justify-between sm:gap-4 sm:pt-8"
    >

        {{-- BACK --}}
        <button
            type="button"
            @click="step = 1"
            class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition duration-300 hover:-translate-y-0.5 hover:border-blue-500 hover:text-blue-600 hover:shadow-md sm:w-auto sm:rounded-2xl sm:px-7 sm:py-3.5 sm:text-base"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali
        </button>


        {{-- NEXT --}}
        <button
            type="button"
            @click="validateStep2()"
            class="group inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#2E3192] px-5 py-3.5 text-sm font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900 sm:w-auto sm:rounded-2xl sm:px-8 sm:py-4 sm:text-base"
        >
            <span>
                Lanjut ke Upload Dokumen
            </span>

            <i class="bi bi-arrow-right transition group-hover:translate-x-1"></i>
        </button>

    </div>

</div>