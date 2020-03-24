<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    protected $fillable = [
        'token', 'title', 'link', 'price', 'quantity', 'remain', 'user_id', 'package_id', 'package_status', 'date',
    ];

    public function user_add()
    {
        return $this->hasMany(UserAdvertise::class)->withDefault();
    }

    public function member()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->withDefault();
    }

    public function package()
    {
        return $this->hasOne(Package::class, 'id', 'package_id')->withDefault();
    }

    public function user_addvertise()
    {
        return $this->belongsTo(UserAdvertise::class);
    }
}