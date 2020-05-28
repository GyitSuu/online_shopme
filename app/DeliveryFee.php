<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryFee extends Model
{
    //
    protected $fillable = [
        'township_id', 'fee',
    ];

    public function township()
    {
        return $this->belongsTo('App\Township');
    }
}
