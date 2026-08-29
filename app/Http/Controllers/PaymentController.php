<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Halaman pembayaran.
     */
    public function index(Registration $registration): View
    {
        /*
        |--------------------------------------------------------------------------
        | Pastikan Pendaftaran Milik Peserta yang Sedang Login
        |--------------------------------------------------------------------------
        */

        $this->ensureOwnership($registration);


        /*
        |--------------------------------------------------------------------------
        | Jika Sudah Lunas
        |--------------------------------------------------------------------------
        |
        | Peserta tidak perlu mengirim bukti pembayaran lagi.
        |
        */

        if ($registration->payment_status === 'paid') {
            return redirect()
                ->route('dashboard')
                ->with(
                    'success',
                    'Pendaftaran ini sudah memiliki status pembayaran lunas.'
                );
        }


        return view(
            'registration.payment',
            compact('registration')
        );
    }


    /**
     * Simpan pembayaran manual.
     */
    public function store(
        Request $request,
        Registration $registration
    ): RedirectResponse {

        /*
        |--------------------------------------------------------------------------
        | Pastikan Pendaftaran Milik Peserta
        |--------------------------------------------------------------------------
        */

        $this->ensureOwnership($registration);


        /*
        |--------------------------------------------------------------------------
        | Jika Sudah Lunas
        |--------------------------------------------------------------------------
        */

        if ($registration->payment_status === 'paid') {
            return redirect()
                ->route('dashboard')
                ->with(
                    'success',
                    'Pendaftaran ini sudah memiliki pembayaran yang lunas.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Validasi
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [
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
            ],
            [
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
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Hapus Bukti Pembayaran Lama
        |--------------------------------------------------------------------------
        */

        if (!empty($registration->payment_proof)) {

            if (
                Storage::disk('public')->exists(
                    $registration->payment_proof
                )
            ) {
                Storage::disk('public')->delete(
                    $registration->payment_proof
                );
            }
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
            'payment_method' =>
                $validated['payment_method'],

            'payment_proof' =>
                $paymentProof,

            'payment_status' =>
                'waiting_verification',

            'paid_at' =>
                null,
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
                    'registration' =>
                        $registration->id,
                ]
            )
            ->with(
                'success',
                'Bukti pembayaran berhasil dikirim dan sedang menunggu verifikasi admin.'
            );
    }


    /**
     * Halaman sukses.
     */
    public function success(
        Registration $registration
    ): View {

        /*
        |--------------------------------------------------------------------------
        | Pastikan Pendaftaran Milik Peserta
        |--------------------------------------------------------------------------
        */

        $this->ensureOwnership($registration);


        return view(
            'registration.success',
            compact('registration')
        );
    }


    /**
     * Pastikan registration milik user yang sedang login.
     */
    private function ensureOwnership(
        Registration $registration
    ): void {

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Ownership Berdasarkan Email
        |--------------------------------------------------------------------------
        |
        | Karena tabel registrations saat ini belum memiliki user_id,
        | hubungan peserta masih menggunakan email.
        |
        */

        abort_unless(
            $user &&
            $registration->email === $user->email,
            403,
            'Anda tidak memiliki akses ke pendaftaran ini.'
        );
    }
}