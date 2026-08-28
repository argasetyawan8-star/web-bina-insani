<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Halaman pembayaran
     */
    public function index(Registration $registration)
    {
        return view(
            'registration.payment',
            compact('registration')
        );
    }

    /**
     * Simpan pembayaran manual
     */
    public function store(
        Request $request,
        Registration $registration
    ) {
        /*
        |--------------------------------------------------------------------------
        | Validasi
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'payment_method' => [
                'required',
                'in:qris,transfer',
            ],

            'payment_proof' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ], [
            'payment_method.required' =>
                'Silakan pilih metode pembayaran.',

            'payment_method.in' =>
                'Metode pembayaran tidak valid.',

            'payment_proof.required' =>
                'Bukti pembayaran wajib diupload.',

            'payment_proof.image' =>
                'File bukti pembayaran harus berupa gambar.',

            'payment_proof.mimes' =>
                'Bukti pembayaran harus berformat JPG, JPEG, atau PNG.',

            'payment_proof.max' =>
                'Ukuran bukti pembayaran maksimal 2 MB.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Hapus Bukti Pembayaran Lama
        |--------------------------------------------------------------------------
        */

        if (!empty($registration->payment_proof)) {

            Storage::disk('public')->delete(
                $registration->payment_proof
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Upload Bukti Pembayaran Baru
        |--------------------------------------------------------------------------
        */

        $paymentProof = $request
            ->file('payment_proof')
            ->store(
                'payment-proofs',
                'public'
            );

        /*
        |--------------------------------------------------------------------------
        | Simpan Data Pembayaran
        |--------------------------------------------------------------------------
        */

        $registration->update([
            'payment_method' => $validated['payment_method'],
            'payment_proof' => $paymentProof,
            'payment_status' => 'waiting_verification',
            'paid_at' => null,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'payment.success',
                [
                    'registration' => $registration->id,
                ]
            )
            ->with(
                'success',
                'Bukti pembayaran berhasil dikirim dan sedang menunggu verifikasi admin.'
            );
    }

    /**
     * Halaman sukses
     */
    public function success(Registration $registration)
    {
        return view(
            'registration.success',
            compact('registration')
        );
    }
}
