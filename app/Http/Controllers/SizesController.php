<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Size;
use App\Category;
use Illuminate\Support\Facades\DB;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.size.index');
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
            "category" => "required",
            "size" => "required|min:1|max:20"
        ]);
         Size::Create([
            'category_id' => $request->category,
            'size' => $request->size,
        ]);
     return response()->json(['success' => "Size saved Successful"]);
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
        $size = Size::find($id);
        return $size;
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
            "edit_size" => "required|min:1|max:20",
        ]);
        $size= Size::find($id);
        $size->category_id=$request->edit_category;
        $size->size=$request->edit_size;
        $size->save();
        return response()->json(['success'=>'Size updated successfully.']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Size::find($id);
        $category->delete();
      return response()->json(['success' => "Category deleted Successfully"]);
    }

    public function get_size()
    {
        $sizes = DB::table('sizes')
            ->join('categories', 'categories.id', '=', 'sizes.category_id')
            ->select('sizes.*', 'categories.*', 'sizes.id as s_id')
            ->get();
        return $sizes;
    }
    public function getSizeByCategoryId($id)
    {
        $size = DB::table('sizes')
            ->join('categories', 'categories.id', '=', 'sizes.category_id')
            ->select('sizes.*', 'categories.*', 'sizes.id as s_id')
            ->where('sizes.category_id', '=', $id)
            ->get();
        return $size;
    }
}
