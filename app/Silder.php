<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Silder extends Model
{
    protected $table = 'silders';
    protected $fillable = [
        'image',
        'heading',
        'description',
    ];
}
