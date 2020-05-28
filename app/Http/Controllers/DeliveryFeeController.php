<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DeliveryFee;
use App\Township;
use Illuminate\Support\Facades\DB;

class DeliveryFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.delivery_fee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            "township" => "required",
            "fee" => "required|min:1|max:20"
        ]);
         DeliveryFee::Create([
            'township_id' => $request->township,
            'fee' => $request->fee,
        ]);
     return response()->json(['success' => "Delivery Fee saved Successful"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delivery_fee = DeliveryFee::find($id);
        return $delivery_fee;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            "edit_fee" => "required|min:1|max:20",
        ]);
        $size= DeliveryFee::find($id);
        $size->township_id=$request->edit_township;
        $size->fee=$request->edit_fee;
        $size->save();
        return response()->json(['success'=>'Delivery Fee updated successfully.']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delivery_fee = DeliveryFee::find($id);
        $delivery_fee->delete();
      return response()->json(['success' => "Delivery Fee deleted Successfully"]);
    }

    public function getDeliveryFee()
    {
        $delivery_fees = DB::table('delivery_fees')
            ->join('townships', 'townships.id', '=', 'delivery_fees.township_id')
            ->select('delivery_fees.*', 'townships.*', 'delivery_fees.id as s_id')
            ->get();
        return $delivery_fees;
    }
    public function getSizeByCategoryId($id)
    {
        $delivery_fee = DB::table('delivery_fees')
            ->join('townships', 'townships.id', '=', 'delivery_fees.township_id')
            ->select('delivery_fees.*', 'townships.*', 'delivery_fees.id as s_id')
            ->where('delivery_fees.category_id', '=', $id)
            ->get();
        return $delivery_fee;
    }
}
