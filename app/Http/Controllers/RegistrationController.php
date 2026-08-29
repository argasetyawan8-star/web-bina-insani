<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Program;
use App\Services\RegistrationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    protected RegistrationService $registrationService;

    public function __construct(
        RegistrationService $registrationService
    ) {
        $this->registrationService = $registrationService;
    }


    /**
     * Halaman Form Pendaftaran.
     */
    public function create(Program $program): View
    {
        /*
        |--------------------------------------------------------------------------
        | Pastikan Program Masih Aktif
        |--------------------------------------------------------------------------
        */

        abort_unless(
            $program->is_active,
            404
        );


        return view(
            'registration.index',
            compact('program')
        );
    }


    /**
     * Simpan Pendaftaran.
     */
    public function store(
        RegistrationRequest $request
    ): RedirectResponse {

        /*
        |--------------------------------------------------------------------------
        | Get Validated Data
        |--------------------------------------------------------------------------
        */

        $validated = $request->validated();


        /*
        |--------------------------------------------------------------------------
        | Force Program
        |--------------------------------------------------------------------------
        */

        $program = Program::query()
            ->whereKey($validated['program_id'])
            ->where('is_active', true)
            ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Force Authenticated Participant Email
        |--------------------------------------------------------------------------
        |
        | Email tidak dipercaya dari request browser.
        | Selalu gunakan email akun yang sedang login.
        |
        */

        $validated['email'] =
            Auth::user()->email;


        /*
        |--------------------------------------------------------------------------
        | Store Registration
        |--------------------------------------------------------------------------
        */

        $registration =
            $this->registrationService->store(
                $validated
            );


        /*
        |--------------------------------------------------------------------------
        | Redirect To Payment
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'payment.index',
                [
                    'registration' =>
                        $registration->id,
                ]
            )
            ->with(
                'success',
                'Pendaftaran berhasil disimpan. Silakan lanjutkan ke pembayaran.'
            );
    }


    /**
     * Halaman Pembayaran.
     *
     * Method ini tetap dipertahankan untuk kompatibilitas
     * dengan struktur lama project.
     */
    public function payment(int $id): View
    {
        $registration =
            $this->registrationService
                ->findById($id);

        return view(
            'registration.payment',
            compact('registration')
        );
    }


    /**
     * Halaman Success.
     *
     * Method ini tetap dipertahankan untuk kompatibilitas
     * dengan struktur lama project.
     */
    public function success(int $id): View
    {
        $registration =
            $this->registrationService
                ->findById($id);

        return view(
            'registration.success',
            compact('registration')
        );
    }
}