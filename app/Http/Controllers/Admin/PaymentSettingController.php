<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            $directory = public_path('images/payment');

            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            // Hapus QRIS lama
            if ($setting->qris) {
                $oldQris = public_path('images/' . $setting->qris);

                if (File::exists($oldQris)) {
                    File::delete($oldQris);
                }
            }

            $file = $request->file('qris');

            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move($directory, $filename);

            $setting->qris = 'payment/' . $filename;
        }

        $setting->bank_account = $request->bank_number;
        $setting->save();

        return back()->with(
            'success',
            'Pengaturan pembayaran berhasil diperbarui.'
        );
    }
}