<?php

namespace App\Exports;

use App\Models\Registration;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegistrationsExport implements FromCollection, WithHeadings
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function collection(): Collection
    {
        return $this->query
            ->with('program')
            ->get()
            ->map(function ($item) {

                return [

                    $item->registration_code,

                    $item->full_name,

                    $item->program->name ?? '-',

                    $item->phone,

                    $item->email,

                    ucfirst($item->payment_status),

                    ucfirst($item->status),

                    $item->created_at->format('d-m-Y'),

                ];

            });

    }

    public function headings(): array
    {
        return [

            'Kode',

            'Nama',

            'Program',

            'No HP',

            'Email',

            'Pembayaran',

            'Status',

            'Tanggal Daftar',

        ];
    }
}