<?php

namespace App\Services;

use App\Interfaces\RegistrationRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RegistrationService
{
    protected RegistrationRepositoryInterface $registrationRepository;

    public function __construct(
        RegistrationRepositoryInterface $registrationRepository
    ) {
        $this->registrationRepository = $registrationRepository;
    }

    /**
     * Simpan pendaftaran baru
     */
    public function store(array $data)
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | Upload File
            |--------------------------------------------------------------------------
            */

            if (isset($data['photo'])) {
                $data['photo'] = $data['photo']
                    ->store('registrations/photo', 'public');
            }

            if (isset($data['ktp'])) {
                $data['ktp'] = $data['ktp']
                    ->store('registrations/ktp', 'public');
            }

            if (isset($data['ijazah'])) {
                $data['ijazah'] = $data['ijazah']
                    ->store('registrations/ijazah', 'public');
            }

            /*
            |--------------------------------------------------------------------------
            | Registration Code
            |--------------------------------------------------------------------------
            */

            $lastId = DB::table('registrations')->count() + 1;

            $data['registration_code'] =
                'BI-' .
                now()->format('Ymd') .
                '-' .
                str_pad($lastId, 4, '0', STR_PAD_LEFT);

            /*
            |--------------------------------------------------------------------------
            | Default Status
            |--------------------------------------------------------------------------
            */

            $data['status'] = 'pending';

            $data['payment_status'] = 'unpaid';

            $data['cs_contacted'] = false;

            /*
            |--------------------------------------------------------------------------
            | Simpan
            |--------------------------------------------------------------------------
            */

            $registration = $this->registrationRepository
                ->store($data);

            DB::commit();

            return $registration;

        } catch (\Exception $e) {

            DB::rollBack();

            if (!empty($data['photo'])) {
                Storage::disk('public')->delete($data['photo']);
            }

            if (!empty($data['ktp'])) {
                Storage::disk('public')->delete($data['ktp']);
            }

            if (!empty($data['ijazah'])) {
                Storage::disk('public')->delete($data['ijazah']);
            }

            throw $e;
        }
    }

    /**
 * Detail Registration
 */
public function findById(int $id)
{
    return $this->registrationRepository
        ->findById($id);
}

}