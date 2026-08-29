<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return auth()->check()
            && auth()->user()->hasRole('peserta');
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [
            /*
            |--------------------------------------------------------------------------
            | Program
            |--------------------------------------------------------------------------
            */

            'program_id' => [
                'required',
                'integer',
                'exists:programs,id',
            ],


            /*
            |--------------------------------------------------------------------------
            | Biodata
            |--------------------------------------------------------------------------
            */

            'full_name' => [
                'required',
                'string',
                'max:255',
            ],

            'nik' => [
                'required',
                'string',
                'max:20',
                'unique:registrations,nik',
            ],

            'birth_place' => [
                'required',
                'string',
                'max:100',
            ],

            'birth_date' => [
                'required',
                'date',
            ],

            'gender' => [
                'required',
                'in:Laki-laki,Perempuan',
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
            ],

            /*
            |--------------------------------------------------------------------------
            | Email
            |--------------------------------------------------------------------------
            |
            | Email nantinya akan diganti di Controller menggunakan
            | email akun yang sedang login.
            |
            */

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'address' => [
                'required',
                'string',
            ],

            'education' => [
                'nullable',
                'string',
                'max:100',
            ],

            'job' => [
                'nullable',
                'string',
                'max:100',
            ],


            /*
            |--------------------------------------------------------------------------
            | Documents
            |--------------------------------------------------------------------------
            */

            'documents' => [
                'required',
                'array',
                'min:2',
            ],

            'documents.*' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:5120',
            ],
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            /*
            |--------------------------------------------------------------------------
            | Program
            |--------------------------------------------------------------------------
            */

            'program_id.required' =>
                'Program wajib dipilih.',

            'program_id.integer' =>
                'Program tidak valid.',

            'program_id.exists' =>
                'Program tidak ditemukan.',


            /*
            |--------------------------------------------------------------------------
            | Biodata
            |--------------------------------------------------------------------------
            */

            'full_name.required' =>
                'Nama lengkap wajib diisi.',

            'full_name.string' =>
                'Nama lengkap tidak valid.',

            'full_name.max' =>
                'Nama lengkap maksimal 255 karakter.',

            'nik.required' =>
                'NIK wajib diisi.',

            'nik.unique' =>
                'NIK sudah pernah digunakan.',

            'birth_place.required' =>
                'Tempat lahir wajib diisi.',

            'birth_date.required' =>
                'Tanggal lahir wajib diisi.',

            'birth_date.date' =>
                'Tanggal lahir tidak valid.',

            'gender.required' =>
                'Jenis kelamin wajib dipilih.',

            'gender.in' =>
                'Jenis kelamin tidak valid.',

            'phone.required' =>
                'Nomor WhatsApp wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'address.required' =>
                'Alamat wajib diisi.',


            /*
            |--------------------------------------------------------------------------
            | Documents
            |--------------------------------------------------------------------------
            */

            'documents.required' =>
                'Dokumen wajib diupload.',

            'documents.array' =>
                'Format dokumen tidak valid.',

            'documents.min' =>
                'Minimal upload 2 dokumen.',

            'documents.*.required' =>
                'Dokumen wajib diupload.',

            'documents.*.file' =>
                'Dokumen harus berupa file.',

            'documents.*.mimes' =>
                'Format dokumen harus JPG, JPEG, PNG, atau PDF.',

            'documents.*.max' =>
                'Ukuran setiap dokumen maksimal 5 MB.',
        ];
    }
}