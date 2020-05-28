<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //
    protected $fillable = [
        'category_id', 'size',
    ];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
