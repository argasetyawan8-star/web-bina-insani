@extends('layouts.landing')

@section('content')

<div
    x-data="{

        step: 1,

        errors: {},

        form:{

            full_name:'',
            nik:'',
            birth_place:'',
            birth_date:'',
            gender:'',
            phone:'',
            email:'',
            education:'',
            job:'',
            address:''

        },

        validateStep2(){

            this.errors = {};

            const form = document.getElementById('registrationForm');

            if(form.full_name.value.trim() === ''){
                this.errors.full_name = 'Nama lengkap wajib diisi.';
            }

            if(form.nik.value.trim() === ''){
                this.errors.nik = 'NIK wajib diisi.';
            }

            if(form.birth_place.value.trim() === ''){
                this.errors.birth_place = 'Tempat lahir wajib diisi.';
            }

            if(form.birth_date.value === ''){
                this.errors.birth_date = 'Tanggal lahir wajib diisi.';
            }

            if(form.gender.value === ''){
                this.errors.gender = 'Jenis kelamin wajib dipilih.';
            }

            if(form.phone.value.trim() === ''){
                this.errors.phone = 'Nomor WhatsApp wajib diisi.';
            }

            if(form.email.value.trim() === ''){
                this.errors.email = 'Email wajib diisi.';
            }

            if(form.education.value === ''){
                this.errors.education = 'Pendidikan wajib dipilih.';
            }

            if(form.job.value.trim() === ''){
                this.errors.job = 'Pekerjaan wajib diisi.';
            }

            if(form.address.value.trim() === ''){
                this.errors.address = 'Alamat wajib diisi.';
            }

            if(Object.keys(this.errors).length === 0){

                this.step = 3;

            }

        },

        validateStep3(){

            this.errors = {};

            const form = document.getElementById('registrationForm');

            if(form.photo.files.length === 0){
                this.errors.photo = 'Pas foto wajib diupload.';
            }

            if(form.ktp.files.length === 0){
                this.errors.ktp = 'KTP wajib diupload.';
            }

            if(form.ijazah.files.length === 0){
                this.errors.ijazah = 'Ijazah wajib diupload.';
            }

            if(Object.keys(this.errors).length === 0){

                this.step = 4;

            }

        }

    }"

    class="relative min-h-screen overflow-hidden bg-slate-50 py-20">

    {{-- Background --}}
    <div class="absolute inset-0 -z-10">

        <div class="absolute -top-40 -left-32 h-96 w-96 rounded-full bg-blue-300/20 blur-3xl"></div>

        <div class="absolute top-32 right-0 h-[450px] w-[450px] rounded-full bg-orange-300/20 blur-3xl"></div>

        <div class="absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-yellow-300/20 blur-3xl"></div>

    </div>

    <div class="mx-auto max-w-7xl px-6">

        {{-- Header --}}
        <div class="text-center">

            <span
                class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-5 py-2 text-sm font-semibold text-blue-700">

                🇰🇷 Pendaftaran Online

            </span>

            <h1
                class="mt-6 text-5xl font-extrabold text-slate-900">

                Formulir Pendaftaran

            </h1>

            <p
                class="mx-auto mt-5 max-w-2xl text-lg text-slate-500">

                Lengkapi seluruh tahapan pendaftaran hingga pembayaran dengan mudah, cepat, dan aman.

            </p>

        </div>

        {{-- Card --}}
        <div
            class="mt-14 overflow-hidden rounded-[36px] border border-white/70 bg-white/90 shadow-[0_25px_80px_rgba(0,0,0,.08)] backdrop-blur-xl">

            {{-- Progress --}}
            <div
                class="border-b bg-gradient-to-r from-blue-50 via-white to-orange-50 px-10 py-10">

                <div class="flex items-center justify-between">

                    @foreach([
                        1=>'Program',
                        2=>'Biodata',
                        3=>'Dokumen',
                        4=>'Review'
                    ] as $number=>$title)

                        <div class="flex flex-1 items-center">

                            <div class="flex flex-col items-center">

                                <div

                                    class="flex h-14 w-14 items-center justify-center rounded-full text-lg font-bold shadow transition-all duration-300"

                                    :class="step >= {{ $number }}

                                        ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white'

                                        : 'bg-slate-200 text-slate-500'">

                                    <template x-if="step > {{ $number }}">

                                        <i class="bi bi-check-lg text-xl"></i>

                                    </template>

                                    <template x-if="step <= {{ $number }}">

                                        <span>{{ $number }}</span>

                                    </template>

                                </div>

                                <p

                                    class="mt-3 text-sm font-semibold"

                                    :class="step >= {{ $number }}

                                        ? 'text-blue-600'

                                        : 'text-slate-500'">

                                    {{ $title }}

                                </p>

                            </div>

                            @if(!$loop->last)

                                <div class="mx-4 h-1 flex-1 rounded-full bg-slate-200">

                                    <div

                                        class="h-full rounded-full bg-gradient-to-r from-blue-600 to-orange-500 transition-all duration-500"

                                        :class="step > {{ $number }}

                                            ? 'w-full'

                                            : 'w-0'">

                                    </div>

                                </div>

                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

                        {{-- Form --}}
            <div class="p-8 lg:p-14">

                <form
                    id="registrationForm"
                    action="{{ route('registration.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    {{-- STEP 1 --}}
                    @include('registration.partials.step1')

                    {{-- STEP 2 --}}
                    @include('registration.partials.step2')

                    {{-- STEP 3 --}}
                    @include('registration.partials.step3')

                    {{-- STEP 4 --}}
                    @include('registration.partials.step4')

                </form>

            </div>

        </div>

    </div>

</div>

@endsection