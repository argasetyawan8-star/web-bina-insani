{{-- PROGRAM SECTION --}}
<section
    id="programs"
    class="bg-white py-16 sm:py-20 lg:py-24"
>

    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">


        {{-- HEADING --}}
        <div
            class="mx-auto max-w-3xl text-center"
            data-aos="fade-up"
        >

            {{-- LABEL --}}
            <span
                class="inline-flex items-center gap-2 rounded-full bg-[#F6D21A]/30 px-3 py-2 text-xs font-semibold text-[#2E3192] sm:px-4 sm:text-sm"
            >
                <i class="bi bi-mortarboard-fill"></i>
                Program Pelatihan
            </span>


            {{-- TITLE --}}
            <h2
                class="mt-5 text-3xl font-extrabold leading-tight text-[#1E293B] sm:mt-6 sm:text-4xl lg:text-5xl"
            >

                Pilih Program

                <span
                    class="bg-gradient-to-r from-[#2E3192] to-[#ED1C24] bg-clip-text text-transparent"
                >
                    Sesuai Kebutuhanmu
                </span>

            </h2>


            {{-- DESCRIPTION --}}
            <p
                class="mt-5 text-base leading-7 text-slate-600 sm:mt-6 sm:text-lg sm:leading-8"
            >
                Kami menyediakan dua pilihan program pelatihan Bahasa Korea
                yang dirancang untuk mempersiapkan peserta menghadapi
                EPS-TOPIK hingga proses penempatan kerja.
            </p>

        </div>


        {{-- PROGRAM CARD --}}
        <div
            class="mt-12 grid gap-6 sm:mt-16 sm:gap-8 lg:mt-20 lg:grid-cols-2 lg:gap-10"
        >

            @foreach($programs as $program)

                <div
                    data-aos="zoom-in"
                    class="group relative min-w-0 overflow-hidden rounded-[24px] border border-slate-200 bg-white shadow-lg transition duration-500 hover:-translate-y-2 hover:shadow-2xl sm:rounded-[32px] lg:hover:-translate-y-3"
                >


                    {{-- RIBBON --}}
                    <div
                        class="absolute right-0 top-0 rounded-bl-2xl bg-[#2E3192] px-4 py-2 text-xs font-semibold text-white sm:px-6 sm:text-sm"
                    >
                        {{ $loop->first ? 'POPULER' : 'TERSEDIA' }}
                    </div>


                    {{-- CARD CONTENT --}}
                    <div class="p-5 sm:p-7 lg:p-10">


                        {{-- ICON --}}
                        <div
                            class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-[#2E3192] to-[#ED1C24] text-white shadow-xl sm:h-20 sm:w-20 sm:rounded-3xl"
                        >

                            @if(Str::contains(strtolower($program->name),'intensif'))

                                <i class="bi bi-lightning-charge-fill text-2xl sm:text-3xl"></i>

                            @else

                                <i class="bi bi-calendar-check-fill text-2xl sm:text-3xl"></i>

                            @endif

                        </div>


                        {{-- TITLE --}}
                        <h3
                            class="mt-6 text-2xl font-bold leading-tight text-[#1E293B] sm:mt-8 sm:text-3xl"
                        >
                            {{ $program->name }}
                        </h3>


                        {{-- DESCRIPTION --}}
                        <p
                            class="mt-3 text-sm leading-6 text-slate-600 sm:mt-4 sm:text-base sm:leading-7"
                        >
                            {{ $program->description }}
                        </p>


                        {{-- PRICE --}}
                        <div
                            class="mt-6 rounded-2xl bg-[#F8FAFC] p-4 sm:mt-8 sm:rounded-3xl sm:p-6"
                        >

                            <p class="text-xs text-slate-500 sm:text-sm">
                                Biaya Pelatihan
                            </p>


                            <h2
                                class="mt-1 break-words text-2xl font-extrabold leading-tight text-[#2E3192] sm:mt-2 sm:text-4xl"
                            >
                                Rp {{ number_format($program->training_fee, 0, ',', '.') }}
                            </h2>


                            <p
                                class="mt-2 text-xs text-slate-500 sm:text-sm"
                            >
                                Biaya Pendaftaran

                                <span class="font-bold text-[#ED1C24]">
                                    Rp {{ number_format($program->registration_fee, 0, ',', '.') }}
                                </span>
                            </p>

                        </div>


                        {{-- FEATURES --}}
                        <div class="mt-6 space-y-3 sm:mt-8 sm:space-y-4">


                            {{-- TRAINING DAYS --}}
                            <div class="flex items-start gap-3">

                                <i
                                    class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base text-[#2E3192] sm:text-xl"
                                ></i>

                                <span
                                    class="min-w-0 text-sm leading-6 text-slate-600 sm:text-base"
                                >
                                    {{ $program->training_days }}
                                </span>

                            </div>


                            {{-- TRAINING HOURS --}}
                            <div class="flex items-start gap-3">

                                <i
                                    class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base text-[#2E3192] sm:text-xl"
                                ></i>

                                <span
                                    class="min-w-0 text-sm leading-6 text-slate-600 sm:text-base"
                                >
                                    {{ $program->training_hours }}
                                </span>

                            </div>


                            {{-- DURATION --}}
                            <div class="flex items-start gap-3">

                                <i
                                    class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base text-[#2E3192] sm:text-xl"
                                ></i>

                                <span
                                    class="min-w-0 text-sm leading-6 text-slate-600 sm:text-base"
                                >
                                    Durasi {{ $program->duration }}
                                </span>

                            </div>


                            {{-- MODULE --}}
                            <div class="flex items-start gap-3">

                                <i
                                    class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base text-[#2E3192] sm:text-xl"
                                ></i>

                                <span
                                    class="min-w-0 text-sm leading-6 text-slate-600 sm:text-base"
                                >
                                    Modul Bahasa Korea
                                </span>

                            </div>


                            {{-- EPS TOPIK --}}
                            <div class="flex items-start gap-3">

                                <i
                                    class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base text-[#2E3192] sm:text-xl"
                                ></i>

                                <span
                                    class="min-w-0 text-sm leading-6 text-slate-600 sm:text-base"
                                >
                                    Simulasi EPS-TOPIK
                                </span>

                            </div>


                            {{-- PENDAMPINGAN --}}
                            <div class="flex items-start gap-3">

                                <i
                                    class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base text-[#2E3192] sm:text-xl"
                                ></i>

                                <span
                                    class="min-w-0 text-sm leading-6 text-slate-600 sm:text-base"
                                >
                                    Pendampingan Hingga Berangkat
                                </span>

                            </div>


                        </div>


                        {{-- BUTTON --}}
                        <a
                            href="{{ route('registration.create', $program->id) }}"
                            class="mt-8 flex w-full items-center justify-center rounded-2xl bg-[#2E3192] py-3.5 text-sm font-bold text-white transition duration-300 hover:-translate-y-1 hover:bg-[#252879] sm:mt-10 sm:py-4 sm:text-lg"
                        >

                            Daftar Program

                            <i class="bi bi-arrow-right ms-2 sm:ms-3"></i>

                        </a>


                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>