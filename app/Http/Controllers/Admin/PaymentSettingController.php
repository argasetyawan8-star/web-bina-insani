<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

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
        'qris' => 'nullable|image',
    ]);

    $setting = Setting::firstOrNew([]);

    if ($request->hasFile('qris')) {
        $setting->qris = $request->file('qris')->store('payment', 'public');
    }

    $setting->bank_account = $request->bank_number;

    $setting->save();

    return back()->with('success', 'Pengaturan pembayaran berhasil diperbarui.');
}

}