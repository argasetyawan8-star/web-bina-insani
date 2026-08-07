<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [

        /*
        |--------------------------------------------------------------------------
        | Registration
        |--------------------------------------------------------------------------
        */

        'registration_code',
        'program_id',

        /*
        |--------------------------------------------------------------------------
        | Biodata
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | Dokumen
        |--------------------------------------------------------------------------
        */

        'photo',
        'ktp',
        'ijazah',

        /*
        |--------------------------------------------------------------------------
        | Pembayaran
        |--------------------------------------------------------------------------
        */

        'payment_method',
        'payment_status',
        'payment_proof',
        'paid_at',

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        'status',
        'cs_contacted',
    ];

    protected $casts = [

        'birth_date' => 'date',
        'paid_at'    => 'datetime',

    ];

    /*
    |--------------------------------------------------------------------------
    | Relationship
    |--------------------------------------------------------------------------
    */

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    
}