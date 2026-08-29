<?php

namespace App\Services;

use App\Models\Registration;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

class RegistrationService
{
    /**
     * Simpan pendaftaran beserta dokumen.
     */
    public function store(array $data): Registration
    {
        $storedFiles = [];

        try {
            return DB::transaction(function () use ($data, &$storedFiles) {

                /*
                |--------------------------------------------------------------------------
                | Generate Registration Code
                |--------------------------------------------------------------------------
                */

                $lastId = Registration::max('id') ?? 0;

                $registrationCode =
                    'BI-' .
                    now()->format('Ymd') .
                    '-' .
                    str_pad(
                        $lastId + 1,
                        4,
                        '0',
                        STR_PAD_LEFT
                    );


                /*
                |--------------------------------------------------------------------------
                | Create Registration
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

                    'education' => $data['education'] ?? null,

                    'job' => $data['job'] ?? null,

                    'registration_code' => $registrationCode,

                    'status' => 'pending',

                    'payment_status' => 'unpaid',

                    'cs_contacted' => false,
                ]);


                /*
                |--------------------------------------------------------------------------
                | Store Documents
                |--------------------------------------------------------------------------
                */

                if (!empty($data['documents'])) {

                    foreach ($data['documents'] as $document) {

                        if (!$document instanceof UploadedFile) {
                            continue;
                        }


                        /*
                        |--------------------------------------------------------------------------
                        | Store File
                        |--------------------------------------------------------------------------
                        */

                        $path = $document->store(
                            'registrations/' . $registration->id,
                            'public'
                        );

                        /*
                        | Simpan path untuk cleanup jika terjadi exception.
                        */
                        $storedFiles[] = $path;


                        /*
                        |--------------------------------------------------------------------------
                        | Original File Information
                        |--------------------------------------------------------------------------
                        */

                        $originalName =
                            $document->getClientOriginalName();

                        $fileName =
                            basename($path);

                        $mimeType =
                            $document->getMimeType();

                        $fileSize =
                            $document->getSize();


                        /*
                        |--------------------------------------------------------------------------
                        | Detect Document Type
                        |--------------------------------------------------------------------------
                        */

                        $documentType =
                            $this->detectDocumentType(
                                $originalName
                            );


                        /*
                        |--------------------------------------------------------------------------
                        | Save Document Record
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

                            'file_size' => $fileSize,
                        ]);
                    }
                }


                return $registration;
            });

        } catch (Throwable $exception) {

            /*
            |--------------------------------------------------------------------------
            | Cleanup Uploaded Files
            |--------------------------------------------------------------------------
            |
            | Jika database gagal disimpan, file yang sudah terlanjur
            | terupload juga dihapus.
            |
            */

            foreach ($storedFiles as $path) {

                if (
                    Storage::disk('public')
                        ->exists($path)
                ) {
                    Storage::disk('public')
                        ->delete($path);
                }
            }

            throw $exception;
        }
    }


    /**
     * Tentukan tipe dokumen berdasarkan nama file.
     */
    private function detectDocumentType(string $fileName): string
    {
        $name = Str::lower($fileName);


        /*
        |--------------------------------------------------------------------------
        | KTP
        |--------------------------------------------------------------------------
        */

        if (
            Str::contains($name, [
                'ktp',
                'e-ktp',
                'ektp',
                'kartu tanda penduduk',
            ])
        ) {
            return 'ktp';
        }


        /*
        |--------------------------------------------------------------------------
        | KK
        |--------------------------------------------------------------------------
        */

        if (
            Str::contains($name, [
                'kk',
                'kartu keluarga',
            ])
        ) {
            return 'kk';
        }


        /*
        |--------------------------------------------------------------------------
        | IJAZAH
        |--------------------------------------------------------------------------
        */

        if (
            Str::contains($name, [
                'ijazah',
                'ijasah',
                'certificate',
            ])
        ) {
            return 'ijazah';
        }


        /*
        |--------------------------------------------------------------------------
        | PASPOR
        |--------------------------------------------------------------------------
        */

        if (
            Str::contains($name, [
                'paspor',
                'passport',
            ])
        ) {
            return 'paspor';
        }


        /*
        |--------------------------------------------------------------------------
        | SKCK
        |--------------------------------------------------------------------------
        */

        if (
            Str::contains($name, [
                'skck',
                'catatan kepolisian',
            ])
        ) {
            return 'skck';
        }


        /*
        |--------------------------------------------------------------------------
        | LAINNYA
        |--------------------------------------------------------------------------
        */

        return 'lainnya';
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