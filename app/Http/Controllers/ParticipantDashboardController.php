<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ParticipantDashboardController extends Controller
{
    /**
     * Dashboard Peserta.
     */
    public function index(): View
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Ambil Pendaftaran Milik Peserta
        |--------------------------------------------------------------------------
        |
        | Untuk sementara kepemilikan masih berdasarkan email karena
        | tabel registrations belum memiliki user_id.
        |
        */

        $registrations = Registration::query()
            ->with([
                'program',
                'documents',
            ])
            ->where('email', $user->email)
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Latest Registration
        |--------------------------------------------------------------------------
        */

        $latestRegistration =
            $registrations->first();


        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalRegistrations =
            $registrations->count();


        $paidRegistrations =
            $registrations
                ->where(
                    'payment_status',
                    'paid'
                )
                ->count();


        $waitingRegistrations =
            $registrations
                ->where(
                    'payment_status',
                    'waiting_verification'
                )
                ->count();


        $rejectedRegistrations =
            $registrations
                ->where(
                    'payment_status',
                    'rejected'
                )
                ->count();


        $unpaidRegistrations =
            $registrations
                ->where(
                    'payment_status',
                    'unpaid'
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | Document Statistics
        |--------------------------------------------------------------------------
        */

        $totalDocuments =
            $registrations
                ->sum(
                    fn ($registration) =>
                        $registration->documents->count()
                );


        /*
        |--------------------------------------------------------------------------
        | Return Dashboard
        |--------------------------------------------------------------------------
        */

        return view(
            'participant.dashboard',
            compact(
                'user',
                'registrations',
                'latestRegistration',
                'totalRegistrations',
                'paidRegistrations',
                'waitingRegistrations',
                'rejectedRegistrations',
                'unpaidRegistrations',
                'totalDocuments'
            )
        );
    }
}