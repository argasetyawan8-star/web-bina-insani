<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
    'registration_id',
    'order_id',
    'snap_token',
    'amount',
    'payment_method',
    'transaction_id',
    'status',
    'paid_at',
];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

   public function registration()
{
    return $this->belongsTo(
        Registration::class,
        'registration_id'
    );
}
}