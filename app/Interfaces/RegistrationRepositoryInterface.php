<?php

namespace App\Interfaces;

interface RegistrationRepositoryInterface
{
    /**
     * Simpan data pendaftaran
     */
    public function store(array $data);

    /**
     * Cari berdasarkan ID
     */
    public function findById(int $id);

    /**
     * Update data
     */
    public function update(int $id, array $data);

    /**
     * Hapus data
     */
    public function delete(int $id);

    /**
     * Semua data
     */
    public function getAll();
}