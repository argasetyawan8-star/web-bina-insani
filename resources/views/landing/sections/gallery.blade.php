<br>
<br>
<br>

<div class="max-w-7xl mx-auto px-6 lg:px-8">


    {{-- Heading --}}
    <div
        class="max-w-3xl mx-auto text-center"
        data-aos="fade-up">


        <span
            class="inline-flex items-center gap-2 rounded-full bg-[#2E3192]/10 px-4 py-2 font-semibold text-[#2E3192]">

            Dokumentasi

        </span>


        <h2 id="gallery"
            class="mt-6 text-5xl font-extrabold text-[#1E293B]">


            Alumni Bina Insani


            <span
                class="bg-gradient-to-r from-[#2E3192] to-[#ED1C24] bg-clip-text text-transparent">

                Yang Sudah Berhasil Berangkat ke Korea

            </span>


        </h2>


        <p
            class="mt-6 text-lg leading-8 text-slate-600">

            Beberapa dokumentasi Alumni Bina Insani yang telah berhasil berangkat ke Korea Selatan untuk bekerja dan meningkatkan kualitas hidup mereka. Semoga menjadi inspirasi bagi calon peserta lainnya.

        </p>


    </div>




    {{-- Gallery --}}
    <div class="mt-20 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">


        @forelse($galleries as $gallery)


            <div
                data-aos="zoom-in"
                class="group relative overflow-hidden rounded-[28px] shadow-xl">


                <img
                    src="{{ asset('storage/'.$gallery->image) }}"
                    class="h-80 w-full object-cover transition duration-700 group-hover:scale-110"
                    alt="Gallery">



                {{-- Overlay --}}
                <div
                    class="absolute inset-0 bg-gradient-to-t from-[#2E3192]/90 via-black/30 to-transparent opacity-0 transition duration-500 group-hover:opacity-100">

                </div>




                {{-- Content --}}
                <div
                    class="absolute bottom-0 left-0 right-0 translate-y-8 p-6 text-white opacity-0 transition duration-500 group-hover:translate-y-0 group-hover:opacity-100">


                    <div
                        class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#F6D21A]/90 text-[#2E3192] backdrop-blur">


                        <i class="bi bi-camera-fill text-2xl"></i>


                    </div>



                    <h3 class="text-2xl font-bold">


                        Dokumentasi Alumni


                    </h3>



                    <p class="mt-2 text-white/90">


                        Bina Insani Training Center


                    </p>



                </div>


            </div>



        @empty


            <div
                class="col-span-3 py-20 text-center text-slate-500">


                Belum ada foto yang diupload.


            </div>



        @endforelse


    </div>





    {{-- Bottom Card --}}
    <div
        class="mt-20 rounded-[32px] bg-gradient-to-r from-[#2E3192] via-[#2E3192] to-[#ED1C24] p-12 text-center text-white shadow-2xl"
        data-aos="fade-up">



        <h3 class="text-4xl font-bold">


            Bergabunglah Bersama Ribuan Alumni


        </h3>




        <p
            class="mx-auto mt-5 max-w-2xl text-lg text-white/80">


            Jadilah bagian dari peserta Bina Insani yang telah berhasil
            mempersiapkan diri menuju kesempatan kerja di Korea Selatan.


        </p>




        <a
            href="#programs"
            class="mt-8 inline-flex items-center rounded-2xl bg-[#F6D21A] px-8 py-4 font-bold text-[#2E3192] transition hover:scale-105">


            Daftar Sekarang


            <i class="bi bi-arrow-right ms-3"></i>


        </a>



    </div>


</div>