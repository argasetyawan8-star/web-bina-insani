<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();

        if (!$about) {
            $about = About::create();
        }

        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::first();

        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }

            $about->image = $request
                ->file('image')
                ->store('about', 'public');
        }

        $about->save();

        return back()->with(
            'success',
            'Foto About berhasil diperbarui.'
        );
    }
}