<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
     protected $fillable = [
        'name', 'code', 'active'
    ];
    /**
     * Get the user that owns the phone.
     */
    public function billing()
    {
        return $this->belongsTo('App\Billing');
    }
}
