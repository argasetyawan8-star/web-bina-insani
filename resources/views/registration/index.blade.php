@extends('layouts.landing')

@section('content')

<div
    x-data="{

        step:1,

        errors:{},

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
                this.errors.gender = 'Pilih jenis kelamin.';
            }

            if(form.phone.value.trim() === ''){
                this.errors.phone = 'Nomor HP wajib diisi.';
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


            validateStep3() {

            this.errors = {}

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

        },
        

    }"

    

    class="min-h-screen bg-slate-50 py-16">

    <div class="max-w-6xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center">

            <h1 class="text-4xl font-bold text-slate-800">
                Formulir Pendaftaran
            </h1>

            <p class="mt-3 text-slate-500">
                Lengkapi seluruh tahapan pendaftaran hingga pembayaran.
            </p>

        </div>

        {{-- Progress --}}
        <div class="mt-12">

            <div class="grid grid-cols-4 gap-4">

                @foreach([
                    1=>'Program',
                    2=>'Biodata',
                    3=>'Dokumen',
                    4=>'Review',
                   
                ] as $number=>$title)

                    <div class="text-center">

                        <div

                            class="w-12 h-12 rounded-full mx-auto flex items-center justify-center font-bold transition-all duration-300"

                            :class="step >= {{ $number }}
                            ? 'bg-blue-600 text-white'
                            : 'bg-slate-200 text-slate-500'">

                            {{ $number }}

                        </div>

                        <p class="mt-3 text-sm font-medium text-slate-600">

                            {{ $title }}

                        </p>

                    </div>

                @endforeach

            </div>

        </div>

        {{-- Card --}}
        <div class="mt-10 bg-white rounded-3xl shadow-xl p-10">

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

@endsection