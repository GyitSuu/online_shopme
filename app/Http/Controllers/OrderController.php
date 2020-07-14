<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function store(Request $request)
    {
    	$mycard = request('itemArray');
        $total = request('total');
       
        $address=request('address');

        $voucherno = uniqid();
       
        $order_date = Carbon::now();

        $order = Order::create([
                'user_id' => Auth::id(),
                'voucher_no' => $voucherno,
                'order_date' =>  $order_date,
                'total_price' => $total,
                'address'=>$address,
            ]);

 
        
        foreach($mycard as $cart) {
            $orderdetail = OrderDetail::create([
               'voucher_no' => $voucherno,
                'subtotal'=> $cart['price']*$cart['qty'],
                'qty'=> $cart['qty'],
                'size_id'=> $cart['size'],
                'image'=> $cart['photo'],
                'item_id'=> $cart['id'],
                
            ]);

        }   

          return response()->json(['success' => "Order  Successful"]);
    }
}
