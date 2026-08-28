@extends('layouts.landing')

@section('content')

{{-- =========================================================
    REGISTRATION WIZARD
========================================================= --}}

<div
    x-data="registrationWizard()"
    class="relative min-h-screen overflow-hidden bg-slate-50 py-20"
>

    {{-- =====================================================
        BACKGROUND
    ====================================================== --}}
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">

        <div
            class="absolute -left-32 -top-40 h-96 w-96 rounded-full bg-blue-300/20 blur-3xl"
        ></div>

        <div
            class="absolute right-0 top-32 h-[450px] w-[450px] rounded-full bg-orange-300/20 blur-3xl"
        ></div>

        <div
            class="absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-yellow-300/20 blur-3xl"
        ></div>

    </div>


    <div class="mx-auto max-w-7xl px-4 sm:px-6">

        {{-- =====================================================
            HEADER
        ====================================================== --}}
        <div class="text-center">

            <span
                class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-5 py-2 text-sm font-semibold text-blue-700"
            >
                🇰🇷 Pendaftaran Online
            </span>

            <h1
                class="mt-6 text-4xl font-extrabold text-slate-900 sm:text-5xl"
            >
                Formulir Pendaftaran
            </h1>

            <p
                class="mx-auto mt-5 max-w-2xl text-base leading-7 text-slate-500 sm:text-lg"
            >
                Lengkapi seluruh tahapan pendaftaran dengan mudah,
                cepat, dan aman.
            </p>

        </div>


        {{-- =====================================================
            MAIN CARD
        ====================================================== --}}
        <div
            class="mt-12 overflow-hidden rounded-[30px] border border-white/70 bg-white/95 shadow-[0_25px_80px_rgba(0,0,0,.08)] backdrop-blur-xl sm:mt-14 sm:rounded-[36px]"
        >

            {{-- =================================================
                PROGRESS
            ================================================== --}}
            <div
                class="border-b bg-gradient-to-r from-blue-50 via-white to-orange-50 px-4 py-7 sm:px-10 sm:py-10"
            >

                <div class="flex items-center justify-between">

                    @foreach([
                        1 => 'Program',
                        2 => 'Biodata',
                        3 => 'Dokumen',
                        4 => 'Review'
                    ] as $number => $title)

                        <div class="flex flex-1 items-center">

                            {{-- NUMBER --}}
                            <div class="flex flex-col items-center">

                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-full text-sm font-bold shadow transition-all duration-300 sm:h-14 sm:w-14 sm:text-lg"
                                    :class="
                                        step >= {{ $number }}
                                            ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white'
                                            : 'bg-slate-200 text-slate-500'
                                    "
                                >

                                    <template x-if="step > {{ $number }}">
                                        <i class="bi bi-check-lg text-lg sm:text-xl"></i>
                                    </template>

                                    <template x-if="step <= {{ $number }}">
                                        <span>{{ $number }}</span>
                                    </template>

                                </div>

                                <p
                                    class="mt-2 text-[10px] font-semibold sm:mt-3 sm:text-sm"
                                    :class="
                                        step >= {{ $number }}
                                            ? 'text-blue-600'
                                            : 'text-slate-500'
                                    "
                                >
                                    {{ $title }}
                                </p>

                            </div>


                            {{-- LINE --}}
                            @if(!$loop->last)

                                <div
                                    class="mx-1 h-1 flex-1 rounded-full bg-slate-200 sm:mx-4"
                                >

                                    <div
                                        class="h-full rounded-full bg-gradient-to-r from-blue-600 to-orange-500 transition-all duration-500"
                                        :class="
                                            step > {{ $number }}
                                                ? 'w-full'
                                                : 'w-0'
                                        "
                                    ></div>

                                </div>

                            @endif

                        </div>

                    @endforeach

                </div>

            </div>


            {{-- =================================================
                FORM
            ================================================== --}}
            <div class="p-5 sm:p-8 lg:p-14">

                <form
                    id="registrationForm"
                    action="{{ route('registration.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    @submit="prepareSubmit($event)"
                >

                    @csrf


                    {{-- =================================================
                        STEP 1
                    ================================================== --}}
                    <div
                        x-show="step === 1"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 translate-y-8"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0 translate-y-4"
                    >

                        @include('registration.partials.step1')

                    </div>


                    {{-- =================================================
                        STEP 2
                    ================================================== --}}
                    <div
                        x-show="step === 2"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 translate-y-8"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0 translate-y-4"
                    >

                        @include('registration.partials.step2')

                    </div>


                    {{-- =================================================
                        STEP 3 - DOKUMEN
                    ================================================== --}}
                    <div
                        x-show="step === 3"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 translate-y-8"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0 translate-y-4"
                    >

                        {{-- =================================================
                            HEADER STEP 3
                        ================================================== --}}
                        <div
                            class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between"
                        >

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
                                    class="mt-3 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base"
                                >
                                    Upload seluruh dokumen persyaratan
                                    yang dibutuhkan. Anda dapat memilih
                                    file beberapa kali dari folder yang berbeda.
                                </p>

                            </div>


                            {{-- STEP INDICATOR --}}
                            <div
                                class="flex w-fit items-center gap-3 rounded-2xl border border-[#2E3192]/20 bg-[#2E3192]/5 px-5 py-3"
                            >

                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#2E3192] text-white"
                                >
                                    <i class="bi bi-file-earmark-arrow-up-fill text-xl"></i>
                                </div>

                                <div>

                                    <p
                                        class="text-xs font-medium text-slate-500"
                                    >
                                        Langkah
                                    </p>

                                    <h3
                                        class="text-xl font-extrabold text-[#2E3192]"
                                    >
                                        3 / 4
                                    </h3>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            ERROR NOTIFICATION
                        ================================================== --}}
                        <div
                            x-show="uploadError"
                            x-transition
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


                        {{-- =================================================
                            UPLOAD CARD
                        ================================================== --}}
                        <div class="mt-10">

                            <div
                                class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm transition duration-500 hover:shadow-xl"
                            >

                                {{-- CARD HEADER --}}
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
                                                    Dokumen tambahan dapat ditambahkan
                                                    sesuai kebutuhan.
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


                                {{-- UPLOAD AREA --}}
                                <div class="p-5 sm:p-8">

                                    <div class="space-y-4">

                                        {{-- MAIN UPLOAD --}}
                                        <label
                                            class="group flex cursor-pointer flex-col items-center justify-center rounded-[24px] border-2 border-dashed p-7 text-center transition duration-300 sm:p-12"
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


                                            {{-- NO FILE --}}
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
                                                        Pilih beberapa file sekaligus
                                                        atau tambahkan dokumen secara bertahap.
                                                    </span>

                                                    <span
                                                        class="mt-3 block text-xs font-medium text-slate-400"
                                                    >
                                                        JPG, JPEG, PNG, PDF • Maks. 5 MB per file
                                                    </span>

                                                </div>

                                            </template>


                                            {{-- HAS FILE --}}
                                            <template x-if="hasFiles">

                                                <div class="w-full max-w-xl">

                                                    <span
                                                        class="mt-5 block text-lg font-bold text-green-600"
                                                    >
                                                        <i
                                                            class="bi bi-check-circle-fill mr-1"
                                                        ></i>
                                                        Dokumen berhasil dipilih
                                                    </span>

                                                    <p
                                                        class="mt-1 text-sm text-slate-500"
                                                    >
                                                        <span
                                                            x-text="files.length"
                                                        ></span>
                                                        file dipilih
                                                    </p>

                                                    <span
                                                        class="mt-3 block text-xs font-medium text-slate-400"
                                                    >
                                                        Klik area ini untuk menambahkan
                                                        file dari lokasi lain.
                                                    </span>

                                                </div>

                                            </template>


                                            {{-- INPUT UTAMA --}}
                                            <input
                                            x-ref="fileInput"
                                            type="file"
                                            name="documents[]"
                                            multiple
                                            accept="image/*,.jpg,.jpeg,.png,.pdf,application/pdf"
                                            class="hidden"
                                            @change="handleFiles($event)"
                                        >

                                        </label>


                                        {{-- =================================================
                                            ADD MORE
                                        ================================================== --}}
                                        <label
                                            class="flex cursor-pointer items-center justify-center gap-2 rounded-2xl border border-[#2E3192]/20 bg-[#2E3192]/5 px-5 py-3.5 text-sm font-bold text-[#2E3192] transition duration-300 hover:-translate-y-0.5 hover:bg-[#2E3192]/10 hover:shadow-md"
                                        >

                                            <i
                                                class="bi bi-plus-circle-fill text-lg"
                                            ></i>

                                            <span>
                                                Tambah Dokumen Lain
                                            </span>

                                            <input
                                                type="file"
                                                multiple
                                                accept="image/*,.jpg,.jpeg,.png,.pdf,application/pdf"
                                                class="hidden"
                                                @change="handleFiles($event)"
                                            >

                                        </label>


                                        {{-- =================================================
                                            FILE LIST
                                        ================================================== --}}
                                        <template x-if="hasFiles">

                                            <div class="mt-6">

                                                <div
                                                    class="mb-3 flex items-center justify-between gap-3"
                                                >

                                                    <div>

                                                        <h4
                                                            class="font-bold text-[#1E293B]"
                                                        >
                                                            File yang dipilih
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
                                                        class="text-xs font-semibold text-red-500 transition hover:text-red-700"
                                                    >
                                                        Hapus semua
                                                    </button>

                                                </div>


                                                <div class="space-y-3">

                                                    <template
                                                        x-for="(file, index) in files"
                                                        :key="`${file.name}-${file.size}-${file.lastModified}-${index}`"
                                                    >

                                                        <div
                                                            class="flex min-w-0 items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 p-3 transition hover:border-[#2E3192]/30 hover:bg-[#2E3192]/5 sm:p-4"
                                                        >

                                                            {{-- FILE ICON --}}
                                                            <div
                                                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-[#2E3192] shadow-sm"
                                                            >

                                                                <i
                                                                    class="text-lg"
                                                                    :class="
                                                                        file.type === 'application/pdf' ||
                                                                        file.name.toLowerCase().endsWith('.pdf')
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
                                                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-green-50"
                                                            >

                                                                <i
                                                                    class="bi bi-check-lg text-green-500"
                                                                ></i>

                                                            </div>


                                                            {{-- REMOVE --}}
                                                            <button
                                                                type="button"
                                                                @click="removeFile(index)"
                                                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl text-slate-400 transition hover:bg-red-50 hover:text-red-500"
                                                                title="Hapus file"
                                                            >

                                                                <i
                                                                    class="bi bi-trash3-fill"
                                                                ></i>

                                                            </button>

                                                        </div>

                                                    </template>

                                                </div>

                                            </div>

                                        </template>


                                        {{-- FILE ERROR --}}
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

                        </div>


                        {{-- =================================================
                            INFORMATION
                        ================================================== --}}
                        <div
                            class="mt-8 overflow-hidden rounded-[28px] border border-[#2E3192]/10 bg-[#2E3192]/5"
                        >

                            <div
                                class="flex flex-col gap-5 p-5 sm:flex-row sm:p-6"
                            >

                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#2E3192] text-white"
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
                                            <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>
                                            <span>KTP dan ijazah merupakan dokumen wajib.</span>
                                        </p>

                                        <p class="flex items-start gap-2">
                                            <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>
                                            <span>Dapat memilih beberapa file sekaligus.</span>
                                        </p>

                                        <p class="flex items-start gap-2">
                                            <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>
                                            <span>File dapat ditambahkan dari folder berbeda.</span>
                                        </p>

                                        <p class="flex items-start gap-2">
                                            <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>
                                            <span>Format JPG, JPEG, PNG, atau PDF.</span>
                                        </p>

                                        <p class="flex items-start gap-2">
                                            <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>
                                            <span>Ukuran maksimal 5 MB per file.</span>
                                        </p>

                                        <p class="flex items-start gap-2 sm:col-span-2">
                                            <i class="bi bi-check-circle-fill mt-1 shrink-0 text-green-500"></i>

                                            <span>
                                                Semua dokumen akan disimpan sebagai
                                                dokumen milik pendaftaran peserta.
                                            </span>
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            NAVIGATION
                        ================================================== --}}
                        <div
                            class="mt-10 flex flex-col-reverse gap-3 border-t border-slate-200 pt-7 sm:flex-row sm:items-center sm:justify-between"
                        >

                            {{-- BACK --}}
                            <button
                                type="button"
                                @click="goToStep(2)"
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


                    {{-- =================================================
                        STEP 4
                    ================================================== --}}
                    <div
                        x-show="step === 4"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 translate-y-8"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0 translate-y-4"
                    >

                        @include('registration.partials.step4')

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


{{-- =============================================================
    ALPINE JS
============================================================= --}}
<script>
    function registrationWizard() {
        return {
            /* =====================================================
             * STEP
             * ===================================================== */
            step: 1,

            /* =====================================================
             * ERROR
             * ===================================================== */
            errors: {},
            uploadError: '',
            error: '',

            /* =====================================================
             * FILE
             * ===================================================== */
            files: [],

            maxSize: 5 * 1024 * 1024,

            allowedTypes: [
                'image/jpeg',
                'image/png',
                'image/jpg',
                'application/pdf'
            ],

            allowedExtensions: [
                'jpg',
                'jpeg',
                'png',
                'pdf'
            ],

            /* =====================================================
             * FORM
             * ===================================================== */
            form: {
                full_name: '',
                nik: '',
                birth_place: '',
                birth_date: '',
                gender: '',
                phone: '',
                email: '',
                education: '',
                job: '',
                address: ''
            },

            /* =====================================================
             * AGREEMENT
             * ===================================================== */
            agreement: false,

            /* =====================================================
             * SUBMIT STATE
             * ===================================================== */
            submitting: false,

            /* =====================================================
             * HANDLE FILES
             *
             * File langsung dibaca saat dipilih.
             * Ini penting untuk file dari Google Drive Android.
             * ===================================================== */
            async handleFiles(event) {

                this.error = '';
                this.uploadError = '';

                const input = event?.target;

                if (!input || !input.files) {
                    return;
                }

                const selectedFiles =
                    Array.from(input.files);

                if (!selectedFiles.length) {
                    return;
                }

                const validFiles = [];

                try {

                    /* =================================================
                     * PROSES SATU PER SATU
                     * ================================================= */
                    for (const originalFile of selectedFiles) {

                        if (
                            !originalFile ||
                            !originalFile.name
                        ) {

                            this.error =
                                'File tidak dapat diakses. Silakan pilih file kembali.';

                            continue;
                        }

                        /* =============================================
                         * EKSTENSI
                         * ============================================= */
                        const extension =
                            originalFile.name
                                .split('.')
                                .pop()
                                .toLowerCase();

                        /* =============================================
                         * VALIDASI MIME
                         * ============================================= */
                        const validMime =
                            this.allowedTypes.includes(
                                originalFile.type
                            );

                        /* =============================================
                         * VALIDASI EXTENSION
                         * ============================================= */
                        const validExtension =
                            this.allowedExtensions.includes(
                                extension
                            );

                        /*
                         * Google Drive / Android kadang memberikan
                         * MIME type kosong atau berbeda.
                         */
                        if (
                            !validMime &&
                            !validExtension
                        ) {

                            this.error =
                                `File "${originalFile.name}" tidak didukung. Gunakan JPG, JPEG, PNG, atau PDF.`;

                            continue;
                        }

                        /* =============================================
                         * VALIDASI UKURAN
                         * ============================================= */
                        if (
                            typeof originalFile.size === 'number' &&
                            originalFile.size > this.maxSize
                        ) {

                            this.error =
                                `Ukuran file "${originalFile.name}" melebihi 5 MB.`;

                            continue;
                        }

                        /*
                         * Jangan izinkan file benar-benar kosong.
                         *
                         * Kalau Google Drive memberikan file dengan
                         * size 0, kita coba baca terlebih dahulu.
                         */
                        let fileBuffer;

                        try {

                            fileBuffer =
                                await originalFile.arrayBuffer();

                        } catch (readError) {

                            console.error(
                                'Gagal membaca file:',
                                readError
                            );

                            this.error =
                                `File "${originalFile.name}" tidak dapat dibaca dari perangkat. Silakan download file tersebut terlebih dahulu lalu pilih kembali.`;

                            continue;
                        }

                        /* =============================================
                         * CEK HASIL PEMBACAAN
                         * ============================================= */
                        if (
                            !fileBuffer ||
                            fileBuffer.byteLength === 0
                        ) {

                            this.error =
                                `File "${originalFile.name}" tidak dapat dibaca atau kosong.`;

                            continue;
                        }

                        /* =============================================
                         * BUAT FILE BARU
                         * ============================================= */
                        const safeMime =
                            originalFile.type ||
                            (
                                extension === 'pdf'
                                    ? 'application/pdf'
                                    : extension === 'png'
                                        ? 'image/png'
                                        : 'image/jpeg'
                            );

                        const safeFile =
                            new File(
                                [fileBuffer],
                                originalFile.name,
                                {
                                    type: safeMime,
                                    lastModified:
                                        originalFile.lastModified ||
                                        Date.now()
                                }
                            );

                        /* =============================================
                         * VALIDASI SIZE HASIL
                         * ============================================= */
                        if (
                            safeFile.size === 0
                        ) {

                            this.error =
                                `File "${originalFile.name}" tidak dapat diproses.`;

                            continue;
                        }

                        if (
                            safeFile.size > this.maxSize
                        ) {

                            this.error =
                                `Ukuran file "${originalFile.name}" melebihi 5 MB.`;

                            continue;
                        }

                        /* =============================================
                         * CEK DUPLIKAT
                         * ============================================= */
                        const alreadyExists =
                            this.files.some(
                                existingFile =>
                                    existingFile.name ===
                                        safeFile.name &&
                                    existingFile.size ===
                                        safeFile.size
                            );

                        if (!alreadyExists) {

                            validFiles.push(
                                safeFile
                            );
                        }
                    }

                    /* =================================================
                     * GABUNGKAN FILE
                     * ================================================= */
                    this.files = [
                        ...this.files,
                        ...validFiles
                    ];

                } catch (error) {

                    console.error(
                        'Error saat memproses dokumen:',
                        error
                    );

                    this.error =
                        'Terjadi kesalahan saat membaca dokumen. Silakan pilih file kembali.';

                } finally {

                    /*
                     * Sekarang aman mengosongkan input.
                     *
                     * Karena file sudah dibuat ulang melalui
                     * ArrayBuffer dan disimpan di this.files.
                     */
                    input.value = '';
                }
            },

            /* =====================================================
             * REMOVE FILE
             * ===================================================== */
            removeFile(index) {

                if (
                    index < 0 ||
                    index >= this.files.length
                ) {
                    return;
                }

                this.files.splice(
                    index,
                    1
                );

                this.error = '';
                this.uploadError = '';
            },

            /* =====================================================
             * CLEAR FILES
             * ===================================================== */
            clearFiles() {

                this.files = [];

                this.error = '';
                this.uploadError = '';
            },

            /* =====================================================
             * FORMAT SIZE
             * ===================================================== */
            formatSize(bytes) {

                if (!bytes || bytes < 1024) {
                    return `${bytes || 0} B`;
                }

                if (
                    bytes <
                    1024 * 1024
                ) {

                    return `${(
                        bytes / 1024
                    ).toFixed(1)} KB`;
                }

                return `${(
                    bytes /
                    (
                        1024 *
                        1024
                    )
                ).toFixed(1)} MB`;
            },

            /* =====================================================
             * HAS FILES
             * ===================================================== */
            get hasFiles() {
                return this.files.length > 0;
            },

            /* =====================================================
             * GO TO STEP
             * ===================================================== */
            goToStep(step) {

                this.step = step;

                this.errors = {};
                this.uploadError = '';
                this.error = '';

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            },

            /* =====================================================
             * VALIDATE STEP 2
             * ===================================================== */
            validateStep2() {

                this.errors = {};

                const form =
                    document.getElementById(
                        'registrationForm'
                    );

                if (!form) {
                    return;
                }

                if (
                    !form.full_name ||
                    form.full_name.value.trim() === ''
                ) {

                    this.errors.full_name =
                        'Nama lengkap wajib diisi.';
                }

                if (
                    !form.nik ||
                    form.nik.value.trim() === ''
                ) {

                    this.errors.nik =
                        'NIK wajib diisi.';
                }

                if (
                    !form.birth_place ||
                    form.birth_place.value.trim() === ''
                ) {

                    this.errors.birth_place =
                        'Tempat lahir wajib diisi.';
                }

                if (
                    !form.birth_date ||
                    form.birth_date.value === ''
                ) {

                    this.errors.birth_date =
                        'Tanggal lahir wajib diisi.';
                }

                if (
                    !form.gender ||
                    form.gender.value === ''
                ) {

                    this.errors.gender =
                        'Jenis kelamin wajib dipilih.';
                }

                if (
                    !form.phone ||
                    form.phone.value.trim() === ''
                ) {

                    this.errors.phone =
                        'Nomor WhatsApp wajib diisi.';
                }

                if (
                    !form.email ||
                    form.email.value.trim() === ''
                ) {

                    this.errors.email =
                        'Email wajib diisi.';
                }

                if (
                    !form.education ||
                    form.education.value === ''
                ) {

                    this.errors.education =
                        'Pendidikan wajib dipilih.';
                }

                if (
                    !form.job ||
                    form.job.value.trim() === ''
                ) {

                    this.errors.job =
                        'Pekerjaan wajib diisi.';
                }

                if (
                    !form.address ||
                    form.address.value.trim() === ''
                ) {

                    this.errors.address =
                        'Alamat wajib diisi.';
                }

                if (
                    Object.keys(this.errors).length === 0
                ) {

                    this.goToStep(3);
                }
            },

            /* =====================================================
             * VALIDATE STEP 3
             * ===================================================== */
            validateStep3() {

                this.errors = {};
                this.uploadError = '';

                if (
                    !this.files ||
                    this.files.length === 0
                ) {

                    this.uploadError =
                        'Belum ada dokumen yang dipilih. Silakan upload dokumen terlebih dahulu.';

                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });

                    return;
                }

                if (
                    this.files.length < 2
                ) {

                    this.uploadError =
                        'Minimal upload 2 dokumen, yaitu KTP dan ijazah.';

                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });

                    return;
                }

                this.goToStep(4);
            },

            /* =====================================================
             * PREPARE SUBMIT
             * ===================================================== */
            async prepareSubmit(event) {

                event.preventDefault();

                if (this.submitting) {
                    return;
                }

                this.errors = {};
                this.uploadError = '';

                /* =================================================
                 * CEK FILE
                 * ================================================= */
                if (
                    !this.files ||
                    this.files.length === 0
                ) {

                    this.uploadError =
                        'Dokumen pendaftaran belum dipilih.';

                    this.step = 3;

                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });

                    return;
                }

                /* =================================================
                 * MINIMAL 2 FILE
                 * ================================================= */
                if (
                    this.files.length < 2
                ) {

                    this.uploadError =
                        'Minimal upload 2 dokumen, yaitu KTP dan ijazah.';

                    this.step = 3;

                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });

                    return;
                }

                /* =================================================
                 * FORM
                 * ================================================= */
                const form =
                    document.getElementById(
                        'registrationForm'
                    );

                if (!form) {

                    this.uploadError =
                        'Form pendaftaran tidak ditemukan.';

                    return;
                }

                this.submitting = true;

                try {

                    /* =================================================
                     * FORM DATA
                     * ================================================= */
                    const formData =
                        new FormData();

                    /*
                     * Ambil seluruh field biasa dari form.
                     */
                    const formElements =
                        form.elements;

                    for (
                        const element
                        of formElements
                    ) {

                        if (
                            !element.name ||
                            element.name === 'documents[]'
                        ) {
                            continue;
                        }

                        /*
                         * Checkbox agreement tidak perlu dikirim
                         * sebagai field pendaftaran.
                         */
                        if (
                            element.type === 'checkbox'
                        ) {
                            continue;
                        }

                        /*
                         * File input tidak digunakan.
                         */
                        if (
                            element.type === 'file'
                        ) {
                            continue;
                        }

                        formData.append(
                            element.name,
                            element.value
                        );
                    }

                    /* =================================================
                     * APPEND DOKUMEN
                     * ================================================= */
                    for (
                        const file
                        of this.files
                    ) {

                        /*
                         * File di this.files sekarang merupakan
                         * File baru yang sudah dibaca ke memory.
                         */
                        formData.append(
                            'documents[]',
                            file,
                            file.name
                        );
                    }

                    /* =================================================
                     * KIRIM KE LARAVEL
                     * ================================================= */
                    const response =
                        await fetch(
                            form.action,
                            {
                                method: 'POST',
                                body: formData,
                                credentials: 'same-origin',

                                headers: {
                                    'X-Requested-With':
                                        'XMLHttpRequest',

                                    'Accept':
                                        'text/html,application/xhtml+xml'
                                }
                            }
                        );

                    /* =================================================
                     * REDIRECT
                     * ================================================= */
                    if (
                        response.redirected &&
                        response.url
                    ) {

                        window.location.href =
                            response.url;

                        return;
                    }

                    /* =================================================
                     * HTTP ERROR
                     * ================================================= */
                    if (!response.ok) {

                        const responseText =
                            await response.text();

                        console.error(
                            'Response server:',
                            responseText
                        );

                        throw new Error(
                            `Server mengembalikan status ${response.status}.`
                        );
                    }

                    /* =================================================
                     * FALLBACK
                     * ================================================= */
                    window.location.reload();

                } catch (error) {

                    console.error(
                        'Gagal mengirim pendaftaran:',
                        error
                    );

                    this.submitting = false;

                    this.uploadError =
                        'Dokumen tidak dapat dikirim. Silakan pilih kembali dokumen Anda.';

                    this.step = 3;

                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            }
        };
    }
</script>


@endsection
