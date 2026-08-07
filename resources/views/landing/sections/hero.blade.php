{{-- HERO SECTION --}}

<section id="home" class="relative overflow-hidden bg-white py-24">


    {{-- Background Decoration --}}
    <div class="absolute inset-0 -z-10">


        <div class="absolute -top-40 -left-32 h-96 w-96 rounded-full bg-[#2E3192]/20 blur-3xl"></div>


        <div class="absolute right-0 top-40 h-[450px] w-[450px] rounded-full bg-[#F6D21A]/20 blur-3xl"></div>


        <div class="absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-[#ED1C24]/10 blur-3xl"></div>


    </div>




    <div class="mx-auto max-w-7xl px-6 lg:px-8">


        <div class="grid items-center gap-16 lg:grid-cols-2">



            {{-- LEFT CONTENT --}}

            <div data-aos="fade-right">


                <span
                    class="inline-flex items-center gap-2 rounded-full bg-[#F6D21A]/30 px-4 py-2 text-sm font-semibold text-[#2E3192]">


                    🇰🇷 Program Resmi Penempatan Korea Selatan


                </span>




                <h1 class="mt-8 text-5xl font-extrabold leading-tight text-[#1E293B] lg:text-7xl">


                    {{ $hero->title }}


                    <span
                        class="bg-gradient-to-r from-[#2E3192] to-[#ED1C24] bg-clip-text text-transparent">


                        {{ $hero->highlight }}


                    </span>


                </h1>




                <p class="mt-8 text-lg leading-8 text-slate-600">


                    {{ $hero->subtitle }}


                </p>




                {{-- BUTTON --}}

                <div class="mt-10 flex flex-wrap gap-4">


                    @if($hero->button_text)


                    <a
                        href="{{ $hero->button_link }}"
                        class="rounded-2xl bg-[#2E3192] px-8 py-4 font-semibold text-white shadow-lg transition hover:bg-[#252879] hover:-translate-y-1">


                        {{ $hero->button_text }}


                    </a>


                    @endif





                    @if($hero->button2_text)


                    <a
                        href="{{ $hero->button2_link }}"
                        class="rounded-2xl border border-slate-300 bg-white px-8 py-4 font-semibold text-[#1E293B] transition hover:border-[#2E3192] hover:bg-[#F8FAFC]">


                        {{ $hero->button2_text }}


                    </a>


                    @endif


                </div>






                {{-- STATISTIC --}}

                <div class="mt-14 grid grid-cols-3 gap-8">



                    <div>

                        <h2 class="text-4xl font-bold text-[#2E3192]">

                            5000+

                        </h2>


                        <p class="mt-2 text-slate-600">

                            Alumni

                        </p>


                    </div>





                    <div>

                        <h2 class="text-4xl font-bold text-[#2E3192]">

                            95%

                        </h2>


                        <p class="mt-2 text-slate-600">

                            Lulus EPS

                        </p>


                    </div>





                    <div>

                        <h2 class="text-4xl font-bold text-[#2E3192]">

                            10+

                        </h2>


                        <p class="mt-2 text-slate-600">

                            Tahun Pengalaman

                        </p>


                    </div>


                </div>


            </div>







            {{-- RIGHT DASHBOARD MOCKUP --}}

            <div
                class="relative"
                data-aos="fade-left">



                <div
                    class="overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-[0_30px_80px_rgba(46,49,146,0.15)]">





                    {{-- Header --}}

                    <div class="flex items-center justify-between border-b px-8 py-6">


                        <div>


                            <h3 class="text-xl font-bold text-[#1E293B]">

                                Dashboard Pendaftaran

                            </h3>


                            <p class="text-sm text-slate-500">

                                Platform Bina Insani

                            </p>


                        </div>




                        <span
                            class="rounded-full bg-[#2E3192]/10 px-4 py-2 text-sm font-semibold text-[#2E3192]">


                            Online


                        </span>


                    </div>






                    <div class="space-y-6 p-8">





                        {{-- Program --}}

                        <div class="rounded-2xl bg-[#F8FAFC] p-5">


                            <div class="flex justify-between">


                                <div>


                                    <p class="text-sm text-slate-500">

                                        Program

                                    </p>


                                    <h3 class="mt-1 font-bold text-[#1E293B]">

                                        Diklat Intensif

                                    </h3>


                                </div>



                                <span class="font-bold text-[#2E3192]">

                                    Aktif

                                </span>


                            </div>


                        </div>







                        {{-- Progress --}}

                        <div class="rounded-2xl bg-[#F8FAFC] p-5">


                            <p class="text-sm text-slate-500">

                                Progress Pendaftaran

                            </p>


                            <div class="mt-4 h-3 overflow-hidden rounded-full bg-slate-200">


                                <div
                                    class="h-full w-3/4 rounded-full bg-gradient-to-r from-[#2E3192] to-[#F6D21A]">


                                </div>


                            </div>


                            <p class="mt-3 text-sm font-semibold text-[#1E293B]">

                                75% Selesai

                            </p>


                        </div>







                        <div class="grid grid-cols-2 gap-4">



                            <div class="rounded-2xl bg-[#2E3192]/10 p-5">


                                <p class="text-sm text-slate-500">

                                    Dokumen

                                </p>


                                <h3 class="mt-2 text-2xl font-bold text-[#2E3192]">

                                    Lengkap

                                </h3>


                            </div>





                            <div class="rounded-2xl bg-[#F6D21A]/30 p-5">


                                <p class="text-sm text-slate-500">

                                    Pembayaran

                                </p>


                                <h3 class="mt-2 text-2xl font-bold text-[#1E293B]">

                                    Siap

                                </h3>


                            </div>



                        </div>







                        <a
                            href="#"
                            class="block w-full rounded-2xl bg-[#2E3192] py-4 text-center text-lg font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:bg-[#252879]">


                            Mulai Pendaftaran


                        </a>



                    </div>



                </div>


            </div>



        </div>


    </div>


</section>