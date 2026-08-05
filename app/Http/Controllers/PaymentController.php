<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Services\MidtransService;

class PaymentController extends Controller
{
    protected MidtransService $midtransService;

    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }

    /**
     * Halaman pembayaran
     */
    public function index(Registration $registration)
    {
        $snapToken = $this->midtransService
            ->createSnapToken($registration);

        return view('registration.payment', compact(
            'registration',
            'snapToken'
        ));
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