<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'trans_id',
        'time',
        'description',
        'amount',
        'new_balance',
        'type',
        'charge'
    ];

    public function member()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->withDefault();
    }
}
