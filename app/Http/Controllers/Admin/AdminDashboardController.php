<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Registration;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        /*
        |--------------------------------------------------------------------------
        | STATISTIK PESERTA
        |--------------------------------------------------------------------------
        */

        $totalPeserta = Registration::count();

        $menungguVerifikasi = Registration::where(
            'payment_status',
            'waiting_verification'
        )->count();

        $pesertaPaid = Registration::where(
            'payment_status',
            'paid'
        )->count();

        $pesertaRejected = Registration::where(
            'payment_status',
            'rejected'
        )->count();

        $pesertaUnpaid = Registration::where(function ($query) {
            $query->whereNull('payment_status')
                ->orWhere('payment_status', 'unpaid');
        })->count();

        $pesertaVerified = Registration::where(
            'status',
            'verified'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | PROGRAM AKTIF
        |--------------------------------------------------------------------------
        */

        $programAktif = Program::where(
            'is_active',
            true
        )->count();


        /*
        |--------------------------------------------------------------------------
        | PENDAFTARAN TERBARU
        |--------------------------------------------------------------------------
        */

        $recentRegistrations = Registration::with('program')
            ->latest()
            ->take(8)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | STATISTIK PROGRAM
        |--------------------------------------------------------------------------
        */

        $programStats = Program::query()
            ->withCount('registrations')
            ->where('is_active', true)
            ->orderByDesc('registrations_count')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | DATA DONUT CHART
        |--------------------------------------------------------------------------
        */

        $statusChart = [
            'labels' => [
                'Belum Bayar',
                'Menunggu Verifikasi',
                'Lunas',
                'Ditolak',
            ],

            'data' => [
                $pesertaUnpaid,
                $menungguVerifikasi,
                $pesertaPaid,
                $pesertaRejected,
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | DATA BAR CHART
        |--------------------------------------------------------------------------
        */

        $programChart = [
            'labels' => $programStats
                ->pluck('name')
                ->values()
                ->toArray(),

            'data' => $programStats
                ->pluck('registrations_count')
                ->values()
                ->toArray(),
        ];


        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view('admin.dashboard', compact(
            'totalPeserta',
            'menungguVerifikasi',
            'pesertaPaid',
            'pesertaRejected',
            'pesertaUnpaid',
            'pesertaVerified',
            'programAktif',
            'recentRegistrations',
            'programStats',
            'statusChart',
            'programChart'
        ));
    }
}