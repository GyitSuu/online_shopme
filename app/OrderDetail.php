<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $fillable = [
        'item_id', 'voucher_no', 'qty', 'subtotal', 'size_id', 'image'
    ];
    public function orders()
    {
        return $this->belongsTo('App\Order', 'voucher_no');
    }
    public function item()
    {
        return $this->belongsTo('App\Item');
    }
    public function size()
    {
        return $this->belongsTo('App\Size');
    }
}
