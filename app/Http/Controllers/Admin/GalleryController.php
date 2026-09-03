<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Cloudinary\Api\Upload\UploadApi;

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

        try {
            $file = $request->file('image');

            $result = (new UploadApi())->upload(
                $file->getRealPath(),
                [
                    'folder' => 'bina-insani/gallery',
                    'resource_type' => 'image',
                ]
            );

            Gallery::create([
                'image' => $result['secure_url'],
            ]);

            return back()->with(
                'success',
                'Foto berhasil ditambahkan.'
            );
        } catch (\Exception $e) {
            return back()->with(
                'error',
                'Gagal mengupload foto: ' . $e->getMessage()
            );
        }
    }

    public function destroy(Gallery $gallery)
    {
        try {
            if (
                $gallery->image &&
                str_starts_with(
                    $gallery->image,
                    'https://res.cloudinary.com/'
                )
            ) {
                $path = parse_url(
                    $gallery->image,
                    PHP_URL_PATH
                );

                $path = preg_replace(
                    '#^/[^/]+/image/upload/#',
                    '',
                    $path
                );

                $path = preg_replace(
                    '#^v\d+/#',
                    '',
                    $path
                );

                $directory = pathinfo(
                    $path,
                    PATHINFO_DIRNAME
                );

                $filename = pathinfo(
                    $path,
                    PATHINFO_FILENAME
                );

                if ($directory === '.') {
                    $publicId = $filename;
                } else {
                    $publicId = $directory . '/' . $filename;
                }

                (new UploadApi())->destroy(
                    $publicId,
                    [
                        'resource_type' => 'image',
                        'invalidate' => true,
                    ]
                );
            }

            $gallery->delete();

            return back()->with(
                'success',
                'Foto berhasil dihapus.'
            );
        } catch (\Exception $e) {
            return back()->with(
                'error',
                'Gagal menghapus foto: ' . $e->getMessage()
            );
        }
    }
}