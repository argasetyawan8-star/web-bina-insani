<div
    x-show="step == 2"
    x-transition>

    <div class="flex items-center justify-between">

        <div>

            <h2 class="text-3xl font-bold text-slate-800">
                Biodata Peserta
            </h2>

            <p class="mt-2 text-slate-500">
                Lengkapi data diri sesuai identitas resmi.
            </p>

        </div>

        <span
            class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-semibold">

            STEP 2

        </span>

    </div>

    <div class="grid md:grid-cols-2 gap-6 mt-10">

        {{-- Nama Lengkap --}}
        <div>

            <label class="block mb-2 font-semibold">
                Nama Lengkap
            </label>

            <input
                type="text"
                name="full_name"
                placeholder="Masukkan nama lengkap"
                class="w-full rounded-2xl px-5 py-3 border transition"
                :class="errors.full_name ? 'border-red-500 focus:ring-red-500' : 'border-slate-300 focus:ring-blue-500'">

            <p
                x-show="errors.full_name"
                x-text="errors.full_name"
                class="text-red-500 text-sm mt-2">
            </p>

        </div>

        {{-- NIK --}}
        <div>

            <label class="block mb-2 font-semibold">
                NIK
            </label>

            <input
                type="number"
                name="nik"
                maxlength="16"
                placeholder="16 Digit NIK"
                class="w-full rounded-2xl px-5 py-3 border transition"
                :class="errors.nik ? 'border-red-500 focus:ring-red-500' : 'border-slate-300 focus:ring-blue-500'">

            <p
                x-show="errors.nik"
                x-text="errors.nik"
                class="text-red-500 text-sm mt-2">
            </p>

        </div>

        {{-- Tempat Lahir --}}
        <div>

            <label class="block mb-2 font-semibold">
                Tempat Lahir
            </label>

            <input
                type="text"
                name="birth_place"
                placeholder="Contoh : Ciamis"
                class="w-full rounded-2xl px-5 py-3 border transition"
                :class="errors.birth_place ? 'border-red-500 focus:ring-red-500' : 'border-slate-300 focus:ring-blue-500'">

            <p
                x-show="errors.birth_place"
                x-text="errors.birth_place"
                class="text-red-500 text-sm mt-2">
            </p>

        </div>

        {{-- Tanggal Lahir --}}
        <div>

            <label class="block mb-2 font-semibold">
                Tanggal Lahir
            </label>

            <input
                type="date"
                name="birth_date"
                class="w-full rounded-2xl px-5 py-3 border transition"
                :class="errors.birth_date ? 'border-red-500 focus:ring-red-500' : 'border-slate-300 focus:ring-blue-500'">

            <p
                x-show="errors.birth_date"
                x-text="errors.birth_date"
                class="text-red-500 text-sm mt-2">
            </p>

        </div>

        {{-- Jenis Kelamin --}}
        <div>

            <label class="block mb-2 font-semibold">
                Jenis Kelamin
            </label>

            <select
                name="gender"
                class="w-full rounded-2xl px-5 py-3 border transition"
                :class="errors.gender ? 'border-red-500 focus:ring-red-500' : 'border-slate-300 focus:ring-blue-500'">

                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>

            </select>

            <p
                x-show="errors.gender"
                x-text="errors.gender"
                class="text-red-500 text-sm mt-2">
            </p>

        </div>

        {{-- Nomor HP --}}
        <div>

            <label class="block mb-2 font-semibold">
                Nomor HP
            </label>

            <input
                type="number"
                name="phone"
                placeholder="08xxxxxxxxxx"
                class="w-full rounded-2xl px-5 py-3 border transition"
                :class="errors.phone ? 'border-red-500 focus:ring-red-500' : 'border-slate-300 focus:ring-blue-500'">

            <p
                x-show="errors.phone"
                x-text="errors.phone"
                class="text-red-500 text-sm mt-2">
            </p>

        </div>

                {{-- Email --}}
        <div>

            <label class="block mb-2 font-semibold">
                Email
            </label>

            <input
                type="email"
                name="email"
                placeholder="email@gmail.com"
                class="w-full rounded-2xl px-5 py-3 border transition"
                :class="errors.email ? 'border-red-500 focus:ring-red-500' : 'border-slate-300 focus:ring-blue-500'">

            <p
                x-show="errors.email"
                x-text="errors.email"
                class="text-red-500 text-sm mt-2">
            </p>

        </div>

        {{-- Pendidikan --}}
        <div>

            <label class="block mb-2 font-semibold">
                Pendidikan Terakhir
            </label>

            <select
                name="education"
                class="w-full rounded-2xl px-5 py-3 border transition"
                :class="errors.education ? 'border-red-500 focus:ring-red-500' : 'border-slate-300 focus:ring-blue-500'">

                <option value="">Pilih Pendidikan</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA/SMK">SMA / SMK</option>
                <option value="D3">D3</option>
                <option value="S1">S1</option>

            </select>

            <p
                x-show="errors.education"
                x-text="errors.education"
                class="text-red-500 text-sm mt-2">
            </p>

        </div>

        {{-- Pekerjaan --}}
        <div class="md:col-span-2">

            <label class="block mb-2 font-semibold">
                Pekerjaan Saat Ini
            </label>

            <input
                type="text"
                name="job"
                placeholder="Contoh : Pelajar"
                class="w-full rounded-2xl px-5 py-3 border transition"
                :class="errors.job ? 'border-red-500 focus:ring-red-500' : 'border-slate-300 focus:ring-blue-500'">

            <p
                x-show="errors.job"
                x-text="errors.job"
                class="text-red-500 text-sm mt-2">
            </p>

        </div>

        {{-- Alamat --}}
        <div class="md:col-span-2">

            <label class="block mb-2 font-semibold">
                Alamat Lengkap
            </label>

            <textarea
                name="address"
                rows="5"
                placeholder="Masukkan alamat lengkap"
                class="w-full rounded-2xl px-5 py-3 border transition"
                :class="errors.address ? 'border-red-500 focus:ring-red-500' : 'border-slate-300 focus:ring-blue-500'"></textarea>

            <p
                x-show="errors.address"
                x-text="errors.address"
                class="text-red-500 text-sm mt-2">
            </p>

        </div>

    </div>

    <div class="mt-10 flex justify-between">

        <button
            type="button"
            @click="step = 1"
            class="px-8 py-3 rounded-2xl border border-slate-300 hover:bg-slate-100 transition">

            ← Kembali

        </button>

        <button
            type="button"
            @click="validateStep2()"
            class="px-8 py-3 rounded-2xl bg-blue-600 text-white hover:bg-blue-700 transition">

            Selanjutnya →

        </button>

    </div>

</div>