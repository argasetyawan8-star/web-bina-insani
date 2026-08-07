<br>
<br>
<br>
{{-- Background Decoration --}}
<div class="absolute -left-20 top-20 h-72 w-72 rounded-full bg-[#2E3192]/20 blur-3xl"></div>

<div class="absolute -right-20 bottom-10 h-72 w-72 rounded-full bg-[#F6D21A]/30 blur-3xl"></div>


<div class="relative mx-auto max-w-7xl px-6 lg:px-8">


    {{-- Header --}}
    <div 
        class="mx-auto mb-16 max-w-3xl text-center"
        data-aos="fade-up">


        <span id="faq" 
            class="inline-flex items-center gap-2 rounded-full bg-[#2E3192]/10 px-5 py-2 text-sm font-semibold text-[#2E3192]">

            <i class="bi bi-question-circle-fill"></i>

            FAQ Bina Insani

        </span>



        <h2 class="mt-6 text-4xl lg:text-5xl font-extrabold text-[#1E293B]">


            Pertanyaan Yang Sering

            <span class="text-[#2E3192]">

                Ditanyakan

            </span>


        </h2>



        <p class="mt-5 text-lg leading-8 text-slate-600">

            Temukan informasi mengenai program pelatihan,
            pendaftaran, pembayaran, dan proses persiapan kerja ke Korea Selatan.

        </p>


    </div>




    {{-- FAQ List --}}
    <div
        x-data="{ active:null }"
        class="mx-auto max-w-4xl space-y-5">


        @forelse($faqs as $index => $faq)


        <div
            data-aos="fade-up"
            data-aos-delay="{{ $index * 100 }}"
            class="group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-1 hover:shadow-xl">



            {{-- Question --}}
            <button

                @click="active === {{ $index }} ? active=null : active={{ $index }}"

                class="flex w-full items-center justify-between gap-5 px-7 py-6 text-left">


                <div class="flex items-center gap-4">


                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#2E3192]/10 text-[#2E3192] transition group-hover:bg-[#2E3192] group-hover:text-white">


                        <i class="bi bi-question-lg text-xl"></i>


                    </div>



                    <span class="font-bold text-[#1E293B]">

                        {{ $faq->question }}

                    </span>


                </div>




                <div

                    class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-100 text-[#2E3192] transition duration-300"

                    :class="active === {{ $index }} 
                    ? 'rotate-180 bg-[#2E3192] text-white' 
                    : ''">


                    <i class="bi bi-chevron-down"></i>


                </div>


            </button>




            {{-- Answer --}}
            <div

                x-show="active === {{ $index }}"

                x-collapse

                class="border-t border-slate-100 bg-[#F8FAFC] px-7 pb-6 pt-5">


                <p class="leading-8 text-slate-600">


                    {{ $faq->answer }}


                </p>


            </div>



        </div>


        @empty


        <div 
            class="rounded-3xl bg-white p-10 text-center shadow">


            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[#2E3192]/10">

                <i class="bi bi-chat-square-text text-3xl text-[#2E3192]"></i>

            </div>


            <p class="mt-4 text-slate-500">

                Belum ada FAQ tersedia.

            </p>


        </div>


        @endforelse


    </div>



    {{-- CTA --}}
    <div
        class="mt-20 rounded-[32px] bg-[#2E3192] p-10 text-center text-white shadow-xl"
        data-aos="fade-up">


        <h3 class="text-3xl font-bold">

            Masih Ada Pertanyaan?

        </h3>


        <p class="mt-3 text-blue-100">

            Hubungi tim Bina Insani untuk mendapatkan informasi lebih lanjut.

        </p>


        <a
            href="#contact"
            class="mt-6 inline-flex items-center rounded-2xl bg-[#F6D21A] px-8 py-4 font-bold text-[#1E293B] transition hover:scale-105">


            Hubungi Kami

            <i class="bi bi-arrow-right ml-3"></i>


        </a>


    </div>



</div>