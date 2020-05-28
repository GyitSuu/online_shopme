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
        if ($request->size_id) {
            $size_id = $request->size_id;
            $size = implode(',', $size_id);
        }
        else{
            $size = null;
        }
        $item = Item::Create([
            'id'       => $request->item_id,
            'category_id' => $request->category,
            'size_id' => $size,
            'user_id'   => 1,
            'item_name' => $request->item_name,
            'item_price'=> $request->item_price,
            'discount_price'=> $discount_price,
            'item_image'=> json_encode($image_array),
            'description'=> $request->description,
        ]);
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
        return response()->json([
            'item' => $item,
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

        $request->validate([
            "edit_item_name" => "required|min:3|max:151",
            "edit_item_price" => "required|min:1|max:151",
            "edit_item_image"=>'image|mimes:jpeg,jpg,gif,png,svg|max:2048'
              
        ]);
        // dd($request);
         $image = $request->file('edit_item_image');
        if($image){
            $name=uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('image/profile'),$name);
            $path='image/profile/'.$name;
        }
        else{
            $path = $request->item_old_image;
        }

        $item = Item::find($id);
        $item->item_name = $request->edit_item_name;
        $item->item_price = $request->edit_item_price;
        $item->item_image = $path;
        $item->brand_id = $request->edit_brand;
        $item->category_id = $request->edit_category;
        $item->save();
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
