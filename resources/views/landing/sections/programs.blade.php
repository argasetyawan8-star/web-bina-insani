<section id="programs" class="py-24 bg-slate-50">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        {{-- Heading --}}
        <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">

            <span class="inline-flex rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">
                Program Pelatihan
            </span>

            <h2 class="mt-6 text-4xl font-bold text-slate-900">
                Pilih Program yang Sesuai dengan Kebutuhanmu
            </h2>

            <p class="mt-5 text-lg text-slate-600">
                Bina Insani menyediakan dua pilihan program pelatihan Bahasa Korea
                untuk mempersiapkan peserta menghadapi ujian EPS-TOPIK dan bekerja
                di Korea Selatan.
            </p>

        </div>

        {{-- Cards --}}
        <div class="mt-20 grid lg:grid-cols-2 gap-10">

    @foreach ($programs as $program)

        <div
            class="rounded-3xl bg-white border border-slate-200 shadow-xl p-10 hover:-translate-y-2 transition">

            <h2 class="text-3xl font-bold">

                {{ $program->name }}

            </h2>

            <div class="mt-8">

                <p class="text-slate-500">

                    Biaya Pendaftaran

                </p>

                <h3 class="text-xl font-bold">

                    Rp {{ number_format($program->registration_fee,0,',','.') }}

                </h3>

            </div>

            <div class="mt-5">

                <p class="text-slate-500">

                    Biaya Pelatihan

                </p>

                <h3 class="text-3xl font-bold text-blue-600">

                    Rp {{ number_format($program->training_fee,0,',','.') }}

                </h3>

            </div>

            <div class="mt-8 space-y-4">

                <div>

                    <strong>Hari</strong>

                    <br>

                    {{ $program->training_days }}

                </div>

                <div>

                    <strong>Jam</strong>

                    <br>

                    {{ $program->training_hours }}

                </div>

                <div>

                    <strong>Durasi</strong>

                    <br>

                    {{ $program->duration }}

                </div>

            </div>

            <p class="mt-8 text-slate-600">

                {{ $program->description }}

            </p>

           <a
    href="{{ route('registration.create', ['program' => $program->id]) }}"
    class="mt-10 block rounded-2xl bg-blue-600 py-4 text-center font-semibold text-white">

    Daftar Sekarang

</a>

        </div>

    @endforeach

</div>

            </div>

        </div>

    </div>

</section>