{{-- =========================================================
     FOOTER
========================================================= --}}

<footer class="relative overflow-hidden bg-[#0F172A] text-white">

    {{-- =========================================================
         DECORATION
    ========================================================== --}}

    <div
        class="pointer-events-none absolute -left-40 top-0 h-96 w-96 rounded-full bg-[#2E3192]/40 blur-3xl"
        aria-hidden="true"
    ></div>

    <div
        class="pointer-events-none absolute bottom-0 right-0 h-[450px] w-[450px] rounded-full bg-[#F6D21A]/20 blur-3xl"
        aria-hidden="true"
    ></div>



    {{-- =========================================================
         MAIN FOOTER
    ========================================================== --}}

    <div class="relative mx-auto max-w-7xl px-6 pb-10 pt-20 lg:px-8">

        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-3">


            {{-- =====================================================
                 BRAND
            ====================================================== --}}

            <div>

                <div class="flex items-center gap-4">

                    <div
                        class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-white p-2 shadow-lg"
                    >

                        @if (setting('logo'))

                            <img
                                src="{{ asset('images/' . setting('logo')) }}"
                                alt="{{ setting('website_name', 'Bina Insani') }}"
                                class="h-full w-full object-contain"
                            >

                        @else

                            <img
                                src="{{ asset('images/gallery/BI.png') }}"
                                alt="{{ setting('website_name', 'Bina Insani') }}"
                                class="h-full w-full object-contain"
                            >

                        @endif

                    </div>


                    <div class="min-w-0">

                        <h3 class="truncate text-2xl font-extrabold text-accent">

                            {{ setting('website_name', 'Bina Insani') }}

                        </h3>

                        <p class="text-sm text-slate-400">
                            Migrant Training Center
                        </p>

                    </div>

                </div>



                {{-- DESCRIPTION --}}

                <p class="mt-6 max-w-xl leading-8 text-slate-300">

                    Lembaga pelatihan Bahasa Korea dan persiapan EPS-TOPIK
                    untuk membantu calon pekerja Indonesia mempersiapkan
                    diri menuju peluang kerja internasional.

                </p>



                {{-- SOCIAL MEDIA --}}

                <div class="mt-8 flex flex-wrap gap-3">


                    @if (setting('facebook'))

                        <a
                            href="{{ setting('facebook') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Facebook"
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/10 transition duration-300 hover:-translate-y-1 hover:bg-[#2E3192]"
                        >

                            <i class="bi bi-facebook text-xl"></i>

                        </a>

                    @endif



                    @if (setting('instagram'))

                        <a
                            href="{{ setting('instagram') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Instagram"
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/10 transition duration-300 hover:-translate-y-1 hover:bg-pink-600"
                        >

                            <i class="bi bi-instagram text-xl"></i>

                        </a>

                    @endif



                    @if (setting('youtube'))

                        <a
                            href="{{ setting('youtube') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="YouTube"
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/10 transition duration-300 hover:-translate-y-1 hover:bg-red-600"
                        >

                            <i class="bi bi-youtube text-xl"></i>

                        </a>

                    @endif



                    @if (setting('tiktok'))

                        <a
                            href="{{ setting('tiktok') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="TikTok"
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/10 transition duration-300 hover:-translate-y-1 hover:bg-black"
                        >

                            <i class="bi bi-tiktok text-xl"></i>

                        </a>

                    @endif

                </div>

            </div>



            {{-- =====================================================
                 PROGRAM INFORMATION
            ====================================================== --}}

            <div>

                <h4 class="mb-6 text-xl font-bold">
                    Program Pelatihan
                </h4>


                <div class="space-y-4">

                    @php
                        $footerPrograms = \App\Models\Program::query()
                            ->where('is_active', true)
                            ->orderBy('name')
                            ->get();
                    @endphp


                    @forelse ($footerPrograms as $program)

                        <a
                            href="{{ route('programs.show', $program) }}"
                            class="group flex items-start gap-3 text-slate-300 transition hover:text-[#F6D21A]"
                        >

                            <i
                                class="bi bi-mortarboard-fill mt-1 shrink-0 text-[#F6D21A]"
                            ></i>

                            <span class="group-hover:underline">
                                {{ $program->name }}
                            </span>

                        </a>

                    @empty

                        <p class="text-sm leading-6 text-slate-400">
                            Belum ada program pelatihan aktif.
                        </p>

                    @endforelse


                    <a
                        href="{{ route('programs.index') }}"
                        class="inline-flex items-center gap-2 pt-2 text-sm font-semibold text-[#F6D21A] transition hover:translate-x-1"
                    >

                        Lihat Semua Program

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>



            {{-- =====================================================
                 CONTACT
            ====================================================== --}}

            <div>

                <h4 class="mb-6 text-xl font-bold">
                    Hubungi Kami
                </h4>


                <div class="space-y-5 text-slate-300">


                    {{-- ADDRESS --}}

                    @if (setting('address'))

                        <div class="flex items-start gap-3">

                            <i
                                class="bi bi-geo-alt-fill mt-1 shrink-0 text-[#F6D21A]"
                            ></i>

                            <span class="leading-6">
                                {{ setting('address') }}
                            </span>

                        </div>

                    @endif



                    {{-- EMAIL --}}

                    @if (setting('email'))

                        <div class="flex items-start gap-3">

                            <i
                                class="bi bi-envelope-fill mt-1 shrink-0 text-[#F6D21A]"
                            ></i>

                            <a
                                href="mailto:{{ setting('email') }}"
                                class="break-all transition hover:text-[#F6D21A]"
                            >
                                {{ setting('email') }}
                            </a>

                        </div>

                    @endif



                    {{-- PHONE / WHATSAPP --}}

                    @if (setting('phone'))

                        @php
                            $whatsappNumber = preg_replace(
                                '/[^0-9]/',
                                '',
                                setting('phone')
                            );

                            if (str_starts_with($whatsappNumber, '0')) {
                                $whatsappNumber =
                                    '62' . substr(
                                        $whatsappNumber,
                                        1
                                    );
                            }
                        @endphp


                        <div class="flex items-start gap-3">

                            <i
                                class="bi bi-whatsapp mt-1 shrink-0 text-[#F6D21A]"
                            ></i>

                            <a
                                href="https://wa.me/{{ $whatsappNumber }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="transition hover:text-[#F6D21A]"
                            >
                                {{ setting('phone') }}
                            </a>

                        </div>

                    @endif



                    {{-- OPERATING HOURS --}}

                    <div class="flex items-start gap-3">

                        <i
                            class="bi bi-clock-fill mt-1 shrink-0 text-[#F6D21A]"
                        ></i>

                        <span class="leading-6">

                            Senin - Sabtu
                            <br>
                            08.00 - 17.00 WIB

                        </span>

                    </div>

                </div>

            </div>

        </div>
        
</footer>

