<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',

        // Biodata
        'full_name',
        'nik',
        'birth_place',
        'birth_date',
        'gender',
        'phone',
        'email',
        'address',
        'education',
        'job',

        // Data pendaftaran
        'registration_code',
        'status',

        // Pembayaran
        'payment_method',
        'payment_status',
        'payment_proof',
        'paid_at',

        // Lainnya
        'cs_contacted',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'paid_at' => 'datetime',
        'cs_contacted' => 'boolean',
    ];

    /**
     * Relasi ke Program
     */
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Relasi ke Dokumen Pendaftaran
     */
    public function documents(): HasMany
    {
        return $this->hasMany(
            RegistrationDocument::class,
            'registration_id'
        );
    }
}