<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::with('program');

        // Pencarian nama peserta
        if ($request->search) {
            $query->where(
                'full_name',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter status pembayaran
        if ($request->payment_status) {
            $query->where(
                'payment_status',
                $request->payment_status
            );
        }

        $payments = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Statistik
        $waiting = Registration::where(
            'payment_status',
            'waiting_verification'
        )->count();

        $paid = Registration::where(
            'payment_status',
            'paid'
        )->count();

        $rejected = Registration::where(
            'payment_status',
            'rejected'
        )->count();

        $total = Registration::count();

        return view(
            'admin.payments.index',
            compact(
                'payments',
                'waiting',
                'paid',
                'rejected',
                'total'
            )
        );
    }

  public function show($id)
{
    $registration = \App\Models\Registration::with('program')
        ->findOrFail($id);

    return view(
        'admin.payments.show',
        compact('registration')
    );
}
}