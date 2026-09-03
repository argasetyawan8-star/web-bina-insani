<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('admin.gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $directory = public_path('images/gallery');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $file = $request->file('image');

        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        $file->move($directory, $filename);

        Gallery::create([
            'image' => 'gallery/' . $filename,
        ]);

        return back()->with('success', 'Foto berhasil ditambahkan.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            $filePath = public_path('images/' . $gallery->image);

            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $gallery->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}