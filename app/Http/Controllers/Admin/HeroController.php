<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::first();

        if (!$hero) {

            $hero = Hero::create([
                'title' => 'Belajar Bahasa Korea',
                'subtitle' => 'Program terbaik menuju karier di Korea Selatan.',
            ]);

        }

        return view('admin.hero.index', compact('hero'));
    }

    public function update(Request $request)
    {
        $hero = Hero::first();

        $request->validate([

            'title' => 'required',

            'subtitle' => 'nullable',

            'button_text' => 'nullable',

            'button_link' => 'nullable',

            'button2_text' => 'nullable',

            'button2_link' => 'nullable',

            'image' => 'nullable|image|max:2048',

        ]);

        if ($request->hasFile('image')) {

            if ($hero->image) {

                Storage::disk('public')->delete($hero->image);

            }

            $hero->image = $request
                ->file('image')
                ->store('hero', 'public');
        }

        $hero->fill([

            'title' => $request->title,

            'subtitle' => $request->subtitle,

            'button_text' => $request->button_text,

            'button_link' => $request->button_link,

            'button2_text' => $request->button2_text,

            'button2_link' => $request->button2_link,

        ]);

        $hero->save();

        return back()->with(
            'success',
            'Hero berhasil diperbarui.'
        );
    }
}