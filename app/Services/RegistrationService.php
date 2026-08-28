<?php

namespace App\Services;

use App\Models\Registration;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RegistrationService
{
    /**
     * Simpan pendaftaran beserta dokumen.
     */
    public function store(array $data): Registration
    {
        return DB::transaction(function () use ($data) {

            /*
            |--------------------------------------------------------------------------
            | Generate kode pendaftaran
            |--------------------------------------------------------------------------
            */

            $lastId = Registration::max('id') ?? 0;

            $registrationCode =
                'BI-' . now()->format('Ymd') . '-' .
                str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);


            /*
            |--------------------------------------------------------------------------
            | Simpan data pendaftaran
            |--------------------------------------------------------------------------
            */

            $registration = Registration::create([
                'program_id' => $data['program_id'],

                'full_name' => $data['full_name'],
                'nik' => $data['nik'],
                'birth_place' => $data['birth_place'],
                'birth_date' => $data['birth_date'],
                'gender' => $data['gender'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'address' => $data['address'],
                'education' => $data['education'],
                'job' => $data['job'],

                'registration_code' => $registrationCode,

                'status' => 'pending',
                'payment_status' => 'unpaid',
                'cs_contacted' => false,
            ]);


            /*
            |--------------------------------------------------------------------------
            | Upload dokumen
            |--------------------------------------------------------------------------
            */

            if (!empty($data['documents'])) {

                foreach ($data['documents'] as $document) {

                    if (!$document instanceof UploadedFile) {
                        continue;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Nama file asli
                    |--------------------------------------------------------------------------
                    */

                    $originalName = $document->getClientOriginalName();


                    /*
                    |--------------------------------------------------------------------------
                    | Nama file unik
                    |--------------------------------------------------------------------------
                    */

                    $fileName = $document->hashName();


                    /*
                    |--------------------------------------------------------------------------
                    | Jenis file
                    |--------------------------------------------------------------------------
                    */

                    $mimeType = $document->getMimeType();


                    /*
                    |--------------------------------------------------------------------------
                    | Tentukan tipe dokumen
                    |--------------------------------------------------------------------------
                    |
                    | Untuk sekarang semua dokumen yang dikirim dari form
                    | akan masuk sebagai "lainnya".
                    |
                    */

                    $documentType = 'lainnya';


                    /*
                    |--------------------------------------------------------------------------
                    | Simpan file
                    |--------------------------------------------------------------------------
                    */

                    $path = $document->store(
                        'registrations/' . $registration->id,
                        'public'
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | Simpan data dokumen ke database
                    |--------------------------------------------------------------------------
                    */

                    $registration->documents()->create([
                        'document_name' => $originalName,

                        'file_name' => $fileName,

                        'document_type' => $documentType,

                        'original_name' => $originalName,

                        'file_path' => $path,

                        'file_disk' => 'public',

                        'mime_type' => $mimeType,

                        'file_size' => $document->getSize(),
                    ]);
                }
            }

            return $registration;
        });
    }


    /**
     * Cari pendaftaran berdasarkan ID.
     */
    public function findById(int|string $id): Registration
    {
        return Registration::with([
            'program',
            'documents',
        ])->findOrFail($id);
    }
}