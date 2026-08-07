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
    public function store(Request $request, Registration $registration)
{
    $request->validate([
        'payment_method' => 'required|in:qris,transfer',
        'payment_proof'  => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $paymentProof = $request->file('payment_proof')
        ->store('payment-proofs', 'public');

    $registration->update([
        'payment_method' => $request->payment_method,
        'payment_proof' => $paymentProof,
        'payment_status' => 'waiting_verification',
        'paid_at' => now(),
    ]);

    return redirect()
        ->route('payment.success', $registration)
        ->with('success', 'Bukti pembayaran berhasil dikirim.');
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