<?php

namespace App\Repositories;

use App\Models\Registration;
use App\Interfaces\RegistrationRepositoryInterface;

class RegistrationRepository implements RegistrationRepositoryInterface
{
    protected Registration $registration;

    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }

    /**
     * Ambil semua data
     */
    public function getAll()
    {
        return $this->registration
            ->with('program')
            ->latest()
            ->get();
    }

    /**
     * Simpan data
     */
    public function store(array $data)
    {
        return $this->registration->create($data);
    }

    /**
     * Cari berdasarkan ID
     */
    public function findById(int $id)
    {
        return $this->registration
            ->with('program')
            ->findOrFail($id);
    }

    /**
     * Update
     */
    public function update(int $id, array $data)
    {
        $registration = $this->findById($id);

        $registration->update($data);

        return $registration;
    }

    /**
     * Hapus
     */
    public function delete(int $id)
    {
        return $this->findById($id)->delete();
    }
}