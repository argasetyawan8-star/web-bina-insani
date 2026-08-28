<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrationDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_id',
        'document_name',
        'file_name',
        'document_type',
        'original_name',
        'file_path',
        'file_disk',
        'mime_type',
        'file_size',
    ];

    /**
     * Relasi ke pendaftaran
     */
    public function registration(): BelongsTo
    {
        return $this->belongsTo(
            Registration::class,
            'registration_id'
        );
    }
}