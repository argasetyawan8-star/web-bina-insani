<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [

        'site_name',

        'email',

        'phone',

        'address',

        'bank_name',

        'bank_account',

        'bank_owner',

        'logo',

        'favicon',

        'qris',

        'key',

        'value',

        
    ];
}