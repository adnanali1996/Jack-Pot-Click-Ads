<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'description', 'type', 'total_balance',
    ];

    public function memeber()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->withDefault();
    }
}