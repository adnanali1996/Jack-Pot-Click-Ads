<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'user_id','ico_id','gateway_id','amount', 'status','trx','try','bcid','bcam' , 'usd_amount','trx_charge'
    ];

    public function member()
    {
        return $this->hasOne(User::class, 'id','user_id')->withDefault();
    }

    public function gateway()
    {
        return $this->belongsTo(Gateway::class);
    }

    public function method_name()
    {
        return $this->hasOne(Gateway::class, 'id', 'gateway_id')->withDefault();
    }
}
