<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Item;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.item.index',compact('categories'));
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
        //dd($request);
            $request->validate([
            "item_name" => "required|min:3|max:150",
            "item_price" => "required|min:1|max:20",
            "category" => "required",
             "description" => "required|min:4|max:255" 
        ]);
        $image = $request->file('item_image');
            if($image){
                foreach ($image as $image_item) {
                    $name=uniqid().time().'.'.$image_item->getClientOriginalExtension();
                    $image_item->move(public_path('image/item'),$name);
                    $path='image/item/'.$name;
                    $image_array[]=$path;
                }
            }
        // dd($request);
        if ($request->discount_price) {
            $discount_price = $request->discount_price;
        }
        else{
            $discount_price = null;
        }
       
        $item = Item::Create([
            'id'       => $request->item_id,
            'category_id' => $request->category,
            'user_id'   => 1,
            'item_name' => $request->item_name,
            'item_price'=> $request->item_price,
            'discount_price'=> $discount_price,
            'item_image'=> json_encode($image_array),
            'description'=> $request->description,


        ]);
         if ($request->size_id) {
            $item->sizes()->attach($request->size_id);
        }
         if ($request->color_id) {
            $item->colors()->attach($request->color_id);
        }
     return response()->json(['success' => 'Item saved Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $item = Item::find($id);
        $itemsize=$item->sizes()->get();
        $itemcolor=$item->colors()->get();
        //dd($itemcolor);
        return response()->json([
            'item' => $item,'item_size'=>$itemsize,'item_color'=>$itemcolor
                    ]);
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
        //dd($request);
        $request->validate([
            "edit_item_name" => "required|min:3|max:151",
            "edit_item_price" => "required|min:1|max:151",
            "edit_item_image"=>'image|mimes:jpeg,jpg,gif,png,svg|max:2048'
              
        ]);
        // dd($request);
         $image = $request->file('edititem_image');
        if($image){
                foreach ($image as $image_item) {
                    $name=uniqid().time().'.'.$image_item->getClientOriginalExtension();
                    $image_item->move(public_path('image/item'),$name);
                    $path='image/item/'.$name;
                    $image_array[]=$path;
                }
            
        }
        else{
            $path = $request->item_old_image;
        }

        if ($request->edit_discount) {
            $discount_price = $request->edit_discount;
        }
        else{
            $discount_price = null;
        }
        $item = Item::find($id);
        $item->item_name = $request->edit_item_name;
        $item->item_price = $request->edit_item_price;
        $item->discount_price= $discount_price;
        if($image){
        $item->item_image=json_encode($image_array);
        }else{
        $item->item_image = $path;

        }
        //$item->brand_id = $request->edit_brand;
        $item->category_id = $request->category;
        $item->save();

        if ($request->size_id) {
          $item->sizes()->detach();
        $item->sizes()->attach($request->size_id);
        }else{
          $item->sizes()->detach();  
        }
         if ($request->color_id) {
          $item->colors()->detach();
            $item->colors()->attach($request->color_id);  
        }else{
          $item->colors()->detach();  
        }


        return response()->json(['success'=>'item Updated successfully.']);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

         return response()->json(['success'=>'Item deleted successfully.']);
    }

    public function getItem()
    {
        $items = Item::all();
        return $items;
    }
}
