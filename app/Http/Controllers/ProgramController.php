<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\View\View;

class ProgramController extends Controller
{
    /**
     * Menampilkan seluruh program aktif.
     */
    public function index(): View
    {
        $programs = Program::query()
            ->where('is_active', true)
            ->latest()
            ->get();

        return view(
            'programs.index',
            compact('programs')
        );
    }

    /**
     * Menampilkan detail program.
     */
    public function show(Program $program): View
    {
        abort_unless(
            $program->is_active,
            404
        );

        return view(
            'programs.show',
            compact('program')
        );
    }
}