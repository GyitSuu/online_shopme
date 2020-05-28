<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Color;
use App\Category;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.color.index');
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
            "color" => "required|min:1|max:20"
        ]);
         Color::Create([
            'category_id' => $request->category,
            'color' => $request->color,
        ]);
     return response()->json(['success' => "Color saved Successful"]);
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
        $color = Color::find($id);
        return $color;
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
            "edit_color" => "required|min:1|max:20",
        ]);
        $color= Color::find($id);
        $color->category_id=$request->edit_category;
        $color->color=$request->edit_color;
        $color->save();
        return response()->json(['success'=>'Color updated successfully.']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id);
        $color->delete();
      return response()->json(['success' => "Color deleted Successfully"]);
    }

    public function getColor()
    {
        $colors = DB::table('colors')
            ->join('categories', 'categories.id', '=', 'colors.category_id')
            ->select('colors.*', 'categories.*', 'colors.id as c_id')
            ->get();
        return $colors;
    }
    public function getSizeByCategoryId($id)
    {
        $colors = DB::table('colors')
            ->join('categories', 'categories.id', '=', 'colors.category_id')
            ->select('colors.*', 'categories.*', 'colors.id as c_id')
            ->where('colors.category_id', '=', $id)
            ->get();
        return $colors;
    }
}
