<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'ticket',
        'subject',
        'customer_id',
        'status',
    ];

    public function ticket_comment()
    {
        return $this->hasMany(TicketComment::class, 'ticket_id', 'ticket');
    }

    public function user_member()
    {
        return $this->hasOne(User::class, 'id', 'customer_id')->withDefault();
    }
}
