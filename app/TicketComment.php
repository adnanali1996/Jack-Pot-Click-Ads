<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    protected $table = 'ticket_comments';

    protected $fillable = [
        'ticket_id',
        'type',
        'comment',
    ];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

}
