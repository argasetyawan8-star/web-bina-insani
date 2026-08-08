<nav
    x-data="{ 
        open:false,
        scrolled:false
    }"

    x-init="
        window.addEventListener('scroll',()=>{
            scrolled = window.scrollY > 20
        })
    "

    :class="scrolled
        ? 'bg-white/95 backdrop-blur-xl shadow-lg py-3'
        : 'bg-white/80 backdrop-blur-lg py-5'"

    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b border-slate-100">


    <div class="max-w-7xl mx-auto px-6">


        <div class="flex items-center justify-between">


            {{-- LOGO --}}
            <a href="#home"
               class="flex items-center gap-4">


                @if(setting('logo'))

                    <img
                        src="{{ asset('storage/'.setting('logo')) }}"
                        class="h-12 w-12 object-contain">

                @endif



                <div>


                    <h2 class="text-xl font-extrabold text-primary">

                        {{ setting('website_name','Bina Insani') }}

                    </h2>


                    <p class="text-xs text-slate-500">

                        Korea Training Center

                    </p>


                </div>


            </a>





            {{-- DESKTOP MENU --}}
            <ul
                class="hidden lg:flex items-center gap-7 text-sm font-semibold">


                <li>
                    <a href="#home"
                       class="text-slate-700 hover:text-primary transition">

                        Home

                    </a>
                </li>



                <li>
                    <a href="#about"
                       class="text-slate-700 hover:text-primary transition">

                        Tentang

                    </a>
                </li>



                <li>
                    <a href="#programs"
                       class="text-slate-700 hover:text-primary transition">

                        Program

                    </a>
                </li>



                <li>
                    <a href="#why-us"
                       class="text-slate-700 hover:text-primary transition">

                        Keunggulan

                    </a>
                </li>



                <li>
                    <a href="#process"
                       class="text-slate-700 hover:text-primary transition">

                        Alur

                    </a>
                </li>



                <li>
                    <a href="#gallery"
                       class="text-slate-700 hover:text-primary transition">

                        Galeri

                    </a>
                </li>



                <li>
                    <a href="#faq"
                       class="text-slate-700 hover:text-primary transition">

                        FAQ

                    </a>
                </li>



                <li>
                    <a href="#contact"
                       class="text-slate-700 hover:text-primary transition">

                        Kontak

                    </a>
                </li>


            </ul>







            {{-- BUTTON --}}
            <div class="hidden lg:flex items-center gap-3">


                <a
                    href="#programs"

                    class="rounded-xl bg-gradient-to-r from-primary to-blue-800 px-6 py-3 font-bold text-white shadow-lg transition hover:-translate-y-1 hover:shadow-primary/40">


                    Daftar Sekarang


                </a>


            </div>






            {{-- MOBILE BUTTON --}}
            <button

                @click="open=!open"

                class="lg:hidden flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200">


                <i class="bi bi-list text-2xl text-primary"></i>


            </button>



        </div>


    </div>



</nav>







{{-- MOBILE MENU --}}

<div

    x-show="open"

    x-transition

    @click.outside="open=false"

    class="fixed top-20 left-0 right-0 z-40 lg:hidden">


    <div class="mx-5 overflow-hidden rounded-3xl border border-slate-100 bg-white shadow-2xl">


        <div class="flex flex-col py-4">


            <a href="#home"
               @click="open=false"
               class="px-6 py-4 text-slate-700 hover:bg-indigo-50 hover:text-primary">

                Home

            </a>



            <a href="#about"
               @click="open=false"
               class="px-6 py-4 text-slate-700 hover:bg-indigo-50 hover:text-primary">

                Tentang

            </a>



            <a href="#programs"
               @click="open=false"
               class="px-6 py-4 text-slate-700 hover:bg-indigo-50 hover:text-primary">

                Program

            </a>



            <a href="#why-us"
               @click="open=false"
               class="px-6 py-4 text-slate-700 hover:bg-indigo-50 hover:text-primary">

                Keunggulan

            </a>



            <a href="#process"
               @click="open=false"
               class="px-6 py-4 text-slate-700 hover:bg-indigo-50 hover:text-primary">

                Alur

            </a>



            <a href="#gallery"
               @click="open=false"
               class="px-6 py-4 text-slate-700 hover:bg-indigo-50 hover:text-primary">

                Galeri

            </a>



            <a href="#faq"
               @click="open=false"
               class="px-6 py-4 text-slate-700 hover:bg-indigo-50 hover:text-primary">

                FAQ

            </a>



            <a href="#contact"
               @click="open=false"
               class="px-6 py-4 text-slate-700 hover:bg-indigo-50 hover:text-primary">

                Kontak

            </a>





            <div class="px-6 pt-4 space-y-3">
                <a
                    href="#programs"

                    class="block rounded-xl bg-gradient-to-r from-primary to-blue-800 py-3 text-center font-bold text-white">


                    Daftar Sekarang


                </a>


            </div>



        </div>


    </div>


</div>