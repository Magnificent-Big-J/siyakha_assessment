<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['name','description','exchange_rate','surcharge','action'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
