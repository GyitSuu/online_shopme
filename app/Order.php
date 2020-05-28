<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id', 'voucher_no', 'order_date', 'address', 'total_price',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
