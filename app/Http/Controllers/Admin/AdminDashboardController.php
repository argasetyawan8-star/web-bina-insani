<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Program;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {

        $totalPeserta = Registration::count();


        $pesertaPaid = Registration::where(
            'payment_status',
            'paid'
        )->count();


        $pesertaUnpaid = Registration::where(
            'payment_status',
            'unpaid'
        )->count();


        $programAktif = Program::where(
            'is_active',
            true
        )->count();


        $recentRegistrations = Registration::with('program')
            ->latest()
            ->take(5)
            ->get();



        return view(
            'admin.dashboard',
            compact(
                'totalPeserta',
                'pesertaPaid',
                'pesertaUnpaid',
                'programAktif',
                'recentRegistrations'
            )
        );

    }
}


