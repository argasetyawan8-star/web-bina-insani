<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{


    public function index()
    {

        $contact = Contact::first();


        return view(
            'admin.contact.index',
            compact('contact')
        );

    }



    public function update(Request $request)
    {

        $request->validate([

            'address'=>'nullable',
            'phone'=>'nullable',
            'email'=>'nullable|email',
            'office_hours'=>'nullable',

        ]);



        Contact::updateOrCreate(

            [
                'id'=>1
            ],


            [

                'address'=>$request->address,

                'phone'=>$request->phone,

                'email'=>$request->email,

                'office_hours'=>$request->office_hours,

                'maps'=>$request->maps,

                'instagram'=>$request->instagram,

                'facebook'=>$request->facebook,

                'tiktok'=>$request->tiktok,

            ]

        );



        return back()->with(
            'success',
            'Contact berhasil diperbarui.'
        );


    }


}