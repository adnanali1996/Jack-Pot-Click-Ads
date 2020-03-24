<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $table = 'withdraws_method';
    protected $fillable = [
        'name',
        'image',
        'min_amo',
        'max_amo',
        'chargefx',
        'chargepc',
        'rate',
        'status',
        'processing_day',
        'currency',
    ];
}
