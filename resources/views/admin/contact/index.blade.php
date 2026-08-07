@extends('layouts.admin')

@section('title', 'Contact Website')

@section('content')

<div class="space-y-6">


    {{-- Header --}}
    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Contact Website
        </h1>

        <p class="mt-2 text-slate-500">
            Kelola informasi kontak yang tampil pada halaman website.
        </p>

    </div>



    {{-- Alert --}}
    @if(session('success'))

        <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">

            {{ session('success') }}

        </div>

    @endif



    {{-- Form --}}
    <form
        action="{{ route('admin.contact.update') }}"
        method="POST"
        class="rounded-2xl bg-white p-8 shadow">

        @csrf
        @method('PUT')



        <div class="grid gap-6 md:grid-cols-2">



            {{-- Address --}}
            <div class="md:col-span-2">

                <label class="font-semibold text-slate-700">
                    Alamat
                </label>


                <textarea
                    name="address"
                    rows="3"
                    placeholder="Masukkan alamat kantor..."
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3 focus:border-blue-500 focus:outline-none">{{ old('address', $contact->address ?? '') }}</textarea>

            </div>




            {{-- Phone --}}
            <div>

                <label class="font-semibold text-slate-700">
                    Nomor WhatsApp
                </label>


                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $contact->phone ?? '') }}"
                    placeholder="08xxxxxxxxxx"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3 focus:border-blue-500 focus:outline-none">

            </div>




            {{-- Email --}}
            <div>

                <label class="font-semibold text-slate-700">
                    Email
                </label>


                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $contact->email ?? '') }}"
                    placeholder="example@gmail.com"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3 focus:border-blue-500 focus:outline-none">

            </div>




            {{-- Office Hours --}}
            <div>

                <label class="font-semibold text-slate-700">
                    Jam Operasional
                </label>


                <input
                    type="text"
                    name="office_hours"
                    value="{{ old('office_hours', $contact->office_hours ?? '') }}"
                    placeholder="Senin - Jumat 08.00 - 16.00"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3 focus:border-blue-500 focus:outline-none">

            </div>



            {{-- Maps --}}
            <div>

                <label class="font-semibold text-slate-700">
                    Google Maps Embed
                </label>


                <input
                    type="text"
                    name="maps"
                    value="{{ old('maps', $contact->maps ?? '') }}"
                    placeholder="Link Google Maps"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3 focus:border-blue-500 focus:outline-none">

            </div>



        </div>




        {{-- Social Media --}}
        <div class="mt-10">

            <h2 class="mb-5 text-xl font-bold text-slate-800">

                Social Media

            </h2>



            <div class="grid gap-6 md:grid-cols-3">



                {{-- Instagram --}}
                <div>

                    <label class="font-semibold text-slate-700">
                        Instagram
                    </label>


                    <input
                        type="text"
                        name="instagram"
                        value="{{ old('instagram', $contact->instagram ?? '') }}"
                        placeholder="https://instagram.com/..."
                        class="mt-2 w-full rounded-xl border border-slate-300 p-3">

                </div>



                {{-- Facebook --}}
                <div>

                    <label class="font-semibold text-slate-700">
                        Facebook
                    </label>


                    <input
                        type="text"
                        name="facebook"
                        value="{{ old('facebook', $contact->facebook ?? '') }}"
                        placeholder="https://facebook.com/..."
                        class="mt-2 w-full rounded-xl border border-slate-300 p-3">

                </div>




                {{-- TikTok --}}
                <div>

                    <label class="font-semibold text-slate-700">
                        TikTok
                    </label>


                    <input
                        type="text"
                        name="tiktok"
                        value="{{ old('tiktok', $contact->tiktok ?? '') }}"
                        placeholder="https://tiktok.com/@..."
                        class="mt-2 w-full rounded-xl border border-slate-300 p-3">

                </div>



            </div>


        </div>





        {{-- Button --}}
        <div class="mt-10">

            <button
                type="submit"
                class="rounded-xl bg-blue-600 px-7 py-3 font-semibold text-white transition hover:bg-blue-700">

                <i class="bi bi-save me-2"></i>

                Simpan Perubahan

            </button>


        </div>



    </form>


</div>


@endsection