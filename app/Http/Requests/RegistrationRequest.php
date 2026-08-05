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

            'program_id' => 'required|exists:programs,id',

            'full_name' => 'required|string|max:255',

            'nik' => 'required|string|max:20|unique:registrations,nik',

            'birth_place' => 'required|string|max:100',

            'birth_date' => 'required|date',

            'gender' => 'required|in:Laki-laki,Perempuan',

            'phone' => 'required|string|max:20',

            'email' => 'nullable|email|max:255',

            'address' => 'required|string',

            'education' => 'nullable|string|max:100',

            'job' => 'nullable|string|max:100',

            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',

            'ktp' => 'required|mimes:jpg,jpeg,png,pdf|max:4096',

            'ijazah' => 'required|mimes:jpg,jpeg,png,pdf|max:4096',

        ];
    }

    /**
     * Custom Error Message
     */
    public function messages(): array
    {
        return [

            'program_id.required' => 'Program wajib dipilih.',

            'program_id.exists' => 'Program tidak ditemukan.',

            'full_name.required' => 'Nama lengkap wajib diisi.',

            'nik.required' => 'NIK wajib diisi.',

            'nik.unique' => 'NIK sudah pernah digunakan.',

            'birth_place.required' => 'Tempat lahir wajib diisi.',

            'birth_date.required' => 'Tanggal lahir wajib diisi.',

            'gender.required' => 'Jenis kelamin wajib dipilih.',

            'phone.required' => 'Nomor HP wajib diisi.',

            'email.email' => 'Format email tidak valid.',

            'address.required' => 'Alamat wajib diisi.',

            'photo.required' => 'Pas foto wajib diupload.',

            'photo.image' => 'Pas foto harus berupa gambar.',

            'ktp.required' => 'KTP wajib diupload.',

            'ijazah.required' => 'Ijazah wajib diupload.',

        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
{
    dd($validator->errors()->all());
}

}