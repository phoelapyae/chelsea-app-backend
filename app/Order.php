<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    /**
     * Relationships
     */
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }
}
