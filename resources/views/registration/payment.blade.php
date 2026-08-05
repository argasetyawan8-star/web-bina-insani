
@extends('layouts.app')
@section('content')

<div class="max-w-3xl mx-auto py-16">

    <div class="bg-white rounded-3xl shadow-lg p-10">

        <h1 class="text-3xl font-bold">

            Pembayaran Pendaftaran

        </h1>

        <p class="text-slate-500 mt-3">

            Silakan lakukan pembayaran biaya pendaftaran.

        </p>

        <div class="mt-10 space-y-4">

            <div class="flex justify-between">

                <span>Nomor Pendaftaran</span>

                <strong>

                    {{ $registration->registration_code }}

                </strong>

            </div>

            <div class="flex justify-between">

                <span>Nama Peserta</span>

                <strong>

                    {{ $registration->full_name }}

                </strong>

            </div>

            <div class="flex justify-between">

                <span>Program</span>

                <strong>

                    {{ $registration->program->name }}

                </strong>

            </div>

            <div class="flex justify-between">

                <span>Biaya Pendaftaran</span>

                <strong>

                    Rp {{ number_format($registration->program->registration_fee,0,',','.') }}

                </strong>

            </div>

        </div>

        <button id="pay-button"
            class="mt-10 w-full bg-blue-600 text-white py-4 rounded-xl">

            Bayar Sekarang

        </button>

        <script

src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('midtrans.client_key') }}">


</script>

        <script>

document
.getElementById('pay-button')
.addEventListener('click', function () {

    snap.pay('{{ $snapToken }}', {

        onSuccess: function(result){

            window.location.href =
            "{{ route('payment.success',$registration) }}";

        },

        onPending: function(result){

            alert('Menunggu pembayaran.');

        },

        onError: function(result){

            alert('Pembayaran gagal.');

        },

        onClose: function(){

            alert('Anda menutup popup pembayaran.');

        }

    });

});

</script>

    </div>

</div>


@endsection
