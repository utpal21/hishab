<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
        protected $fillable = [
        'name', 'code', 'active'
    ];
    /**
     * Get the user that owns the phone.
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
