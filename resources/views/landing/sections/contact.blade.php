{{-- Contact Section --}}
<section
    id="contact"
    class="relative overflow-hidden bg-white py-16 sm:py-20 lg:py-24"
>

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute -left-20 top-20 h-64 w-64 rounded-full bg-[#2E3192]/10 blur-3xl sm:h-72 sm:w-72"></div>

    <div class="pointer-events-none absolute -right-20 bottom-10 h-64 w-64 rounded-full bg-[#F6D21A]/20 blur-3xl sm:h-72 sm:w-72"></div>


    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- HEADER --}}
        <div
            class="mx-auto mb-12 max-w-3xl text-center sm:mb-16"
            data-aos="fade-up"
        >

            <span
                class="inline-flex items-center gap-2 rounded-full bg-[#2E3192]/10 px-4 py-2 text-sm font-semibold text-[#2E3192] sm:px-5"
            >
                <i class="bi bi-headset"></i>
                Contact Bina Insani
            </span>


            <h2
                class="mt-5 text-3xl font-extrabold leading-tight text-[#1E293B] sm:mt-6 sm:text-4xl lg:text-5xl"
            >
                Siap Membantu Perjalananmu

                <span class="text-[#2E3192]">
                    Menuju Korea
                </span>
            </h2>


            <p
                class="mt-4 text-base leading-7 text-slate-600 sm:mt-5 sm:text-lg sm:leading-8"
            >
                Hubungi tim Bina Insani untuk mendapatkan informasi
                mengenai program pelatihan, pendaftaran, dan proses keberangkatan.
            </p>

        </div>



        {{-- MAIN CONTACT --}}
        <div class="grid gap-8 lg:grid-cols-5 lg:gap-10">


            {{-- CONTACT INFORMATION --}}
            <div
                class="space-y-4 sm:space-y-5 lg:col-span-2"
                data-aos="fade-right"
            >

                {{-- ADDRESS --}}
                <div
                    class="group rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition duration-500 hover:-translate-y-1 hover:shadow-xl sm:p-6"
                >

                    <div class="flex items-start gap-4 sm:gap-5">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192] transition group-hover:bg-[#2E3192] group-hover:text-white sm:h-14 sm:w-14"
                        >
                            <i class="bi bi-geo-alt-fill text-xl sm:text-2xl"></i>
                        </div>


                        <div class="min-w-0">

                            <h3 class="text-base font-bold text-[#1E293B] sm:text-lg">
                                Alamat
                            </h3>

                            <p class="mt-1 break-words text-sm leading-6 text-slate-500 sm:mt-2 sm:text-base sm:leading-7">
                                {{ $contact->address ?? 'Alamat belum tersedia' }}
                            </p>

                        </div>

                    </div>

                </div>



                {{-- WHATSAPP --}}
                <div
                    class="group rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition duration-500 hover:-translate-y-1 hover:shadow-xl sm:p-6"
                >

                    <div class="flex items-center gap-4 sm:gap-5">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-green-600 sm:h-14 sm:w-14"
                        >
                            <i class="bi bi-whatsapp text-xl sm:text-2xl"></i>
                        </div>


                        <div class="min-w-0 flex-1">

                            <h3 class="text-base font-bold text-[#1E293B] sm:text-lg">
                                WhatsApp
                            </h3>

                            <p class="mt-1 break-all text-sm text-slate-500 sm:text-base">
                                {{ $contact->phone ?? '-' }}
                            </p>

                        </div>


                        @if($contact && $contact->phone)

                            <a
                                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}"
                                target="_blank"
                                class="shrink-0 rounded-xl bg-green-500 px-3 py-2 text-xs font-bold text-white transition hover:bg-green-600 sm:px-4 sm:text-sm"
                            >
                                Chat
                            </a>

                        @endif

                    </div>

                </div>



                {{-- EMAIL --}}
                <div
                    class="group rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition duration-500 hover:-translate-y-1 hover:shadow-xl sm:p-6"
                >

                    <div class="flex items-center gap-4 sm:gap-5">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#F6D21A]/30 text-yellow-700 sm:h-14 sm:w-14"
                        >
                            <i class="bi bi-envelope-fill text-xl sm:text-2xl"></i>
                        </div>


                        <div class="min-w-0">

                            <h3 class="text-base font-bold text-[#1E293B] sm:text-lg">
                                Email
                            </h3>

                            <p class="mt-1 break-all text-sm text-slate-500 sm:text-base">
                                {{ $contact->email ?? '-' }}
                            </p>

                        </div>

                    </div>

                </div>



                {{-- OFFICE HOURS --}}
                <div
                    class="group rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition duration-500 hover:-translate-y-1 hover:shadow-xl sm:p-6"
                >

                    <div class="flex items-center gap-4 sm:gap-5">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192] sm:h-14 sm:w-14"
                        >
                            <i class="bi bi-clock-fill text-xl sm:text-2xl"></i>
                        </div>


                        <div class="min-w-0">

                            <h3 class="text-base font-bold text-[#1E293B] sm:text-lg">
                                Jam Operasional
                            </h3>

                            <p class="mt-1 break-words text-sm text-slate-500 sm:text-base">
                                {{ $contact->office_hours ?? '-' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>



            {{-- GOOGLE MAPS --}}
            <div
                class="relative overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-xl sm:rounded-[32px] lg:col-span-3"
                data-aos="fade-left"
            >

                


                {{-- MAP --}}
                <div class="h-[350px] w-full sm:h-[430px] lg:h-full lg:min-h-[430px]">

                    @if($contact && $contact->maps)

                        <iframe
                            src="https://www.google.com/maps?q={{ urlencode($contact->maps) }}&output=embed"
                            width="100%"
                            height="100%"
                            style="border:0; width:100%; height:100%;"
                            allowfullscreen
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        >
                        </iframe>

                    @else

                        <div
                            class="flex h-full min-h-[350px] items-center justify-center text-slate-400 sm:min-h-[430px]"
                        >

                            <div class="text-center">

                                <i class="bi bi-map text-4xl sm:text-5xl"></i>

                                <p class="mt-3 text-sm sm:text-base">
                                    Maps belum tersedia
                                </p>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>



        {{-- BOTTOM CTA --}}
        <div
            class="mt-12 rounded-[28px] bg-[#2E3192] p-6 text-center text-white shadow-xl sm:mt-16 sm:rounded-[32px] sm:p-8 lg:p-10"
            data-aos="fade-up"
        >

            <h3 class="text-2xl font-bold sm:text-3xl">
                Butuh Informasi Lebih Lanjut?
            </h3>


            <p class="mt-3 text-sm text-blue-100 sm:text-base">
                Tim Bina Insani siap membantu menjawab pertanyaan kamu.
            </p>


            <a
                href="#programs"
                class="mt-6 inline-flex items-center rounded-2xl bg-[#F6D21A] px-6 py-3.5 text-sm font-bold text-[#1E293B] transition hover:scale-105 sm:px-8 sm:py-4 sm:text-base"
            >

                Lihat Program

                <i class="bi bi-arrow-right ml-3"></i>

            </a>

        </div>

    </div>

</section>