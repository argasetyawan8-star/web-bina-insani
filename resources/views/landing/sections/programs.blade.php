<section id="programs" class="bg-white py-24">

<div class="mx-auto max-w-7xl px-6 lg:px-8">


{{-- HEADING --}}

<div
class="mx-auto max-w-3xl text-center"
data-aos="fade-up">


<span
class="inline-flex items-center gap-2 rounded-full bg-[#F6D21A]/30 px-4 py-2 font-semibold text-[#2E3192]">


<i class="bi bi-mortarboard-fill"></i>

Program Pelatihan


</span>





<h2
class="mt-6 text-5xl font-extrabold text-[#1E293B]">


Pilih Program


<span
class="bg-gradient-to-r from-[#2E3192] to-[#ED1C24] bg-clip-text text-transparent">


Sesuai Kebutuhanmu


</span>


</h2>





<p
class="mt-6 text-lg leading-8 text-slate-600">


Kami menyediakan dua pilihan program pelatihan Bahasa Korea
yang dirancang untuk mempersiapkan peserta menghadapi
EPS-TOPIK hingga proses penempatan kerja.


</p>



</div>






{{-- PROGRAM CARD --}}

<div
class="mt-20 grid gap-10 lg:grid-cols-2">



@foreach($programs as $program)



<div
data-aos="zoom-in"
class="group relative overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-lg transition duration-500 hover:-translate-y-3 hover:shadow-2xl">





{{-- RIBBON --}}

<div
class="absolute right-0 top-0 rounded-bl-2xl bg-[#2E3192] px-6 py-2 text-sm font-semibold text-white">


{{ $loop->first ? 'POPULER' : 'TERSEDIA' }}


</div>






<div class="p-10">





{{-- ICON --}}

<div
class="flex h-20 w-20 items-center justify-center rounded-3xl bg-gradient-to-br from-[#2E3192] to-[#ED1C24] text-white shadow-xl">


@if(Str::contains(strtolower($program->name),'intensif'))


<i class="bi bi-lightning-charge-fill text-3xl"></i>


@else


<i class="bi bi-calendar-check-fill text-3xl"></i>


@endif



</div>







{{-- TITLE --}}

<h3
class="mt-8 text-3xl font-bold text-[#1E293B]">


{{ $program->name }}


</h3>





<p class="mt-4 text-slate-600">


{{ $program->description }}


</p>








{{-- PRICE --}}

<div
class="mt-8 rounded-3xl bg-[#F8FAFC] p-6">


<p class="text-sm text-slate-500">


Biaya Pelatihan


</p>





<h2
class="mt-2 text-4xl font-extrabold text-[#2E3192]">


Rp {{ number_format($program->training_fee,0,',','.') }}


</h2>





<p
class="mt-2 text-sm text-slate-500">


Biaya Pendaftaran


<span class="font-bold text-[#ED1C24]">


Rp {{ number_format($program->registration_fee,0,',','.') }}


</span>


</p>



</div>







{{-- FEATURES --}}

<div class="mt-8 space-y-4">



<div class="flex gap-3">

<i class="bi bi-check-circle-fill text-xl text-[#2E3192]"></i>

<span>{{ $program->training_days }}</span>

</div>





<div class="flex gap-3">

<i class="bi bi-check-circle-fill text-xl text-[#2E3192]"></i>

<span>{{ $program->training_hours }}</span>

</div>





<div class="flex gap-3">

<i class="bi bi-check-circle-fill text-xl text-[#2E3192]"></i>

<span>

Durasi {{ $program->duration }}

</span>

</div>





<div class="flex gap-3">

<i class="bi bi-check-circle-fill text-xl text-[#2E3192]"></i>

<span>

Modul Bahasa Korea

</span>

</div>





<div class="flex gap-3">

<i class="bi bi-check-circle-fill text-xl text-[#2E3192]"></i>

<span>

Simulasi EPS-TOPIK

</span>

</div>





<div class="flex gap-3">

<i class="bi bi-check-circle-fill text-xl text-[#2E3192]"></i>

<span>

Pendampingan Hingga Berangkat

</span>

</div>



</div>









{{-- BUTTON --}}

<a
href="{{ route('registration.create',$program->id) }}"
class="mt-10 flex items-center justify-center rounded-2xl bg-[#2E3192] py-4 text-lg font-bold text-white transition duration-300 hover:-translate-y-1 hover:bg-[#252879]">


Daftar Program


<i class="bi bi-arrow-right ms-3"></i>


</a>






</div>




</div>




@endforeach




</div>


</div>


</section>