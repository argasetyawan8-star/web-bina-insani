<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        Admin | Bina Insani Platform
    </title>

    {{-- Bootstrap Icons --}}
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" 
        rel="stylesheet"
    >

    {{-- Vite --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body class="bg-gray-100">


<div class="flex min-h-screen">


    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white border-r shadow-sm fixed inset-y-0 left-0 z-50">


        {{-- LOGO --}}
        <div class="h-20 flex items-center px-6 border-b">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 bg-purple-700 rounded-lg flex items-center justify-center text-white font-bold">
                    BI
                </div>


                <div>

                    <h1 class="font-bold text-gray-800">
                        Bina Insani
                    </h1>

                    <p class="text-xs text-gray-500">
                        Admin Panel
                    </p>

                </div>

            </div>

        </div>



        {{-- MENU --}}
        <nav class="p-4 space-y-2">


            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition">

                <i class="bi bi-speedometer2"></i>

                <span>
                    Dashboard
                </span>

            </a>





            <a href="{{ route('admin.registrations.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition">

                <i class="bi bi-credit-card"></i>

                <span>
                    Pembayaran
                </span>

            </a>



            


        </nav>


    </aside>






    {{-- MAIN CONTENT --}}
    <main class="ml-64 flex-1">


        {{-- NAVBAR --}}
        <header class="h-20 bg-white border-b shadow-sm flex items-center justify-between px-8">


            <div>

                <h2 class="text-xl font-semibold text-gray-800">

                    @yield('title')

                </h2>

            </div>




            {{-- PROFILE --}}
            <div class="flex items-center gap-4">


                <div class="text-right">

                    <p class="text-sm font-medium text-gray-800">

                        {{ Auth::user()->name ?? 'Admin' }}

                    </p>


                    <p class="text-xs text-gray-500">

                        Administrator

                    </p>

                </div>



                <div class="w-10 h-10 rounded-full bg-purple-700 text-white flex items-center justify-center font-semibold">

                    A

                </div>


            </div>


        </header>





        {{-- CONTENT --}}
        <section class="p-8">

            @yield('content')

        </section>


    </main>


</div>



</body>

</html>