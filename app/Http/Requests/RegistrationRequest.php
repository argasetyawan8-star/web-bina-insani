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
        return true;
    }

    /**
     * Validation Rules
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
            | Dokumen
            |--------------------------------------------------------------------------
            |
            | Peserta dapat memilih banyak file.
            |
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
     * Custom Error Message
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

            'program_id.exists' =>
                'Program tidak ditemukan.',

            /*
            |--------------------------------------------------------------------------
            | Biodata
            |--------------------------------------------------------------------------
            */

            'full_name.required' =>
                'Nama lengkap wajib diisi.',

            'nik.required' =>
                'NIK wajib diisi.',

            'nik.unique' =>
                'NIK sudah pernah digunakan.',

            'birth_place.required' =>
                'Tempat lahir wajib diisi.',

            'birth_date.required' =>
                'Tanggal lahir wajib diisi.',

            'gender.required' =>
                'Jenis kelamin wajib dipilih.',

            'phone.required' =>
                'Nomor HP wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'address.required' =>
                'Alamat wajib diisi.',

            /*
|--------------------------------------------------------------------------
| Dokumen
|--------------------------------------------------------------------------
*/

'documents' => 'required|array|min:2',

'documents.*' => [
    'required',
    'file',
    'mimes:jpg,jpeg,png,pdf',
    'max:5120',
],



            'documents.required' =>
                'Dokumen wajib diupload.',

            'documents.array' =>
                'Format dokumen tidak valid.',

            'documents.min' =>
                'Minimal upload 2 dokumen, yaitu KTP dan ijazah.',

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

    /**
     * Handle failed validation.
     */
    protected function failedValidation(
        \Illuminate\Contracts\Validation\Validator $validator
    ) {
        dd($validator->errors()->all());
    }
}