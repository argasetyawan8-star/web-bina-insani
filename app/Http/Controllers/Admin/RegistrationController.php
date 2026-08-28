<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Program;
use Illuminate\Http\Request;


class RegistrationController extends Controller
{
    /**
     * Daftar seluruh pendaftaran
     */
    public function index(Request $request)
    {
        $query = Registration::with('program');

        // Pencarian nama
        if ($request->search) {
            $query->where(
                'full_name',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter pembayaran
        if ($request->payment_status) {
            $query->where(
                'payment_status',
                $request->payment_status
            );
        }

        // Filter status peserta
        if ($request->status) {
            $query->where(
                'status',
                $request->status
            );
        }

        // Filter program
        if ($request->program_id) {
            $query->where(
                'program_id',
                $request->program_id
            );
        }

        $registrations = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $programs = Program::all();

        return view(
            'admin.registrations.index',
            compact(
                'registrations',
                'programs'
            )
        );
    }

    /**
     * Detail pendaftaran
     */
    public function show($id)
{
    $registration = Registration::with([
        'program',
        'documents',
    ])->findOrFail($id);

    return view('admin.registrations.show', compact('registration'));
}

    /**
     * Verifikasi data peserta
     */
    public function verify($id)
    {
        $registration = Registration::findOrFail($id);

        $registration->update([
            'status' => 'verified',
        ]);

        return back()->with(
            'success',
            'Peserta berhasil diverifikasi.'
        );
    }

    /**
     * Approve pembayaran
     */
    public function approvePayment($id)
    {
        $registration = Registration::findOrFail($id);

        // Pastikan pembayaran memang sedang menunggu verifikasi
        if ($registration->payment_status !== 'waiting_verification') {
            return back()->with(
                'error',
                'Pembayaran tidak sedang menunggu verifikasi.'
            );
        }

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
     * Tolak pembayaran
     */
    public function rejectPayment($id)
    {
        $registration = Registration::findOrFail($id);

        // Pastikan pembayaran memang sedang menunggu verifikasi
        if ($registration->payment_status !== 'waiting_verification') {
            return back()->with(
                'error',
                'Pembayaran tidak sedang menunggu verifikasi.'
            );
        }

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
