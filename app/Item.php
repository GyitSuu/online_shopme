<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'category_id',  'user_id', 'item_name', 'item_price','discount_price', 'item_image', 'description'
    ];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
   
   public function sizes()
    {
        return $this->belongsToMany('App\Size');
    }

     public function colors()
    {
        return $this->belongsToMany('App\Color');
    }
    
}
