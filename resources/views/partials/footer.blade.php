{{-- FOOTER BACKGROUND --}}
<footer class="relative overflow-hidden bg-[#0F172A] text-white">


{{-- Decoration --}}
<div class="absolute -left-40 top-0 h-96 w-96 rounded-full bg-[#2E3192]/40 blur-3xl"></div>

<div class="absolute right-0 bottom-0 h-[450px] w-[450px] rounded-full bg-[#F6D21A]/20 blur-3xl"></div>



<div class="relative mx-auto max-w-7xl px-6 pt-20 pb-10 lg:px-8">


<div class="grid gap-12 lg:grid-cols-4">



{{-- BRAND --}}
<div>


<div class="flex items-center gap-4">


<div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white p-2 shadow-lg">


<img
src="{{ asset('storage/'.setting('logo')) }}"
alt="Logo"
class="h-full w-full object-contain">


</div>



<div>


<h3 class="text-2xl font-extrabold">

{{ setting('website_name','Bina Insani') }}

</h3>


<p class="text-sm text-slate-400">

Migrant Training Center

</p>


</div>


</div>




<p class="mt-6 leading-8 text-slate-300">


Lembaga pelatihan Bahasa Korea dan persiapan EPS-TOPIK
untuk membantu calon pekerja Indonesia meraih peluang
karier internasional.


</p>




{{-- SOCIAL --}}
<div class="mt-8 flex gap-3">


<a
href="{{ setting('facebook') }}"
class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/10 transition hover:bg-[#2E3192]">


<i class="bi bi-facebook text-xl"></i>


</a>



<a
href="{{ setting('instagram') }}"
class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/10 transition hover:bg-pink-600">


<i class="bi bi-instagram text-xl"></i>


</a>



<a
href="{{ setting('youtube') }}"
class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/10 transition hover:bg-red-600">


<i class="bi bi-youtube text-xl"></i>


</a>



<a
href="{{ setting('tiktok') }}"
class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/10 transition hover:bg-black">


<i class="bi bi-tiktok text-xl"></i>


</a>


</div>


</div>






{{-- MENU --}}
<div>


<h4 class="mb-6 text-xl font-bold">

Menu

</h4>


<ul class="space-y-4 text-slate-300">


<li>
<a href="#home"
class="transition hover:text-[#F6D21A]">

Beranda

</a>
</li>


<li>
<a href="#about"
class="transition hover:text-[#F6D21A]">

Tentang Kami

</a>
</li>


<li>
<a href="#programs"
class="transition hover:text-[#F6D21A]">

Program

</a>
</li>


<li>
<a href="#process"
class="transition hover:text-[#F6D21A]">

Alur Pendaftaran

</a>
</li>


<li>
<a href="#faq"
class="transition hover:text-[#F6D21A]">

FAQ

</a>
</li>


<li>
<a href="#contact"
class="transition hover:text-[#F6D21A]">

Kontak

</a>
</li>


</ul>


</div>






{{-- PROGRAM --}}
<div>


<h4 class="mb-6 text-xl font-bold">

Program

</h4>


<ul class="space-y-4 text-slate-300">


<li>Diklat Intensif</li>

<li>Diklat Reguler</li>

<li>Persiapan EPS-TOPIK</li>

<li>Konsultasi Keberangkatan</li>

<li>Pendampingan Administrasi</li>


</ul>


</div>






{{-- CONTACT --}}
<div>


<h4 class="mb-6 text-xl font-bold">

Hubungi Kami

</h4>


<div class="space-y-5 text-slate-300">



<div class="flex gap-3">


<i class="bi bi-geo-alt-fill text-[#F6D21A]"></i>


<span>

{{ setting('address') }}

</span>


</div>



<div class="flex gap-3">


<i class="bi bi-envelope-fill text-[#F6D21A]"></i>


<span>

{{ setting('email') }}

</span>


</div>




<div class="flex gap-3">


<i class="bi bi-whatsapp text-[#F6D21A]"></i>


<span>

{{ setting('phone') }}

</span>


</div>




<div class="flex gap-3">


<i class="bi bi-clock-fill text-[#F6D21A]"></i>


<span>

Senin - Sabtu
<br>
08.00 - 17.00 WIB

</span>


</div>


</div>



</div>



</div>






{{-- CTA --}}
<div
class="mt-16 rounded-3xl bg-[#2E3192] p-8 text-center">


<h3 class="text-2xl font-bold">

Siap Memulai Perjalanan ke Korea?

</h3>


<p class="mt-3 text-blue-100">

Daftar sekarang dan persiapkan masa depanmu bersama Bina Insani.

</p>


<a
href="#programs"
class="mt-5 inline-flex rounded-xl bg-[#F6D21A] px-7 py-3 font-bold text-[#1E293B] transition hover:scale-105">


Mulai Daftar


</a>


</div>






{{-- Divider --}}
<div class="my-10 h-px bg-white/10"></div>





{{-- Copyright --}}
<div class="text-center text-sm text-slate-400">


{{ setting('copyright','© '.date('Y').' Bina Insani. All Rights Reserved.') }}


</div>



</div>


</footer>