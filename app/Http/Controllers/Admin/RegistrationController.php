<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    /**
     * Daftar seluruh pendaftaran.
     */
    public function index(Request $request): View
    {
        $query = Registration::with('program');


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                $q->where(
                    'full_name',
                    'like',
                    '%' . $search . '%'
                )
                ->orWhere(
                    'registration_code',
                    'like',
                    '%' . $search . '%'
                )
                ->orWhere(
                    'email',
                    'like',
                    '%' . $search . '%'
                )
                ->orWhere(
                    'nik',
                    'like',
                    '%' . $search . '%'
                );

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Filter Payment Status
        |--------------------------------------------------------------------------
        */

        if ($request->filled('payment_status')) {

            $query->where(
                'payment_status',
                $request->payment_status
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Filter Registration Status
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Filter Program
        |--------------------------------------------------------------------------
        */

        if ($request->filled('program_id')) {

            $query->where(
                'program_id',
                $request->program_id
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $registrations = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Program List
        |--------------------------------------------------------------------------
        */

        $programs = Program::query()
            ->orderBy('name')
            ->get();


        return view(
            'admin.registrations.index',
            compact(
                'registrations',
                'programs'
            )
        );
    }


    /**
     * Detail pendaftaran.
     */
    public function show(int $id): View
    {
        $registration = Registration::with([
            'program',
            'documents',
        ])->findOrFail($id);


        return view(
            'admin.registrations.show',
            compact('registration')
        );
    }


    /**
     * Verifikasi data peserta.
     */
    public function verify(int $id): RedirectResponse
    {
        $registration = Registration::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Cegah verifikasi ulang
        |--------------------------------------------------------------------------
        */

        if ($registration->status === 'verified') {

            return back()->with(
                'error',
                'Peserta sudah terverifikasi.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Update Status
        |--------------------------------------------------------------------------
        */

        $registration->update([
            'status' => 'verified',
        ]);


        return back()->with(
            'success',
            'Peserta berhasil diverifikasi.'
        );
    }


    /**
     * Approve pembayaran.
     */
    public function approvePayment(
        Registration $registration
    ): RedirectResponse {

        /*
        |--------------------------------------------------------------------------
        | Pastikan Status Menunggu Verifikasi
        |--------------------------------------------------------------------------
        */

        if (
            $registration->payment_status !==
            'waiting_verification'
        ) {

            return back()->with(
                'error',
                'Pembayaran tidak sedang menunggu verifikasi.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Pastikan Bukti Pembayaran Ada
        |--------------------------------------------------------------------------
        */

        if (empty($registration->payment_proof)) {

            return back()->with(
                'error',
                'Bukti pembayaran belum tersedia.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Approve
        |--------------------------------------------------------------------------
        */

        $registration->update([
            'payment_status' => 'paid',
            'paid_at' => now(),
        ]);


        return back()->with(
            'success',
            'Pembayaran berhasil diverifikasi dan dinyatakan lunas.'
        );
    }


    /**
     * Tolak pembayaran.
     */
    public function rejectPayment(
        Registration $registration
    ): RedirectResponse {

        /*
        |--------------------------------------------------------------------------
        | Pastikan Status Menunggu Verifikasi
        |--------------------------------------------------------------------------
        */

        if (
            $registration->payment_status !==
            'waiting_verification'
        ) {

            return back()->with(
                'error',
                'Pembayaran tidak sedang menunggu verifikasi.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Reject
        |--------------------------------------------------------------------------
        */

        $registration->update([
            'payment_status' => 'rejected',
            'paid_at' => null,
        ]);


        return back()->with(
            'success',
            'Pembayaran berhasil ditolak.'
        );
    }
}