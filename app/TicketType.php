<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $guarded = [];

    public function ticketInfo()
    {
        return $this->hasMany('App\TicketInfo');
    }
}
