{{-- Contact Section --}}<div class="container mx-auto px-4 py-16">

{{-- Header --}}
<div
    class="mx-auto mb-16 max-w-3xl text-center"
    data-aos="fade-up">

    <span
        id="contact"
        class="inline-flex items-center gap-2 rounded-full bg-[#2E3192]/10 px-5 py-2 text-sm font-semibold text-[#2E3192]">

        <i class="bi bi-headset"></i>

        Contact Bina Insani

    </span>

    <h2 class="mt-6 text-4xl font-extrabold text-[#1E293B] lg:text-5xl">

        Siap Membantu Perjalananmu

        <span class="text-[#2E3192]">
            Menuju Korea
        </span>

    </h2>

    <p class="mt-5 text-lg leading-8 text-slate-600">

        Hubungi tim Bina Insani untuk mendapatkan informasi
        mengenai program pelatihan, pendaftaran, dan proses keberangkatan.

    </p>

</div>


{{-- Main Contact --}}
<div class="grid gap-10 lg:grid-cols-5">

    {{-- Contact Information --}}
    <div
        class="space-y-5 lg:col-span-2"
        data-aos="fade-right">

        {{-- Address --}}
        <div
            class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-xl">

            <div class="flex items-start gap-5">

                <div
                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192] transition group-hover:bg-[#2E3192] group-hover:text-white">

                    <i class="bi bi-geo-alt-fill text-2xl"></i>

                </div>

                <div>

                    <h3 class="text-lg font-bold text-[#1E293B]">
                        Alamat
                    </h3>

                    <p class="mt-2 leading-7 text-slate-500">
                        {{ $contact->address ?? 'Alamat belum tersedia' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- WhatsApp --}}
        <div
            class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-xl">

            <div class="flex items-center gap-5">

                <div
                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-green-600">

                    <i class="bi bi-whatsapp text-2xl"></i>

                </div>

                <div class="flex-1">

                    <h3 class="text-lg font-bold text-[#1E293B]">
                        WhatsApp
                    </h3>

                    <p class="mt-1 text-slate-500">
                        {{ $contact->phone ?? '-' }}
                    </p>

                </div>

                @if($contact && $contact->phone)

                    <a
                        href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}"
                        target="_blank"
                        class="rounded-xl bg-green-500 px-4 py-2 text-sm font-bold text-white transition hover:bg-green-600">

                        Chat

                    </a>

                @endif

            </div>

        </div>


        {{-- Email --}}
        <div
            class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-xl">

            <div class="flex items-center gap-5">

                <div
                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-[#F6D21A]/30 text-yellow-700">

                    <i class="bi bi-envelope-fill text-2xl"></i>

                </div>

                <div>

                    <h3 class="text-lg font-bold text-[#1E293B]">
                        Email
                    </h3>

                    <p class="mt-1 text-slate-500">
                        {{ $contact->email ?? '-' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Office Hours --}}
        <div
            class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-xl">

            <div class="flex items-center gap-5">

                <div
                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192]">

                    <i class="bi bi-clock-fill text-2xl"></i>

                </div>

                <div>

                    <h3 class="text-lg font-bold text-[#1E293B]">
                        Jam Operasional
                    </h3>

                    <p class="mt-1 text-slate-500">
                        {{ $contact->office_hours ?? '-' }}
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- Google Maps --}}
    <div
        class="relative overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-xl lg:col-span-3"
        data-aos="fade-left">

        {{-- Maps Header --}}
        <div
            class="absolute left-6 top-6 z-10 rounded-2xl bg-white/90 px-5 py-3 shadow backdrop-blur">

            <h3 class="font-bold text-[#1E293B]">
                Lokasi Bina Insani
            </h3>

            <p class="text-sm text-slate-500">
                Training Center
            </p>

        </div>


        {{-- Maps --}}
        <div class="h-full min-h-[430px]">

            @if($contact && $contact->maps)

                <iframe
                    src="https://www.google.com/maps?q={{ urlencode($contact->maps) }}&output=embed"
                    width="100%"
                    height="100%"
                    style="border:0; min-height:430px;"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

            @else

                <div class="flex h-full min-h-[430px] items-center justify-center text-slate-400">

                    <div class="text-center">

                        <i class="bi bi-map text-5xl"></i>

                        <p class="mt-3">
                            Maps belum tersedia
                        </p>

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>


{{-- Bottom CTA --}}
<div
    class="mt-16 rounded-[32px] bg-[#2E3192] p-10 text-center text-white shadow-xl"
    data-aos="fade-up">

    <h3 class="text-3xl font-bold">
        Butuh Informasi Lebih Lanjut?
    </h3>

    <p class="mt-3 text-blue-100">
        Tim Bina Insani siap membantu menjawab pertanyaan kamu.
    </p>

    <a
        href="#programs"
        class="mt-6 inline-flex items-center rounded-2xl bg-[#F6D21A] px-8 py-4 font-bold text-[#1E293B] transition hover:scale-105">

        Lihat Program

        <i class="bi bi-arrow-right ml-3"></i>

    </a>

</div>

</div>