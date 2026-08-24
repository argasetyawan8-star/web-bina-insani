{{-- FAQ SECTION --}}
<section
    id="faq-section"
    class="relative overflow-hidden bg-[#F8FAFC] py-16 sm:py-20 lg:py-24"
>

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">

        <div
            class="absolute -left-20 top-20 h-64 w-64 rounded-full bg-[#2E3192]/10 blur-3xl sm:h-72 sm:w-72"
        ></div>

        <div
            class="absolute -bottom-10 -right-20 h-64 w-64 rounded-full bg-[#F6D21A]/20 blur-3xl sm:h-72 sm:w-72"
        ></div>

    </div>


    <div class="relative mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- HEADER --}}
        <div
            class="mx-auto mb-10 max-w-3xl text-center sm:mb-14 lg:mb-16"
            data-aos="fade-up"
        >

            {{-- Badge --}}
            <span
                id="faq"
                class="inline-flex items-center gap-2 rounded-full bg-[#2E3192]/10 px-3 py-1.5 text-xs font-semibold text-[#2E3192] sm:px-5 sm:py-2 sm:text-sm"
            >

                <i class="bi bi-question-circle-fill"></i>

                FAQ Bina Insani

            </span>


            {{-- Heading --}}
            <h2
                class="mt-5 text-3xl font-extrabold leading-tight text-[#1E293B] sm:mt-6 sm:text-4xl lg:text-5xl"
            >

                Pertanyaan Yang Sering

                <span class="text-[#2E3192]">
                    Ditanyakan
                </span>

            </h2>


            {{-- Description --}}
            <p
                class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-slate-600 sm:mt-5 sm:text-base sm:leading-8 lg:text-lg"
            >

                Temukan informasi mengenai program pelatihan,
                pendaftaran, pembayaran, dan proses persiapan
                kerja ke Korea Selatan.

            </p>

        </div>



        {{-- FAQ LIST --}}
        <div
            x-data="{ active: null }"
            class="mx-auto w-full max-w-4xl space-y-3 sm:space-y-4 lg:space-y-5"
        >

            @forelse($faqs as $index => $faq)

                <div
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 100 }}"
                    class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-1 hover:shadow-xl sm:rounded-3xl"
                >

                    {{-- QUESTION --}}
                    <button
                        type="button"
                        @click="active === {{ $index }} ? active = null : active = {{ $index }}"
                        class="flex w-full items-center justify-between gap-3 px-4 py-4 text-left sm:gap-5 sm:px-6 sm:py-5 lg:px-7 lg:py-6"
                    >

                        <div class="flex min-w-0 items-center gap-3 sm:gap-4">

                            {{-- Icon --}}
                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#2E3192]/10 text-[#2E3192] transition group-hover:bg-[#2E3192] group-hover:text-white sm:h-12 sm:w-12 sm:rounded-2xl"
                            >

                                <i class="bi bi-question-lg text-lg sm:text-xl"></i>

                            </div>


                            {{-- Question --}}
                            <span
                                class="text-sm font-bold leading-6 text-[#1E293B] sm:text-base sm:leading-7"
                            >
                                {{ $faq->question }}
                            </span>

                        </div>


                        {{-- CHEVRON --}}
                        <div
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-100 text-sm text-[#2E3192] transition duration-300 sm:h-9 sm:w-9"
                            :class="
                                active === {{ $index }}
                                    ? 'rotate-180 bg-[#2E3192] text-white'
                                    : ''
                            "
                        >

                            <i class="bi bi-chevron-down"></i>

                        </div>

                    </button>



                    {{-- ANSWER --}}
                    <div
                        x-show="active === {{ $index }}"
                        x-collapse
                        class="border-t border-slate-100 bg-[#F8FAFC] px-4 pb-5 pt-4 sm:px-6 sm:pb-6 sm:pt-5 lg:px-7"
                    >

                        <p
                            class="text-sm leading-7 text-slate-600 sm:text-base sm:leading-8"
                        >

                            {{ $faq->answer }}

                        </p>

                    </div>

                </div>


            @empty

                {{-- EMPTY FAQ --}}
                <div
                    class="rounded-2xl bg-white p-8 text-center shadow sm:rounded-3xl sm:p-10"
                >

                    <div
                        class="mx-auto flex h-14 w-14 items-center justify-center rounded-xl bg-[#2E3192]/10 sm:h-16 sm:w-16 sm:rounded-2xl"
                    >

                        <i
                            class="bi bi-chat-square-text text-2xl text-[#2E3192] sm:text-3xl"
                        ></i>

                    </div>


                    <p class="mt-4 text-sm text-slate-500 sm:text-base">
                        Belum ada FAQ tersedia.
                    </p>

                </div>

            @endforelse

        </div>



        {{-- CTA --}}
        <div
            class="mt-12 rounded-3xl bg-[#2E3192] p-6 text-center text-white shadow-xl sm:mt-16 sm:rounded-[32px] sm:p-10 lg:mt-20"
            data-aos="fade-up"
        >

            <h3
                class="text-2xl font-bold sm:text-3xl"
            >
                Masih Ada Pertanyaan?
            </h3>


            <p
                class="mx-auto mt-3 max-w-xl text-sm leading-6 text-blue-100 sm:text-base sm:leading-7"
            >
                Hubungi tim Bina Insani untuk mendapatkan informasi lebih lanjut.
            </p>


            <a
                href="#contact"
                class="mt-5 inline-flex items-center rounded-xl bg-[#F6D21A] px-6 py-3 text-sm font-bold text-[#1E293B] transition hover:scale-105 sm:mt-6 sm:rounded-2xl sm:px-8 sm:py-4 sm:text-base"
            >

                Hubungi Kami

                <i class="bi bi-arrow-right ml-2 sm:ml-3"></i>

            </a>

        </div>

    </div>

</section>