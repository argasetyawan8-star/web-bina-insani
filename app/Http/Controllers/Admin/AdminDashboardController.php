<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Program;

class AdminDashboardController extends Controller
{
    public function index()
    {

        // Total seluruh pendaftar
        $totalPeserta = Registration::count();


        // Menunggu admin cek bukti pembayaran
        $menungguVerifikasi = Registration::where(
            'payment_status',
            'waiting_verification'
        )->count();


        // Pembayaran sudah diterima
        $pesertaPaid = Registration::where(
            'payment_status',
            'paid'
        )->count();


        // Peserta sudah diverifikasi admin
        $pesertaVerified = Registration::where(
            'status',
            'verified'
        )->count();


        // Program aktif
        $programAktif = Program::where(
            'is_active',
            true
        )->count();



        // 5 pendaftar terbaru
        $recentRegistrations = Registration::with('program')
            ->latest()
            ->take(5)
            ->get();



        // Statistik jumlah peserta tiap program
        $programStats = Program::withCount('registrations')
            ->get();



        return view(
            'admin.dashboard',
            compact(
                'totalPeserta',
                'menungguVerifikasi',
                'pesertaPaid',
                'pesertaVerified',
                'programAktif',
                'recentRegistrations',
                'programStats'
            )
        );

    }
}