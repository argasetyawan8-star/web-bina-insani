<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'name' => 'Diklat Intensif',
            'registration_fee' => 250000,
            'training_fee' => 8250000,
            'training_days' => 'Senin - Sabtu',
            'training_hours' => '08.00 - 15.00 WIB',
            'duration' => '2,3 Bulan (58 Hari Efektif)',
            'description' => 'Program ini dirancang untuk peserta luar kota atau luar Pulau Jawa dengan jadwal pelatihan yang padat agar siap menghadapi ujian EPS-TOPIK.',
            'is_active' => true,
        ]);

        Program::create([
            'name' => 'Diklat Reguler',
            'registration_fee' => 250000,
            'training_fee' => 6500000,
            'training_days' => 'Senin - Jumat',
            'training_hours' => '08.00 - 11.30 WIB & 16.30 - 20.30 WIB',
            'duration' => '4,5 Bulan (94 Hari Efektif)',
            'description' => 'Program reguler cocok bagi peserta yang ingin belajar Bahasa Korea sambil bekerja dengan pilihan kelas pagi dan sore.',
            'is_active' => true,
        ]);
    }
}