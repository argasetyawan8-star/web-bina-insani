<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        if (! $setting) {
            $setting = Setting::create();
        }

        return view(
            'admin.settings.index',
            compact('setting')
        );
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        if (! $setting) {
            $setting = Setting::create();
        }

        $request->validate([
            'site_name'     => 'nullable|string|max:255',
            'email'         => 'nullable|email|max:255',
            'phone'         => 'nullable|string|max:30',
            'address'       => 'nullable|string',

            'bank_name'     => 'nullable|string|max:255',
            'bank_account'  => 'nullable|string|max:255',
            'bank_owner'    => 'nullable|string|max:255',

            'logo'          => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'favicon'       => 'nullable|image|mimes:jpg,jpeg,png,ico|max:1024',
            'qris'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Logo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }

            $setting->logo = $request
                ->file('logo')
                ->store('settings', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Upload Favicon
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('favicon')) {

            if ($setting->favicon) {
                Storage::disk('public')->delete($setting->favicon);
            }

            $setting->favicon = $request
                ->file('favicon')
                ->store('settings', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Upload QRIS
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('qris')) {

            if ($setting->qris) {
                Storage::disk('public')->delete($setting->qris);
            }

            $setting->qris = $request
                ->file('qris')
                ->store('settings', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Simpan Data
        |--------------------------------------------------------------------------
        */

        $setting->site_name = $request->site_name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;

        $setting->bank_name = $request->bank_name;
        $setting->bank_account = $request->bank_account;
        $setting->bank_owner = $request->bank_owner;

        $setting->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Pengaturan website berhasil diperbarui.'
            );
    }
}