<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'referrer_id', 'username', 'password',
        'position', 'first_name', 'last_name',
        'balance', 'join_date', 'status',
        'paid_status', 'ver_status',
        'ver_code', 'forget_code', 'birth_day',
        'email', 'mobile', 'street_address',
        'city', 'country', 'post_code', 'posid', 'secretcode',
        'tauth', 'tfver', 'emailv', 'smsv', 'vsent', 'vercode', 'image', 'affiliate_id', 'package_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function withdraw()
    {
        return $this->belongsTo(WithdrawTrasection::class)->withDefault();
    }

    public function deposit()
    {
        return $this->belongsTo(Deposit::class)->withDefault();
    }

    public function trans()
    {
        return $this->belongsTo(Transaction::class)->withDefault();
    }

    public function package()
    {
        return $this->hasOne('App\Package', 'id', 'package_id');
    }

    public function user_advertises()
    {
        return $this->hasMany(UserAdvertise::class);
    }

    public function package_id()
    {
        return $this->package_id;
    }
}