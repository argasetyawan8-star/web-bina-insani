<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(Request $request)
{
    $query = Program::query();

    if ($request->search) {

        $query->where(
            'name',
            'like',
            '%'.$request->search.'%'
        );

    }

    $programs = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view(
        'admin.programs.index',
        compact('programs')
    );
}

    public function store(Request $request)
{
    $request->validate([

        'name' => 'required',

        'registration_fee' => 'required|numeric',

        'training_fee' => 'required|numeric',

        'training_days' => 'required',

        'training_hours' => 'required',

        'duration' => 'required',

        'description' => 'nullable',

    ]);

    Program::create([

        'name' => $request->name,

        'registration_fee' => $request->registration_fee,

        'training_fee' => $request->training_fee,

        'training_days' => $request->training_days,

        'training_hours' => $request->training_hours,

        'duration' => $request->duration,

        'description' => $request->description,

        'is_active' => true,

    ]);

    return redirect()
        ->route('admin.programs.index')
        ->with(
            'success',
            'Program berhasil ditambahkan.'
        );
}

public function update(Request $request, Program $program)
{
    $request->validate([

        'name' => 'required',

        'registration_fee' => 'required|numeric',

        'training_fee' => 'required|numeric',

        'training_days' => 'required',

        'training_hours' => 'required',

        'duration' => 'required',

        'description' => 'nullable',

        'is_active' => 'required',

    ]);

    $program->update([

        'name' => $request->name,

        'registration_fee' => $request->registration_fee,

        'training_fee' => $request->training_fee,

        'training_days' => $request->training_days,

        'training_hours' => $request->training_hours,

        'duration' => $request->duration,

        'description' => $request->description,

        'is_active' => $request->is_active,

    ]);

    return redirect()
        ->route('admin.programs.index')
        ->with(
            'success',
            'Program berhasil diperbarui.'
        );
}

public function destroy(Program $program)
{
    if ($program->registrations()->count() > 0) {

        return back()->with(
            'error',
            'Program tidak bisa dihapus karena sudah memiliki peserta.'
        );

    }

    $program->delete();

    return back()->with(
        'success',
        'Program berhasil dihapus.'
    );
}

public function create()
{
    return view('admin.programs.create');
}

public function edit(Program $program)
{
    return view('admin.programs.edit', compact('program'));
}

}