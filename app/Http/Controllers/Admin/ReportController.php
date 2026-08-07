<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Registration;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\RegistrationsExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::with('program');

        if ($request->program_id) {
            $query->where('program_id', $request->program_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->payment_status) {
            $query->where('payment_status', $request->payment_status);
        }

        if ($request->date_from && $request->date_to) {
            $query->whereBetween('created_at', [
                $request->date_from,
                $request->date_to
            ]);
        }

        $registrations = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $programs = Program::all();

        return view(
            'admin.reports.index',
            compact(
                'registrations',
                'programs'
            )
        );
    }

    public function exportPdf(Request $request)
{
    $query = Registration::with('program');

    if ($request->program_id) {

        $query->where(
            'program_id',
            $request->program_id
        );

    }

    if ($request->payment_status) {

        $query->where(
            'payment_status',
            $request->payment_status
        );

    }

    if ($request->status) {

        $query->where(
            'status',
            $request->status
        );

    }

    if ($request->date_from && $request->date_to) {

        $query->whereBetween(
            'created_at',
            [
                $request->date_from,
                $request->date_to
            ]
        );

    }

    $registrations = $query
        ->latest()
        ->get();

    $pdf = Pdf::loadView(
        'admin.reports.pdf',
        compact('registrations')
    );

    return $pdf->download('laporan-peserta.pdf');
}

public function exportExcel(Request $request)
{
    $query = Registration::query();

    if ($request->program_id) {

        $query->where(
            'program_id',
            $request->program_id
        );

    }

    if ($request->payment_status) {

        $query->where(
            'payment_status',
            $request->payment_status
        );

    }

    if ($request->status) {

        $query->where(
            'status',
            $request->status
        );

    }

    if ($request->date_from && $request->date_to) {

        $query->whereBetween(
            'created_at',
            [
                $request->date_from,
                $request->date_to
            ]
        );

    }

    return Excel::download(
        new RegistrationsExport($query),
        'laporan-peserta.xlsx'
    );
}
}