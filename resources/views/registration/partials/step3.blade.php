{{-- ========================================================= --}}
{{-- STEP 3 : UPLOAD DOCUMENT --}}
{{-- ========================================================= --}}

<div
    x-show="step == 3"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-8"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 translate-y-4"
>

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

        <div>

            <span
                class="inline-flex items-center gap-2 rounded-full bg-[#2E3192]/10 px-4 py-2 text-sm font-semibold text-[#2E3192]"
            >
                <i class="bi bi-cloud-arrow-up-fill"></i>
                Upload Dokumen
            </span>

            <h2
                class="mt-4 text-3xl font-extrabold leading-tight text-[#1E293B] sm:text-4xl"
            >
                Lengkapi Dokumen Persyaratan
            </h2>

            <p
                class="mt-3 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base sm:leading-7"
            >
                Upload seluruh dokumen persyaratan Anda.
                Anda dapat menambahkan file dari beberapa folder berbeda.
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

                <h3
                    class="text-xl font-extrabold text-[#2E3192] sm:text-2xl"
                >
                    3 / 4
                </h3>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- NOTIFICATION --}}
    {{-- ========================================================= --}}

    <div
        x-show="uploadError"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-3"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="mt-6 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 sm:p-5"
    >

        <div
            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-500"
        >
            <i class="bi bi-exclamation-circle-fill"></i>
        </div>

        <div class="min-w-0 flex-1">

            <h4 class="font-bold text-red-700">
                Dokumen belum lengkap
            </h4>

            <p
                class="mt-1 text-sm leading-6 text-red-600"
                x-text="uploadError"
            ></p>

        </div>

        <button
            type="button"
            @click="uploadError = ''"
            class="shrink-0 text-red-400 transition hover:text-red-600"
        >
            <i class="bi bi-x-lg"></i>
        </button>

    </div>


    {{-- ========================================================= --}}
    {{-- MAIN CARD --}}
    {{-- ========================================================= --}}

    <div class="mt-10 sm:mt-12">

        <div
            class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm transition duration-500 hover:shadow-xl"
        >

            {{-- ================================================= --}}
            {{-- CARD HEADER --}}
            {{-- ================================================= --}}

            <div
                class="border-b border-slate-100 bg-gradient-to-br from-[#2E3192]/5 via-white to-[#F6D21A]/10 p-6 sm:p-8"
            >

                <div
                    class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between"
                >

                    <div class="flex items-start gap-4">

                        <div
                            class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-[#2E3192] text-white shadow-lg sm:h-16 sm:w-16"
                        >
                            <i class="bi bi-files text-2xl sm:text-3xl"></i>
                        </div>

                        <div>

                            <h3
                                class="text-xl font-extrabold text-[#1E293B] sm:text-2xl"
                            >
                                Dokumen Persyaratan
                            </h3>

                            <p
                                class="mt-1 text-sm leading-6 text-slate-500"
                            >
                                KTP dan ijazah wajib diunggah.
                                Dokumen pendukung dapat ditambahkan jika diperlukan.
                            </p>

                        </div>

                    </div>

                    <span
                        class="w-fit rounded-full bg-red-50 px-4 py-2 text-xs font-bold text-red-500"
                    >
                        Wajib
                    </span>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- UPLOAD SECTION --}}
            {{-- ================================================= --}}

            <div class="p-6 sm:p-8">

                {{-- ================================================= --}}
                {{-- UPLOAD AREA --}}
                {{-- ================================================= --}}

                <label
                    class="group flex cursor-pointer flex-col items-center justify-center rounded-[24px] border-2 border-dashed p-8 text-center transition duration-300 sm:p-12"
                    :class="
                        hasFiles
                            ? 'border-green-400 bg-green-50/70'
                            : error
                                ? 'border-red-400 bg-red-50'
                                : 'border-slate-300 bg-slate-50 hover:border-[#2E3192] hover:bg-[#2E3192]/5'
                    "
                >

                    {{-- ICON --}}

                    <div
                        class="flex h-20 w-20 items-center justify-center rounded-3xl bg-white shadow-md transition duration-300 group-hover:-translate-y-1 group-hover:scale-105"
                    >

                        <i
                            class="text-4xl transition duration-300"
                            :class="
                                hasFiles
                                    ? 'bi bi-check-circle-fill text-green-500'
                                    : error
                                        ? 'bi bi-exclamation-circle-fill text-red-500'
                                        : 'bi bi-cloud-arrow-up-fill text-[#2E3192]'
                            "
                        ></i>

                    </div>


                    {{-- ================================================= --}}
                    {{-- EMPTY STATE --}}
                    {{-- ================================================= --}}

                    <template x-if="!hasFiles">

                        <div>

                            <span
                                class="mt-5 block text-lg font-bold text-slate-700"
                            >
                                Klik untuk memilih dokumen
                            </span>

                            <span
                                class="mt-2 block text-sm leading-6 text-slate-500"
                            >
                                Anda bisa memilih file dari folder berbeda.
                            </span>

                            <span
                                class="mt-3 block text-xs font-medium text-slate-400"
                            >
                                JPG, JPEG, PNG, PDF • Maks. 5 MB per file
                            </span>

                        </div>

                    </template>


                    {{-- ================================================= --}}
                    {{-- HAS FILES --}}
                    {{-- ================================================= --}}

                    <template x-if="hasFiles">

                        <div class="w-full max-w-xl">

                            <span
                                class="mt-5 block text-lg font-bold text-green-600"
                            >
                                <i class="bi bi-check-circle-fill mr-1"></i>
                                Dokumen berhasil dipilih
                            </span>

                            <p
                                class="mt-1 text-sm text-slate-500"
                            >
                                <span x-text="files.length"></span>
                                file dipilih
                            </p>

                            <span
                                class="mt-3 block text-xs font-medium text-slate-400"
                            >
                                Gunakan tombol "Tambah Dokumen" untuk mengambil file dari folder lain.
                            </span>

                        </div>

                    </template>


                    {{-- ================================================= --}}
                    {{-- FILE INPUT --}}
                    {{-- ================================================= --}}

                   <input
                        x-ref="fileInput"
                        type="file"
                        name="documents[]"
                        multiple
                        accept=".jpg,.jpeg,.png,.pdf,image/jpeg,image/png,application/pdf"
                        class="hidden"
                        @change="handleFiles($event)"
                    >

                </label>


                {{-- ================================================= --}}
                {{-- ADD FILE BUTTON --}}
                {{-- ================================================= --}}

                <div class="mt-5 flex justify-center">

                    <button
                        type="button"
                        @click="$refs.fileInput.click()"
                        class="inline-flex items-center justify-center gap-2 rounded-2xl border border-[#2E3192]/20 bg-[#2E3192]/5 px-6 py-3 text-sm font-bold text-[#2E3192] transition duration-300 hover:-translate-y-0.5 hover:bg-[#2E3192] hover:text-white hover:shadow-md"
                    >

                        <i class="bi bi-plus-circle-fill"></i>

                        <span x-show="!hasFiles">
                            Pilih Dokumen
                        </span>

                        <span x-show="hasFiles">
                            Tambah Dokumen
                        </span>

                    </button>

                </div>


                {{-- ================================================= --}}
                {{-- FILE LIST --}}
                {{-- ================================================= --}}

                <template x-if="hasFiles">

                    <div class="mt-8">

                        <div
                            class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
                        >

                            <div>

                                <h4
                                    class="font-bold text-[#1E293B]"
                                >
                                    File yang Dipilih
                                </h4>

                                <p
                                    class="mt-1 text-xs text-slate-400"
                                >
                                    Pastikan KTP dan ijazah sudah termasuk.
                                </p>

                            </div>


                            <button
                                type="button"
                                @click="clearFiles()"
                                class="w-fit text-xs font-semibold text-red-500 transition hover:text-red-700"
                            >
                                <i class="bi bi-trash3 mr-1"></i>
                                Hapus semua
                            </button>

                        </div>


                        <div class="space-y-3">

                            <template
                                x-for="(file, index) in files"
                                :key="index"
                            >

                                <div
                                    class="flex min-w-0 items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 p-3 transition hover:border-[#2E3192]/30 hover:bg-[#2E3192]/5 sm:p-4"
                                >

                                    {{-- FILE ICON --}}

                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white shadow-sm"
                                    >

                                        <i
                                            class="text-lg"
                                            :class="
                                                file.type === 'application/pdf'
                                                    ? 'bi bi-file-earmark-pdf-fill text-red-500'
                                                    : 'bi bi-file-earmark-image-fill text-[#2E3192]'
                                            "
                                        ></i>

                                    </div>


                                    {{-- FILE INFO --}}

                                    <div class="min-w-0 flex-1">

                                        <p
                                            class="truncate text-sm font-bold text-slate-700"
                                            :title="file.name"
                                            x-text="file.name"
                                        ></p>

                                        <p
                                            class="mt-1 text-xs text-slate-400"
                                            x-text="formatSize(file.size)"
                                        ></p>

                                    </div>


                                    {{-- STATUS --}}

                                    <div
                                        class="hidden h-8 w-8 shrink-0 items-center justify-center rounded-full bg-green-50 sm:flex"
                                    >

                                        <i class="bi bi-check-lg text-green-500"></i>

                                    </div>


                                    {{-- REMOVE --}}

                                    <button
                                        type="button"
                                        @click="removeFile(index)"
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl text-slate-400 transition hover:bg-red-50 hover:text-red-500"
                                        title="Hapus file"
                                    >

                                        <i class="bi bi-trash3-fill"></i>

                                    </button>

                                </div>

                            </template>

                        </div>

                    </div>

                </template>


                {{-- ================================================= --}}
                {{-- ERROR --}}
                {{-- ================================================= --}}

                <template x-if="error">

                    <div
                        class="mt-5 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4"
                    >

                        <i
                            class="bi bi-exclamation-circle-fill mt-0.5 shrink-0 text-red-500"
                        ></i>

                        <p
                            class="text-sm font-medium leading-6 text-red-600"
                            x-text="error"
                        ></p>

                    </div>

                </template>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- INFORMATION --}}
    {{-- ========================================================= --}}

    <div
        class="mt-8 overflow-hidden rounded-[28px] border border-[#2E3192]/10 bg-[#2E3192]/5 sm:mt-10"
    >

        <div
            class="flex flex-col gap-5 p-5 sm:flex-row sm:items-start sm:gap-5 sm:p-6"
        >

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
                    class="mt-3 grid gap-3 text-sm leading-6 text-slate-600 sm:grid-cols-2"
                >

                    <p class="flex items-start gap-2">

                        <i
                            class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"
                        ></i>

                        <span>
                            KTP dan ijazah merupakan dokumen wajib.
                        </span>

                    </p>


                    <p class="flex items-start gap-2">

                        <i
                            class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"
                        ></i>

                        <span>
                            Dapat menambahkan beberapa dokumen sekaligus.
                        </span>

                    </p>


                    <p class="flex items-start gap-2">

                        <i
                            class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"
                        ></i>

                        <span>
                            File dapat dipilih dari folder yang berbeda.
                        </span>

                    </p>


                    <p class="flex items-start gap-2">

                        <i
                            class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"
                        ></i>

                        <span>
                            Format JPG, JPEG, PNG, atau PDF.
                        </span>

                    </p>


                    <p class="flex items-start gap-2">

                        <i
                            class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"
                        ></i>

                        <span>
                            Ukuran maksimal 5 MB per file.
                        </span>

                    </p>


                    <p class="flex items-start gap-2">

                        <i
                            class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"
                        ></i>

                        <span>
                            Dokumen akan tersimpan sebagai dokumen pendaftaran peserta.
                        </span>

                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- NAVIGATION --}}
    {{-- ========================================================= --}}

    <div
        class="mt-10 flex flex-col-reverse gap-3 border-t border-slate-200 pt-7 sm:mt-12 sm:flex-row sm:items-center sm:justify-between sm:gap-4 sm:pt-8"
    >

        {{-- BACK --}}

        <button
            type="button"
            @click="
                step = 2;

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            "
            class="inline-flex w-full items-center justify-center gap-2 rounded-2xl border border-slate-300 bg-white px-7 py-3.5 font-semibold text-slate-700 transition duration-300 hover:-translate-y-0.5 hover:border-[#2E3192] hover:text-[#2E3192] hover:shadow-md sm:w-auto"
        >

            <i class="bi bi-arrow-left"></i>

            Kembali

        </button>


        {{-- REVIEW --}}

        <button
            type="button"
            @click="validateStep3()"
            class="group inline-flex w-full items-center justify-center gap-3 rounded-2xl bg-[#2E3192] px-8 py-4 font-bold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-blue-900 hover:shadow-xl sm:w-auto"
        >

            Review Data

            <i
                class="bi bi-arrow-right transition duration-300 group-hover:translate-x-1"
            ></i>

        </button>

    </div>

</div>