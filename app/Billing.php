<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = [
        'code', 'quantity', 
        'do_date',
        'shipment_date',
        'shipment_date',
        'agent_amount',
        'customer_amount',
        'agent_id',
        'customer_id',
        'finished',
        'active'
    ];
    /**
     * Get the phone record associated with the user.
     */
    public function agent()
    {
        return $this->hasOne('App\Agent');
    }
    /**
     * Get the phone record associated with the user.
     */
    public function customer()
    {
        return $this->hasOne('App\Customer');
    }

}
