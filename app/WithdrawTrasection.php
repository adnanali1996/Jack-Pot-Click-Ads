<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawTrasection extends Model
{
    protected $table = 'withdraw_trasections';

    protected $fillable = [
        'withdraw_id',
        'user_id',
        'amount',
        'charge',
        'method_name',
        'processing_time',
        'detail',
        'status',
        'method_cur',
    ];

    public function memeber()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->withDefault();
    }

}
