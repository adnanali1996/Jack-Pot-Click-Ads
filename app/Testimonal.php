<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonal extends Model
{
    protected $table = 'testimonals';
    protected $fillable = [
        'image',
        'name',
        'company',
        'star',
        'comment'
    ];
}
