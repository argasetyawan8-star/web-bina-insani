<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Cloudinary\Api\Upload\UploadApi;

class PaymentSettingController extends Controller
{
    public function index()
    {
        return view('admin.payment-setting.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'bank_number' => 'required|string',
            'qris' => 'nullable|image|max:2048',
        ]);

        $setting = Setting::firstOrNew([]);

        if ($request->hasFile('qris')) {
            try {
                $file = $request->file('qris');

                $result = (new UploadApi())->upload(
                    $file->getRealPath(),
                    [
                        'folder' => 'bina-insani/payment',
                        'resource_type' => 'image',
                    ]
                );

                $setting->qris = $result['secure_url'];
            } catch (\Exception $e) {
                return back()->with(
                    'error',
                    'Gagal mengupload QRIS: ' . $e->getMessage()
                );
            }
        }

        $setting->bank_account = $request->bank_number;
        $setting->save();

        return back()->with(
            'success',
            'Pengaturan pembayaran berhasil diperbarui.'
        );
    }
}