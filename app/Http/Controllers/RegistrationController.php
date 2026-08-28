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
        return view(
            'registration.index',
            compact('program')
        );
    }

    /**
     * Simpan Pendaftaran
     */
    public function store(RegistrationRequest $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Ambil data yang sudah divalidasi
        |--------------------------------------------------------------------------
        |
        | Karena kita sudah menggunakan RegistrationRequest,
        | tidak perlu melakukan validate() kedua kali di sini.
        |
        */

        $validated = $request->validated();

        /*
        |--------------------------------------------------------------------------
        | Simpan Registration + Dokumen
        |--------------------------------------------------------------------------
        */

        $registration = $this->registrationService->store(
            $validated
        );

        /*
        |--------------------------------------------------------------------------
        | Redirect ke Halaman Pembayaran
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'payment.index',
                ['registration' => $registration->id]
            )
            ->with(
                'success',
                'Pendaftaran berhasil disimpan. Silakan lanjutkan ke pembayaran.'
            );
    }

    /**
     * Halaman Pembayaran
     */
    public function payment($id)
    {
        $registration = $this->registrationService
            ->findById((int) $id);

        return view(
            'registration.payment',
            compact('registration')
        );
    }

    /**
     * Halaman Success
     */
    public function success($id)
    {
        $registration = $this->registrationService
            ->findById((int) $id);

        return view(
            'registration.success',
            compact('registration')
        );
    }
}
