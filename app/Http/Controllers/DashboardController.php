<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\OrderDetail;
class DashboardController extends Controller
{
    //khaingthinkyi_enjoywithme
    public function index($value='')
    {
    	$new_orders = Order::where('status',0)->get();
    	$pending_orders = Order::where('status',1)->get();
    	$delivered_orders = Order::where('status',2)->get();
    	return view('backend.dashboard', compact('new_orders','pending_orders','delivered_orders'));
    }
    public function getOrderDetail($voucher_no)
    {
    	$order = Order::where('orders.voucher_no',$voucher_no)->get();
    	$order_details = OrderDetail::where('order_details.voucher_no',$voucher_no)->get();
    	return view('backend.order_detail', compact('order_details','order'));
    }
    public function changeStatus(Request $request, $id)
    {
    	$status = $request->status;
    	if($status == 0) {
    		$status = 1;
    	}elseif($status == 1) {
    		$status = 2;
    	}else{
    		$status = $status;
    	}
        $order= Order::find($id);
        $order->status=$status;
        $order->save();
        return redirect()->back()->with('success', 'Change status successfully');   
    }
}
