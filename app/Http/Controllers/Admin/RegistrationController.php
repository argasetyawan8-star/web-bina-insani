<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    public function index(Request $request)
{

    $query = Registration::with('program');


    // pencarian nama
    if ($request->search) {

        $query->where(
            'full_name',
            'like',
            '%' . $request->search . '%'
        );

    }



    // filter pembayaran
    if ($request->payment_status) {

        $query->where(
            'payment_status',
            $request->payment_status
        );

    }



    // filter status peserta
    if ($request->status) {

        $query->where(
            'status',
            $request->status
        );

    }



    // filter program
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



    $programs = \App\Models\Program::all();



    return view(
        'admin.registrations.index',
        compact(
            'registrations',
            'programs'
        )
    );

}



    public function show($id)
    {

        $registration = Registration::with([
            'program',
            'payment'
        ])
        ->findOrFail($id);


        return view(
            'admin.registrations.show',
            compact('registration')
        );

    }

    public function verify($id)
{

    $registration = Registration::findOrFail($id);


    $registration->update([

        'status' => 'verified'

    ]);


    return back()->with(
        'success',
        'Peserta berhasil diverifikasi'
    );

}

}