<?php

namespace App\Http\Controllers;

use App\Models\Program;

class LandingController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)->get();

        return view('landing.index', compact('programs'));
    }
}