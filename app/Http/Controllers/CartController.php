<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Township;
use App\DeliveryFee;

class CartController extends Controller
{
    public function cart($value='')
    {
    	$townships=Township::all();
    	return view('frontend.cart',compact('townships'));
    }
    public function fee(Request $request)
    {
    	$tid=request('tid');
    	$fee=DeliveryFee::where('township_id',$tid)
    			->get();
    	return $fee;
    }
}
