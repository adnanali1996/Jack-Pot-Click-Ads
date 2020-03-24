<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'title',
        'price',
        'status',
        'click',
        'unit_price',
        'minimum_withdraw',
    ];

    public function detail()
    {
        return $this->hasMany(PackageDetail::class, 'package_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'package_id');
    }

    // FOR SHOWING THE PACKAGE IN THE REGISTER PAGE
    // public function package_detail()
    // {
    //     return $this->hasMany(PackageDetail::class, 'package_id', 'id');
    // }
}