<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            $directory = public_path('images/about');

            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            // Hapus gambar lama
            if ($about->image) {
                $oldImage = public_path('images/' . $about->image);

                if (File::exists($oldImage)) {
                    File::delete($oldImage);
                }
            }

            $file = $request->file('image');

            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move($directory, $filename);

            $about->image = 'about/' . $filename;
        }

        $about->save();

        return back()->with(
            'success',
            'Foto About berhasil diperbarui.'
        );
    }
}