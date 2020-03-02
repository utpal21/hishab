<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
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
