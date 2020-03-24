<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberExtra extends Model
{
    protected $table ='member_extras';
    protected $fillable = [
        'user_id',
        'left_paid',
        'right_paid',
        'left_free',
        'right_free',
        'left_bv',
        'right_bv',
    ];
}
