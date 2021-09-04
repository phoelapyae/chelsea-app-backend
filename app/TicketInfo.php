<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketInfo extends Model
{
    protected $guarded = [];

    /**
     * Relationships
     */
    public function ticketType()
    {
        return $this->belongsTo('App\TicketType');
    }
}
