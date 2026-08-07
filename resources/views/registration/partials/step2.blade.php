<div
    x-show="step == 2"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-8"
    x-transition:enter-end="opacity-100 translate-y-0">

    {{-- Header --}}
    <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

        <div>

            <span class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

                <i class="bi bi-person-vcard-fill"></i>

                Biodata Peserta

            </span>

            <h2 class="mt-4 text-4xl font-extrabold text-slate-900">

                Lengkapi Data Diri

            </h2>

            <p class="mt-3 max-w-xl text-slate-500">

                Pastikan seluruh data sesuai KTP atau identitas resmi agar proses verifikasi berjalan lebih cepat.

            </p>

        </div>

        <div
            class="rounded-2xl border border-orange-200 bg-orange-50 px-6 py-4">

            <p class="text-sm text-orange-500">

                Langkah

            </p>

            <h3 class="mt-1 text-3xl font-bold text-orange-600">

                2 / 4

            </h3>

        </div>

    </div>

    {{-- Form --}}
    <div class="mt-12 grid gap-8 md:grid-cols-2">

        {{-- Nama --}}
        <div>

            <label class="mb-2 block font-semibold text-slate-700">

                Nama Lengkap

            </label>

            <div class="relative">

                <i class="bi bi-person absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>

                <input
                    x-model="form.full_name"
                    type="text"
                    name="full_name"
                    placeholder="Masukkan nama lengkap"
                    class="w-full rounded-2xl border bg-white py-4 pl-14 pr-5 outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    :class="errors.full_name ? 'border-red-500 ring-4 ring-red-100' : 'border-slate-200'">

            </div>

            <p
                x-show="errors.full_name"
                x-text="errors.full_name"
                class="mt-2 text-sm text-red-500">
            </p>

        </div>

        {{-- NIK --}}
        <div>

            <label class="mb-2 block font-semibold text-slate-700">

                Nomor Induk Kependudukan

            </label>

            <div class="relative">

                <i class="bi bi-credit-card-2-front absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>

                <input
                    x-model="form.nik"
                    type="number"
                    name="nik"
                    placeholder="16 Digit NIK"
                    class="w-full rounded-2xl border bg-white py-4 pl-14 pr-5 outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    :class="errors.nik ? 'border-red-500 ring-4 ring-red-100' : 'border-slate-200'">

            </div>

            <p
                x-show="errors.nik"
                x-text="errors.nik"
                class="mt-2 text-sm text-red-500">
            </p>

        </div>

        {{-- Tempat Lahir --}}
        <div>

            <label class="mb-2 block font-semibold text-slate-700">

                Tempat Lahir

            </label>

            <div class="relative">

                <i class="bi bi-geo-alt absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>

                <input
                    x-model="form.birth_place"
                    type="text"
                    name="birth_place"
                    placeholder="Contoh : Ciamis"
                    class="w-full rounded-2xl border bg-white py-4 pl-14 pr-5 outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    :class="errors.birth_place ? 'border-red-500 ring-4 ring-red-100' : 'border-slate-200'">

            </div>

            <p
                x-show="errors.birth_place"
                x-text="errors.birth_place"
                class="mt-2 text-sm text-red-500">
            </p>

        </div>

        {{-- Tanggal Lahir --}}
        <div>

            <label class="mb-2 block font-semibold text-slate-700">

                Tanggal Lahir

            </label>

            <div class="relative">

                <i class="bi bi-calendar-event absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>

                <input
                    x-model="form.birth_date"
                    type="date"
                    name="birth_date"
                    class="w-full rounded-2xl border bg-white py-4 pl-14 pr-5 outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    :class="errors.birth_date ? 'border-red-500 ring-4 ring-red-100' : 'border-slate-200'">

            </div>

            <p
                x-show="errors.birth_date"
                x-text="errors.birth_date"
                class="mt-2 text-sm text-red-500">
            </p>

        </div>
                {{-- Jenis Kelamin --}}
        <div>

            <label class="mb-2 block font-semibold text-slate-700">

                Jenis Kelamin

            </label>

            <div class="relative">

                <i class="bi bi-people absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>

                <select
                    x-model="form.gender"
                    name="gender"
                    class="w-full appearance-none rounded-2xl border bg-white py-4 pl-14 pr-12 outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    :class="errors.gender ? 'border-red-500 ring-4 ring-red-100' : 'border-slate-200'">

                    <option value="">Pilih Jenis Kelamin</option>

                    <option value="Laki-laki">
                        Laki-laki
                    </option>

                    <option value="Perempuan">
                        Perempuan
                    </option>

                </select>

                <i class="bi bi-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>

            </div>

            <p
                x-show="errors.gender"
                x-text="errors.gender"
                class="mt-2 text-sm text-red-500">
            </p>

        </div>

        {{-- Nomor HP --}}
        <div>

            <label class="mb-2 block font-semibold text-slate-700">

                Nomor WhatsApp

            </label>

            <div class="relative">

                <i class="bi bi-whatsapp absolute left-5 top-1/2 -translate-y-1/2 text-green-500"></i>

                <input
                    x-model="form.phone"
                    type="number"
                    name="phone"
                    placeholder="08xxxxxxxxxx"
                    class="w-full rounded-2xl border bg-white py-4 pl-14 pr-5 outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    :class="errors.phone ? 'border-red-500 ring-4 ring-red-100' : 'border-slate-200'">

            </div>

            <p
                x-show="errors.phone"
                x-text="errors.phone"
                class="mt-2 text-sm text-red-500">
            </p>

        </div>

        {{-- Email --}}
        <div>

            <label class="mb-2 block font-semibold text-slate-700">

                Email Aktif

            </label>

            <div class="relative">

                <i class="bi bi-envelope absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>

                <input
                    x-model="form.email"
                    type="email"
                    name="email"
                    placeholder="nama@email.com"
                    class="w-full rounded-2xl border bg-white py-4 pl-14 pr-5 outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    :class="errors.email ? 'border-red-500 ring-4 ring-red-100' : 'border-slate-200'">

            </div>

            <p
                x-show="errors.email"
                x-text="errors.email"
                class="mt-2 text-sm text-red-500">
            </p>

        </div>

        {{-- Pendidikan --}}
        <div>

            <label class="mb-2 block font-semibold text-slate-700">

                Pendidikan Terakhir

            </label>

            <div class="relative">

                <i class="bi bi-mortarboard absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>

                <select
                    x-model="form.education"
                    name="education"
                    class="w-full appearance-none rounded-2xl border bg-white py-4 pl-14 pr-12 outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    :class="errors.education ? 'border-red-500 ring-4 ring-red-100' : 'border-slate-200'">

                    <option value="">Pilih Pendidikan</option>

                    <option value="SD">SD</option>

                    <option value="SMP">SMP</option>

                    <option value="SMA/SMK">SMA / SMK</option>

                    <option value="D3">D3</option>

                    <option value="S1">S1</option>

                </select>

                <i class="bi bi-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>

            </div>

            <p
                x-show="errors.education"
                x-text="errors.education"
                class="mt-2 text-sm text-red-500">
            </p>

        </div>

                {{-- Pekerjaan --}}
        <div>

            <label class="mb-2 block font-semibold text-slate-700">

                Pekerjaan Saat Ini

            </label>

            <div class="relative">

                <i class="bi bi-briefcase-fill absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>

                <input
                    x-model="form.job"
                    type="text"
                    name="job"
                    placeholder="Contoh: Pelajar"
                    class="w-full rounded-2xl border bg-white py-4 pl-14 pr-5 outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    :class="errors.job ? 'border-red-500 ring-4 ring-red-100' : 'border-slate-200'">

            </div>

            <p
                x-show="errors.job"
                x-text="errors.job"
                class="mt-2 text-sm text-red-500">
            </p>

        </div>

       {{-- Alamat --}}
<div class="md:col-span-2">

    <label class="mb-2 block font-semibold text-slate-700">
        Alamat Lengkap
    </label>

    <div class="relative">

        <i class="bi bi-geo-alt-fill absolute left-5 top-6 text-slate-400"></i>

        <textarea
            x-model="form.address"
            name="address"
            rows="5"
            placeholder="Masukkan alamat lengkap sesuai KTP"
            class="w-full rounded-2xl border bg-white py-4 pl-14 pr-5 outline-none transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
            :class="errors.address ? 'border-red-500 ring-4 ring-red-100' : 'border-slate-200'"></textarea>

    </div>

    <p
        x-show="errors.address"
        x-text="errors.address"
        class="mt-2 text-sm text-red-500">
    </p>

</div>

{{-- TUTUP GRID --}}
</div>

{{-- Navigation --}}
<div class="mt-12 flex items-center justify-between border-t border-slate-200 pt-8">

    <button
        type="button"
        @click="step = 1"
        class="inline-flex items-center gap-2 rounded-2xl border border-slate-300 bg-white px-7 py-3 font-semibold text-slate-700 transition duration-300 hover:-translate-y-0.5 hover:border-blue-500 hover:text-blue-600 hover:shadow-md">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </button>

    <button
        type="button"
        @click="validateStep2()"
        class="group flex items-center gap-3 rounded-2xl bg-[#2E3192] px-8 py-4 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-900">

        Lanjut ke Upload Dokumen

        <i class="bi bi-arrow-right"></i>

    </button>

</div>

{{-- TUTUP STEP 2 --}}
</div>