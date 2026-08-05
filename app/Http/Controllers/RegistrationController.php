<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\RegistrationRequest;
use App\Services\RegistrationService;

class RegistrationController extends Controller
{
    protected RegistrationService $registrationService;

    public function __construct(
        RegistrationService $registrationService
    ) {
        $this->registrationService = $registrationService;
    }

    /**
     * Halaman Form Pendaftaran
     */
    public function create(Program $program)
    {
        return view('registration.index', compact('program'));
    }

    /**
     * Simpan Pendaftaran
     */
    public function store(RegistrationRequest $request)
{
    $registration = $this->registrationService->store(
        $request->validated()
    );

    return redirect()->route(
        'payment.index',
        $registration
    );
}

    /**
     * Halaman Pembayaran
     */
    public function payment($id)
    {
        $registration = $this->registrationService
            ->findById($id);

        return view(
            'registration.payment',
            compact('registration')
        );
    }

    /**
     * Success
     */
    public function success($id)
    {
        $registration = $this->registrationService
            ->findById($id);

        return view(
            'registration.success',
            compact('registration')
        );
    }
}