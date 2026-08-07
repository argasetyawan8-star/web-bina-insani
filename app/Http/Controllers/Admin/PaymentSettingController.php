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
    $setting = Setting::first();


    if($request->hasFile('qris')){

        $qris = $request->file('qris')
            ->store('payment','public');

        $setting->qris = $qris;

    }


    $setting->bank_account = $request->bank_number;

    $setting->save();


    return redirect()
        ->back()
        ->with('success','Pengaturan pembayaran berhasil diperbarui.');
}

}