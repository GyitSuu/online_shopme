<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $fillable = [
        'category_id', 'color',
    ];
    public function items()
    {
        return $this->belongsToMany('App\Item');
    }
}
