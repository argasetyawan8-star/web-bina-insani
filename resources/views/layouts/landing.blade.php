<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Bina Insani')</title>

    <meta name="description"
        content="Platform Pendaftaran Pelatihan Bahasa Korea dan Persiapan Kerja ke Korea Selatan.">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>

        body{

            font-family:'Plus Jakarta Sans',sans-serif;

        }

    </style>

</head>

<body class="bg-slate-50 text-slate-800 antialiased">

    {{-- Background Decoration --}}
    <div class="fixed inset-0 -z-50 overflow-hidden">

        <div class="absolute -top-52 -left-44 w-[500px] h-[500px] rounded-full bg-blue-200 blur-[140px] opacity-60"></div>

        <div class="absolute top-1/3 -right-40 w-[450px] h-[450px] rounded-full bg-indigo-200 blur-[140px] opacity-60"></div>

        <div class="absolute bottom-0 left-1/3 w-[350px] h-[350px] rounded-full bg-sky-100 blur-[120px]"></div>

    </div>

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Content --}}
    <main>

        @yield('content')

    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Back To Top --}}
    <button
        id="backToTop"
        class="fixed bottom-6 right-6 hidden h-12 w-12 rounded-full bg-blue-600 text-white shadow-xl transition hover:scale-105 hover:bg-blue-700">

        <i class="bi bi-arrow-up"></i>

    </button>

    {{-- AOS --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>

        AOS.init({

            once:true,

            duration:700,

            easing:'ease-out'

        });

    </script>

    {{-- Back To Top --}}
    <script>

        const btn=document.getElementById('backToTop');

        window.addEventListener('scroll',()=>{

            if(window.scrollY>500){

                btn.classList.remove('hidden');

            }else{

                btn.classList.add('hidden');

            }

        });

        btn.addEventListener('click',()=>{

            window.scrollTo({

                top:0,

                behavior:'smooth'

            });

        });

    </script>

</body>

</html>