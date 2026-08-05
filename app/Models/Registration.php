<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;

   protected $fillable = [
    'registration_code',

    'program_id',

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

    'photo',
    'ktp',
    'ijazah',

    'status',
    'payment_status',

    'snap_token',
    'midtrans_order_id',
    'payment_type',
    'transaction_id',

    'paid_at',

    'cs_contacted',
];

    protected $casts = [
    'birth_date' => 'date',
    'paid_at' => 'datetime',
];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

   public function payment()
{
    return $this->hasOne(
        Payment::class,
        'registration_id'
    );
}
}