<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Cloudinary\Api\Upload\UploadApi;

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
            try {
                $file = $request->file('image');

                $result = (new UploadApi())->upload(
                    $file->getRealPath(),
                    [
                        'folder' => 'bina-insani/about',
                        'resource_type' => 'image',
                    ]
                );

                $about->image = $result['secure_url'];
            } catch (\Exception $e) {
                return back()->with(
                    'error',
                    'Gagal mengupload foto About: ' . $e->getMessage()
                );
            }
        }

        $about->save();

        return back()->with(
            'success',
            'Foto About berhasil diperbarui.'
        );
    }
}