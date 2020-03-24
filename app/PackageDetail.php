<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageDetail extends Model
{
    protected $table = 'package_details';
    protected $fillable = [
        'package_id',
        'detail',
    ];

    public function detail()
    {
        return $this->belongsTo(Package::class, 'id', 'package_id');
    }
}
