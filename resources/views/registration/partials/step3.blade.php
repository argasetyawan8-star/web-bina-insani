{{-- STEP 3 : UPLOAD DOCUMENT --}}
<div
    x-show="step == 3"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-8"
    x-transition:enter-end="opacity-100 translate-y-0"
>

    {{-- HEADER --}}
    <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

        <div>
            <span
                class="inline-flex items-center gap-2 rounded-full bg-[#2E3192]/10 px-4 py-2 text-sm font-semibold text-[#2E3192]"
            >
                <i class="bi bi-cloud-arrow-up-fill"></i>
                Upload Dokumen
            </span>

            <h2 class="mt-4 text-3xl font-extrabold leading-tight text-[#1E293B] sm:text-4xl">
                Lengkapi Dokumen Persyaratan
            </h2>

            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base sm:leading-7">
                Upload dokumen resmi yang diperlukan untuk proses verifikasi
                administrasi peserta.
            </p>
        </div>


        {{-- STEP --}}
        <div
            class="flex w-fit items-center gap-3 rounded-2xl border border-[#2E3192]/20 bg-[#2E3192]/5 px-5 py-3 sm:px-6 sm:py-4"
        >
            <div
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#2E3192] text-white sm:h-11 sm:w-11"
            >
                <i class="bi bi-file-earmark-arrow-up-fill text-lg sm:text-xl"></i>
            </div>

            <div>
                <p class="text-xs font-medium text-slate-500">
                    Langkah
                </p>

                <h3 class="text-xl font-extrabold text-[#2E3192] sm:text-2xl">
                    3 / 4
                </h3>
            </div>
        </div>

    </div>


    {{-- DOCUMENT CARDS --}}
    <div class="mt-10 grid gap-6 lg:mt-12 lg:grid-cols-3">


        {{-- ================================================= --}}
        {{-- FOTO PESERTA --}}
        {{-- ================================================= --}}
        <div
            x-data="{
                fileName: '',
                selected: false,
                error: '',

                validateFile(event) {
                    const file = event.target.files[0];

                    this.error = '';
                    this.selected = false;
                    this.fileName = '';

                    if (!file) {
                        return;
                    }

                    const allowedTypes = [
                        'image/jpeg',
                        'image/jpg',
                        'image/png'
                    ];

                    const maxSize = 2 * 1024 * 1024;

                    if (!allowedTypes.includes(file.type)) {
                        this.error = 'Format file harus JPG, JPEG, atau PNG.';
                        event.target.value = '';
                        return;
                    }

                    if (file.size > maxSize) {
                        this.error = 'Ukuran file maksimal 2 MB.';
                        event.target.value = '';
                        return;
                    }

                    this.fileName = file.name;
                    this.selected = true;
                }
            }"
            class="group rounded-[28px] border border-slate-200 bg-white p-5 shadow-sm transition duration-500 hover:-translate-y-1 hover:shadow-xl sm:p-7"
        >

            <div class="flex items-start justify-between gap-4">

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192] transition duration-300 group-hover:scale-110 sm:h-14 sm:w-14"
                >
                    <i class="bi bi-person-bounding-box text-xl sm:text-2xl"></i>
                </div>

                <span
                    class="rounded-full bg-red-50 px-3 py-1 text-[11px] font-bold text-red-500 sm:text-xs"
                >
                    Wajib
                </span>

            </div>


            <h3 class="mt-5 text-lg font-bold text-[#1E293B] sm:mt-6 sm:text-xl">
                Foto Peserta
            </h3>

            <p class="mt-2 min-h-0 text-sm leading-6 text-slate-500 sm:min-h-[48px]">
                Foto terbaru dengan tampilan formal dan jelas.
            </p>


            {{-- UPLOAD --}}
            <label
                class="mt-5 flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed p-5 text-center transition duration-300 sm:mt-6 sm:p-7"
                :class="selected
                    ? 'border-green-400 bg-green-50'
                    : error
                        ? 'border-red-400 bg-red-50'
                        : 'border-slate-300 bg-slate-50 hover:border-[#2E3192] hover:bg-[#2E3192]/5'"
            >

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-white shadow-sm"
                >
                    <i
                        class="text-2xl"
                        :class="selected
                            ? 'bi bi-check-circle-fill text-green-500'
                            : 'bi bi-cloud-arrow-up text-[#2E3192]'"
                    ></i>
                </div>


                {{-- BELUM ADA FILE --}}
                <template x-if="!selected">

                    <div>

                        <span class="mt-4 block font-semibold text-slate-700">
                            Klik untuk upload
                        </span>

                        <span class="mt-1 block text-xs text-slate-400">
                            JPG, JPEG, PNG • Maks. 2 MB
                        </span>

                    </div>

                </template>


                {{-- SUDAH ADA FILE --}}
                <template x-if="selected">

                    <div class="w-full">

                        <span class="mt-4 block text-sm font-bold text-green-600">
                            File berhasil dipilih
                        </span>

                        <span
                            class="mt-2 block truncate rounded-lg bg-white px-3 py-2 text-xs font-medium text-slate-600 shadow-sm"
                            :title="fileName"
                            x-text="fileName"
                        ></span>

                        <span class="mt-2 block text-xs text-slate-400">
                            Klik untuk mengganti file
                        </span>

                    </div>

                </template>


                <input
                    type="file"
                    name="photo"
                    accept="image/jpeg,image/png,image/jpg"
                    class="hidden"
                    @change="validateFile($event)"
                >

            </label>


            {{-- ERROR --}}
            <template x-if="error">

                <p class="mt-3 flex items-start gap-2 text-xs font-medium text-red-500">

                    <i class="bi bi-exclamation-circle-fill mt-0.5 shrink-0"></i>

                    <span x-text="error"></span>

                </p>

            </template>

        </div>



        {{-- ================================================= --}}
        {{-- KTP --}}
        {{-- ================================================= --}}
        <div
            x-data="{
                fileName: '',
                selected: false,
                error: '',

                validateFile(event) {
                    const file = event.target.files[0];

                    this.error = '';
                    this.selected = false;
                    this.fileName = '';

                    if (!file) {
                        return;
                    }

                    const allowedTypes = [
                        'image/jpeg',
                        'image/jpg',
                        'image/png'
                    ];

                    const maxSize = 2 * 1024 * 1024;

                    if (!allowedTypes.includes(file.type)) {
                        this.error = 'Format file harus JPG, JPEG, atau PNG.';
                        event.target.value = '';
                        return;
                    }

                    if (file.size > maxSize) {
                        this.error = 'Ukuran file maksimal 2 MB.';
                        event.target.value = '';
                        return;
                    }

                    this.fileName = file.name;
                    this.selected = true;
                }
            }"
            class="group rounded-[28px] border border-slate-200 bg-white p-5 shadow-sm transition duration-500 hover:-translate-y-1 hover:shadow-xl sm:p-7"
        >

            <div class="flex items-start justify-between gap-4">

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#ED1C24]/10 text-[#ED1C24] transition duration-300 group-hover:scale-110 sm:h-14 sm:w-14"
                >
                    <i class="bi bi-card-heading text-xl sm:text-2xl"></i>
                </div>

                <span
                    class="rounded-full bg-red-50 px-3 py-1 text-[11px] font-bold text-red-500 sm:text-xs"
                >
                    Wajib
                </span>

            </div>


            <h3 class="mt-5 text-lg font-bold text-[#1E293B] sm:mt-6 sm:text-xl">
                KTP
            </h3>

            <p class="mt-2 min-h-0 text-sm leading-6 text-slate-500 sm:min-h-[48px]">
                Scan atau foto KTP yang masih berlaku dan dapat terbaca.
            </p>


            {{-- UPLOAD --}}
            <label
                class="mt-5 flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed p-5 text-center transition duration-300 sm:mt-6 sm:p-7"
                :class="selected
                    ? 'border-green-400 bg-green-50'
                    : error
                        ? 'border-red-400 bg-red-50'
                        : 'border-slate-300 bg-slate-50 hover:border-[#ED1C24] hover:bg-[#ED1C24]/5'"
            >

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-white shadow-sm"
                >
                    <i
                        class="text-2xl"
                        :class="selected
                            ? 'bi bi-check-circle-fill text-green-500'
                            : 'bi bi-cloud-arrow-up text-[#ED1C24]'"
                    ></i>
                </div>


                <template x-if="!selected">

                    <div>

                        <span class="mt-4 block font-semibold text-slate-700">
                            Klik untuk upload
                        </span>

                        <span class="mt-1 block text-xs text-slate-400">
                            JPG, JPEG, PNG • Maks. 2 MB
                        </span>

                    </div>

                </template>


                <template x-if="selected">

                    <div class="w-full">

                        <span class="mt-4 block text-sm font-bold text-green-600">
                            File berhasil dipilih
                        </span>

                        <span
                            class="mt-2 block truncate rounded-lg bg-white px-3 py-2 text-xs font-medium text-slate-600 shadow-sm"
                            :title="fileName"
                            x-text="fileName"
                        ></span>

                        <span class="mt-2 block text-xs text-slate-400">
                            Klik untuk mengganti file
                        </span>

                    </div>

                </template>


                <input
                    type="file"
                    name="ktp"
                    accept="image/jpeg,image/png,image/jpg"
                    class="hidden"
                    @change="validateFile($event)"
                >

            </label>


            <template x-if="error">

                <p class="mt-3 flex items-start gap-2 text-xs font-medium text-red-500">

                    <i class="bi bi-exclamation-circle-fill mt-0.5 shrink-0"></i>

                    <span x-text="error"></span>

                </p>

            </template>

        </div>



        {{-- ================================================= --}}
        {{-- IJAZAH --}}
        {{-- ================================================= --}}
        <div
            x-data="{
                fileName: '',
                selected: false,
                error: '',

                validateFile(event) {
                    const file = event.target.files[0];

                    this.error = '';
                    this.selected = false;
                    this.fileName = '';

                    if (!file) {
                        return;
                    }

                    const allowedTypes = [
                        'application/pdf',
                        'image/jpeg',
                        'image/jpg',
                        'image/png'
                    ];

                    const maxSize = 2 * 1024 * 1024;

                    if (!allowedTypes.includes(file.type)) {
                        this.error = 'Format file harus PDF, JPG, JPEG, atau PNG.';
                        event.target.value = '';
                        return;
                    }

                    if (file.size > maxSize) {
                        this.error = 'Ukuran file maksimal 2 MB.';
                        event.target.value = '';
                        return;
                    }

                    this.fileName = file.name;
                    this.selected = true;
                }
            }"
            class="group rounded-[28px] border border-slate-200 bg-white p-5 shadow-sm transition duration-500 hover:-translate-y-1 hover:shadow-xl sm:p-7"
        >

            <div class="flex items-start justify-between gap-4">

                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#F6D21A]/30 text-[#2E3192] transition duration-300 group-hover:scale-110 sm:h-14 sm:w-14"
                >
                    <i class="bi bi-mortarboard-fill text-xl sm:text-2xl"></i>
                </div>

                <span
                    class="rounded-full bg-red-50 px-3 py-1 text-[11px] font-bold text-red-500 sm:text-xs"
                >
                    Wajib
                </span>

            </div>


            <h3 class="mt-5 text-lg font-bold text-[#1E293B] sm:mt-6 sm:text-xl">
                Ijazah
            </h3>

            <p class="mt-2 min-h-0 text-sm leading-6 text-slate-500 sm:min-h-[48px]">
                Upload ijazah atau dokumen pendidikan terakhir.
            </p>


            {{-- UPLOAD --}}
            <label
                class="mt-5 flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed p-5 text-center transition duration-300 sm:mt-6 sm:p-7"
                :class="selected
                    ? 'border-green-400 bg-green-50'
                    : error
                        ? 'border-red-400 bg-red-50'
                        : 'border-slate-300 bg-slate-50 hover:border-[#2E3192] hover:bg-[#2E3192]/5'"
            >

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-white shadow-sm"
                >
                    <i
                        class="text-2xl"
                        :class="selected
                            ? 'bi bi-check-circle-fill text-green-500'
                            : 'bi bi-cloud-arrow-up text-[#2E3192]'"
                    ></i>
                </div>


                <template x-if="!selected">

                    <div>

                        <span class="mt-4 block font-semibold text-slate-700">
                            Klik untuk upload
                        </span>

                        <span class="mt-1 block text-xs text-slate-400">
                            PDF, JPG, JPEG, PNG • Maks. 2 MB
                        </span>

                    </div>

                </template>


                <template x-if="selected">

                    <div class="w-full">

                        <span class="mt-4 block text-sm font-bold text-green-600">
                            File berhasil dipilih
                        </span>

                        <span
                            class="mt-2 block truncate rounded-lg bg-white px-3 py-2 text-xs font-medium text-slate-600 shadow-sm"
                            :title="fileName"
                            x-text="fileName"
                        ></span>

                        <span class="mt-2 block text-xs text-slate-400">
                            Klik untuk mengganti file
                        </span>

                    </div>

                </template>


                <input
                    type="file"
                    name="ijazah"
                    accept=".pdf,image/jpeg,image/png,image/jpg"
                    class="hidden"
                    @change="validateFile($event)"
                >

            </label>


            <template x-if="error">

                <p class="mt-3 flex items-start gap-2 text-xs font-medium text-red-500">

                    <i class="bi bi-exclamation-circle-fill mt-0.5 shrink-0"></i>

                    <span x-text="error"></span>

                </p>

            </template>

        </div>

    </div>



    {{-- INFORMATION --}}
    <div
        class="mt-8 overflow-hidden rounded-[28px] border border-[#2E3192]/10 bg-[#2E3192]/5 sm:mt-10"
    >

        <div class="flex flex-col gap-4 p-5 sm:flex-row sm:items-start sm:gap-5 sm:p-6">

            <div
                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#2E3192] text-white sm:h-12 sm:w-12"
            >
                <i class="bi bi-info-lg text-xl"></i>
            </div>

            <div class="min-w-0">

                <h4 class="font-bold text-[#2E3192]">
                    Perhatikan sebelum mengunggah dokumen
                </h4>

                <div
                    class="mt-3 grid gap-2 text-sm leading-6 text-slate-600 sm:grid-cols-2"
                >

                    <p class="flex items-start gap-2">
                        <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>
                        <span>Dokumen harus jelas dan terbaca</span>
                    </p>

                    <p class="flex items-start gap-2">
                        <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>
                        <span>Ukuran maksimal 2 MB per file</span>
                    </p>

                    <p class="flex items-start gap-2">
                        <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>
                        <span>Foto & KTP: JPG, JPEG, atau PNG</span>
                    </p>

                    <p class="flex items-start gap-2">
                        <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>
                        <span>Ijazah: PDF, JPG, JPEG, atau PNG</span>
                    </p>

                </div>

            </div>

        </div>

    </div>



    {{-- NAVIGATION --}}
    <div
        class="mt-10 flex flex-col-reverse gap-3 border-t border-slate-200 pt-7 sm:mt-12 sm:flex-row sm:items-center sm:justify-between sm:gap-4 sm:pt-8"
    >

        <button
            type="button"
            @click="step = 2"
            class="inline-flex w-full items-center justify-center gap-2 rounded-2xl border border-slate-300 bg-white px-7 py-3.5 font-semibold text-slate-700 transition duration-300 hover:-translate-y-0.5 hover:border-[#2E3192] hover:text-[#2E3192] hover:shadow-md sm:w-auto"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali
        </button>


        {{-- REVIEW BUTTON --}}
        <button
            type="button"
            @click="
                const inputs = $el.closest('[x-show]').querySelectorAll('input[type=file]');
                let valid = true;

                inputs.forEach(input => {
                    if (!input.files.length) {
                        valid = false;
                        input.dispatchEvent(new Event('change', { bubbles: true }));
                    }
                });

                if (valid) {
                    step = 4;
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            "
            class="group inline-flex w-full items-center justify-center gap-3 rounded-2xl bg-[#2E3192] px-8 py-4 font-bold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-blue-900 hover:shadow-xl sm:w-auto"
        >
            Review Data

            <i
                class="bi bi-arrow-right transition duration-300 group-hover:translate-x-1"
            ></i>
        </button>

    </div>

</div>